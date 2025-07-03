<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $draftCount = Berita::where('status', 'draft')->count();
        $publishedCount = Berita::where('status', 'published')->count();
        $kategoriCount = Kategori::count();

        return view('dashboard.index', compact('draftCount', 'publishedCount', 'kategoriCount'));
    }
}
