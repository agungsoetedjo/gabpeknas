<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\RegulasiKategori;

class RegulasiController extends Controller{
    
    public function __construct()
    {
        
    }

    public function index()
    {
        $kategoriRegulasi = RegulasiKategori::where('aktif', 1)
            ->with(['regulasi' => function ($query) {
                $query->where('aktif', 1);
            }])
            ->get();
    
        return view('public.regulasi.index', compact('kategoriRegulasi'));
    }    
}