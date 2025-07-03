<?php

namespace App\Http\Controllers\Public;

use App\Helpers\GeoHelper;
use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $provinsiParam = strtolower($request->get('prov'));

        if (!$provinsiParam && !$request->ajax()) {
            $geo = GeoHelper::detectRegion();
            $detectedProv = $geo['region'] ?? null;

            if ($detectedProv && !str_contains($detectedProv, 'jakarta')) {
                return redirect()->route('news.index', ['prov' => $detectedProv]);
            }
        }

        $query = Berita::with('kategori')
            ->where('status', 'published')
            ->latest('published_at');

        if ($provinsiParam && !str_contains($provinsiParam, 'jakarta')) {
            $provinsi = \App\Models\Provinsi::whereRaw('LOWER(nama) LIKE ?', ["%{$provinsiParam}%"])->first();
            if ($provinsi) {
                $query->where('kode_provinsi', $provinsi->kode);
            } else {
                $query->whereRaw('1 = 0');
            }
        }

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $berita = $query->paginate(6);

        if ($request->ajax()) {
            return view('public.berita._list', compact('berita'))->render();
        }

        return view('public.berita.index', compact('berita'));
    }
    
    
    public function show(Request $request, Berita $berita)
    {
        if ($request->ajax()) {
            return view('public.berita._show', compact('berita'))->render();
        }
    
        return redirect()->route('news.index');
    }
}
