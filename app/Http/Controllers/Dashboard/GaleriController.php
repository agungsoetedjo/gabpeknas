<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\GaleriDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $query = Galeri::query();
    
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }
    
        // Tambahkan eager load galeriDetail
        $galeri = $query->with('details')
            ->orderByDesc('tanggal')
            ->paginate(10)
            ->withQueryString();
    
        return view('dashboard.galeri.index', [
            'galeri' => $galeri,
        ]);
    }    

    public function create()
    {
        return view('dashboard.galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255|unique:galeri,judul',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'details' => 'nullable|array',
            'details.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);        
    
        DB::beginTransaction();
    
        try {
            $galeri = Galeri::create([
                'judul' => $validated['judul'],
                'slug' => Str::slug($validated['judul']),
                'deskripsi' => $validated['deskripsi'],
                'tanggal' => $validated['tanggal'],
            ]);
    
            if ($request->hasFile('details')) {
                foreach ($request->file('details') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $path = 'galeri/detail/' . $filename;
                    $file->move(public_path('galeri/detail'), $filename);
            
                    GaleriDetail::create([
                        'galeri_id' => $galeri->id,
                        'file' => $path,
                        'keterangan' => null,
                    ]);
                }
            }            
    
            DB::commit();
    
            return redirect()->route('dashboard.galeri.index')->with('success', 'Galeri berhasil disimpan!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan galeri.'])->withInput();
        }
    }    

    public function edit(Galeri $galeri)
    {
        $galeri->load('details');

        return view('dashboard.galeri.edit', [
            'galeri' => $galeri,
        ]);
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255|unique:galeri,judul,' . $galeri->id,
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
            'details.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
    
        DB::beginTransaction();
    
        try {
            $galeri->update([
                'judul' => $validated['judul'],
                'slug' => Str::slug($validated['judul']),
                'deskripsi' => $validated['deskripsi'],
                'tanggal' => $validated['tanggal'],
                'user_id' => Auth::id(),
            ]);
    
            if ($request->hasFile('details')) {
                foreach ($request->file('details') as $file) {
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $path = 'galeri/detail/' . $filename;
                    $file->move(public_path('galeri/detail'), $filename);
            
                    $galeri->details()->create([
                        'file' => $path,
                        'keterangan' => null,
                    ]);
                }
            }            
    
            if ($request->filled('deleted_details')) {
                foreach ($request->deleted_details as $detailId) {
                    $detail = $galeri->details()->find($detailId);
                    if ($detail) {
                        $filePath = public_path($detail->file);
                        if (file_exists($filePath)) {
                            unlink($filePath);
                        }
                        $detail->delete();
                    }
                }
            }
            
            DB::commit();
    
            return redirect()->route('dashboard.galeri.index')->with('success', 'Galeri berhasil diperbarui!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui galeri.'])->withInput();
        }
    }

    public function destroy(Galeri $galeri)
    {
        foreach ($galeri->details as $detail) {
            $filePath = public_path($detail->file);
            if ($detail->file && file_exists($filePath)) {
                unlink($filePath);
            }
        }
    
        $galeri->delete();
    
        return redirect()->route('dashboard.galeri.index')->with('success', 'Galeri berhasil dihapus!');
    }
}