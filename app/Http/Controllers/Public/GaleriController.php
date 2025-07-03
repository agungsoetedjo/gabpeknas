<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Galeri;

class GaleriController extends Controller {

    public function __construct()
    {
        
    }

    public function index()
    {
        $galeris = Galeri::with('details')->latest()->get(); // asumsi model Galeri ada
        return view('public.galeri.index', compact('galeris'));
    }

    public function show(Galeri $galeri)
    {
        return view('public.galeri.show', compact('galeri'));
    }
}