<?php

namespace App\Http\Controllers\Dashboard;

use App\Helpers\GeoHelper;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Tampilkan daftar berita.
     */
    
    public function index(Request $request)
    {
         $query = Berita::query();
     
         if ($request->filled('search')) {
             $query->where('judul', 'like', '%' . $request->search . '%');
         }
     
         if ($request->filled('status')) {
             $query->where('status', $request->status);
         }
     
         $provinsiList = Provinsi::orderBy('kode')->get();
     
         // Deteksi lokasi hanya jika tidak ada filter provinsi
         if (!$request->filled('provinsi')) {
             try {
                 $location = GeoHelper::detectRegion();
                 $region = $location['region'];
                 $city = $location['city'];
     
                 foreach ($provinsiList as $prov) {
                     $nama = strtolower($prov->nama);
                     $namaAlt = str_replace(['dki', 'daerah istimewa', 'provinsi'], '', $nama);
                     $namaAlt = trim($namaAlt);
     
                     if (
                         str_contains($region, $namaAlt) || str_contains($city, $namaAlt)
                     ) {
                         $request->merge(['provinsi' => $prov->kode]); // Inject ke filter
                         break;
                     }
                 }
             } catch (\Exception $e) {
                 // Bisa log atau abaikan saja kalau gagal
             }
        }
     
         if ($request->filled('provinsi') && $request->provinsi !== '31') {
             $query->where('kode_provinsi', $request->provinsi);
        }
     
        $berita = $query->with(['kategori', 'provinsi'])
             ->orderByRaw("
                 CASE
                     WHEN status = 'draft' THEN 0
                     WHEN status = 'published' THEN 1
                     ELSE 2
                 END
             ")
             ->orderByDesc(DB::raw("
                 CASE
                     WHEN status = 'draft' THEN created_at
                     ELSE published_at
                 END
             "))
             ->paginate(4)
             ->withQueryString();
     
         return view('dashboard.berita.index', [
             'berita' => $berita,
             'provinsiList' => $provinsiList,
        ]);
    }

    /**
     * Tampilkan form tambah berita.
     */

    public function create()
    {
         $kategori = Kategori::orderBy('nama')->get();
         $provinsi = Provinsi::orderBy('kode')->get();
     
         $location = GeoHelper::detectRegion();
         $detectedRegion = $location['region'];
         $detectedCity = $location['city'];
     
         $matchedKode = null;
         $matchedNama = null;
     
         foreach ($provinsi as $p) {
             $nama = strtolower($p->nama);
     
             // Normalisasi nama provinsi
             $nama = str_replace(
                 ['provinsi', 'dki', 'daerah istimewa', '.', ','],
                 '',
                 $nama
             );
             $nama = trim($nama);
     
             // Region & City juga dibersihkan
             $region = preg_replace('/[^a-z ]/', '', strtolower($detectedRegion));
             $city = preg_replace('/[^a-z ]/', '', strtolower($detectedCity));
     
             // Cocokkan
             if (
                 str_contains($region, $nama) ||
                 str_contains($city, $nama)
             ) {
                 $matchedKode = $p->kode;
                 $matchedNama = $p->nama;
                 break;
             }
     
             // Atau cocokkan kata pertama (misalnya "jakarta" cocok ke "dki jakarta")
             $namaKataPertama = explode(' ', $nama)[0] ?? '';
             if (
                 $namaKataPertama &&
                 (str_contains($region, $namaKataPertama) || str_contains($city, $namaKataPertama))
             ) {
                 $matchedKode = $p->kode;
                 $matchedNama = $p->nama;
                 break;
             }
         }
     
         return view('dashboard.berita.create', [
             'kategori' => $kategori,
             'provinsi' => $provinsi,
             'auto_provinsi_kode' => $matchedKode,
             'auto_provinsi_nama' => $matchedNama,
         ]);
    }     

    /**
     * Simpan berita baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255|unique:berita,judul',
            'konten' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'kode_provinsi' => 'required|exists:provinsi,kode',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            $filename = time() . '-' . Str::slug(pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = 'berita/' . $filename;
            $request->file('image')->move(public_path('berita'), $filename);
            $validated['image'] = $path;
        } else {
            $validated['image'] = 'berita/no-images.jpg';
        }        

        if ($validated['status'] === 'published') {
            $validated['published_at'] = now();
        }

        Berita::create($validated);

        return redirect()->route('dashboard.berita.index')->with('success', 'Berita baru berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit berita.
     */
    public function edit(Berita $berita)
    {
        $kategori = Kategori::orderBy('nama', 'asc')->get();
        $provinsi = Provinsi::orderBy('kode', 'asc')->get();

        return view('dashboard.berita.edit', [
            'berita' => $berita,
            'kategori' => $kategori,
            'provinsi' => $provinsi,
        ]);
    }

    /**
     * Update berita yang sudah ada.
     */
    public function update(Request $request, Berita $berita)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255|unique:berita,judul,' . $berita->id,
            'konten' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published',
            'kode_provinsi' => 'required|exists:provinsi,kode',
        ]);

        $validated['slug'] = Str::slug($validated['judul']);
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('image')) {
            if (
                $berita->image &&
                $berita->image !== 'berita/no-images.jpg' &&
                file_exists(public_path($berita->image))
            ) {
                unlink(public_path($berita->image));
            }
        
            $filename = time() . '-' . Str::slug(pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $request->file('image')->getClientOriginalExtension();
            $path = 'berita/' . $filename;
            $request->file('image')->move(public_path('berita'), $filename);
            $validated['image'] = $path;
        }        

        if ($validated['status'] === 'published') {
            $validated['published_at'] = $berita->published_at ?? now();
        }

        $berita->update($validated);

        return redirect()->route('dashboard.berita.index')
            ->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Hapus berita yang sudah ada.
     */
    public function destroy(Berita $berita)
    {
        if (
            $berita->image &&
            $berita->image !== 'berita/no-images.jpg' &&
            file_exists(public_path($berita->image))
        ) {
            unlink(public_path($berita->image));
        }
    
        $berita->delete();
    
        return redirect()->route('dashboard.berita.index')->with('success', 'Berita berhasil dihapus!');
    }

    public function publish(Berita $berita)
    {
        if ($berita->status === 'draft') {
            $berita->update([
                'status' => 'published',
                'published_at' => $berita->published_at ?? now(),
            ]);
            $message = 'Berita berhasil dipublikasikan';
        } else {
            $berita->update([
                'status' => 'draft',
            ]);
            $message = 'Berita dikembalikan ke draft';
        }

        return back()->with('success', $message);
    }
}
