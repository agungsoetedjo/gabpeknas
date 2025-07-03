<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Provinsi;
use App\Models\AnggotaBujk;
use Illuminate\Support\Facades\View;

class AnggotaController extends Controller
{
    public function syaratketentuan()
    {
        return view('public.anggota.syaratketentuan');
    }

    public function indexAnggotaBUJK()
    {
        $search = request('search');
        $sortBy = request('sort_by', 'nama_bujk');
        $sortDirection = request('sort_direction', 'asc');
    
        $query = AnggotaBujk::with(['provinsi', 'kabupatenKota']);
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_bujk', 'like', '%' . $search . '%')
                  ->orWhere('kualifikasi', 'like', '%' . $search . '%')
                  ->orWhereHas('provinsi', function ($q2) use ($search) {
                      $q2->where('nama', 'like', '%' . $search . '%');
                  });
            });
        }
    
        $totalData = AnggotaBujk::count();
        $filteredData = $query->count();
    
        if ($sortBy === 'nama') {
            $query->join('provinsi', 'provinsi.kode', '=', 'anggota_bujk.kode_provinsi')
                  ->orderBy('provinsi.nama', $sortDirection)
                  ->select('anggota_bujk.*');
        } else {
            $query->orderBy($sortBy, $sortDirection);
        }
    
        $anggota = $query->paginate(10);
    
        $viewData = [
            'data' => $anggota,
            'currentPage' => $anggota->currentPage(),
            'perPage' => $anggota->perPage(),
            'totalPages' => $anggota->lastPage(),
            'search' => $search,
            'sortBy' => $sortBy,
            'sortDirection' => $sortDirection,
            'totalData' => $totalData,
            'filteredData' => $filteredData,
        ];
    
        if (request()->ajax()) {
            return response()->json([
                'html' => View::make('public.anggota.partials.table', $viewData)->render()
            ]);
        }
    
        return view('public.anggota.anggota-bujk', $viewData);
    }
      

    public function indexRekapAnggota()
    {
        $data = Provinsi::with('anggotaBujk')->get()->map(function ($provinsi) {
            return [
                'provinsi' => $provinsi->nama,
                'k' => $provinsi->anggotaBujk->where('kualifikasi', 'K')->count(),
                'm' => $provinsi->anggotaBujk->where('kualifikasi', 'M')->count(),
                'b' => $provinsi->anggotaBujk->where('kualifikasi', 'B')->count(),
                'spesialis' => $provinsi->anggotaBujk->where('kualifikasi', 'Spesialis')->count(),
            ];
        });

        return view('public.anggota.rekap-anggota', compact('data'));
    }
}
