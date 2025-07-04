<?php

namespace App\Http\Controllers\Public;

use App\Helpers\GeoHelper;
use App\Http\Controllers\Controller;
use App\Models\AnggotaBujk;
use App\Models\Berita;
use App\Models\Faq;
use App\Models\Pesan;
use App\Models\Provinsi;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

    public function index(Request $request)
    {

        $totalAnggota = AnggotaBujk::count();
        $anggotaKadaluarsa = AnggotaBujk::whereDate('tgl_berakhir', '<', now())->count();

        $provinsiParam = strtolower($request->get('prov'));

        if (!$provinsiParam && !$request->ajax()) {
            $geo = GeoHelper::detectRegion();
            $detectedProv = $geo['region'] ?? null;

            if ($detectedProv && !str_contains($detectedProv, 'jakarta')) {
                return redirect()->route('home.index', ['prov' => $detectedProv]);
            }
        }

        $beritaQuery = Berita::with('kategori')
            ->where('status', 'published')
            ->orderBy('published_at', 'desc');

        if ($provinsiParam && !str_contains($provinsiParam, 'jakarta')) {
            $provinsi = Provinsi::whereRaw('LOWER(nama) LIKE ?', ["%{$provinsiParam}%"])->first();

            if ($provinsi) {
                $beritaQuery->where('kode_provinsi', $provinsi->kode);
            } else {
                $beritaQuery->whereRaw('1 = 0'); // aman, kosongkan
            }
        }

        $berita = $beritaQuery->limit(6)->get();

        $sliders = Slider::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->limit(5)
            ->get();


        return view('public.home', compact('sliders', 'berita', 'totalAnggota', 'anggotaKadaluarsa'));
    }

    public function legalitas(){
        return view('public.legalitas');
    }

    public function kirimpesan(Request $request)
    {
        $validated = $request->validate([
            'nama_depan' => 'required|string|max:100',
            'nama_belakang' => 'nullable|string|max:100',
            'no_telp' => 'nullable|string|max:30',
            'email' => 'required|email',
            'message' => 'required|string',
            'kategori' => 'required|in:Administrasi,Keanggotaan,Lain-lain',
        ]);

        Pesan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim.'
        ]);        
    }

    public function faqs()
    {
        $faqs = Faq::where('is_active', true)->get();
        return view('public.faq.index', compact('faqs'));
    }
}