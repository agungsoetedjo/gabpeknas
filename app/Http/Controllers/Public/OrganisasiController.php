<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\DPDCabang;
use Illuminate\Support\Facades\View;

class OrganisasiController extends Controller
{

    public function __construct()
    {
    }

    public function indexDPP()
    {
        return view('public.organisasi.dpp'); // Bisa disiapkan data juga kalau perlu
    }

    public function indexDPD()
    {
        $search = request('search');
        $sortBy = request('sort_by', 'id');
        $sortDirection = request('sort_direction', 'asc');

        $query = DPDCabang::with('provinsi');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kab_kota', 'like', '%' . $search . '%')
                  ->orWhere('alamat', 'like', '%' . $search . '%')
                  ->orWhere('nama_ketua', 'like', '%' . $search . '%')
                  ->orWhere('nama_sekretaris', 'like', '%' . $search . '%')
                  ->orWhere('nama_bendahara', 'like', '%' . $search . '%')
                  ->orWhereHas('provinsi', function ($q2) use ($search) {
                      $q2->where('nama', 'like', '%' . $search . '%');
                  });
            });
        }

        $totalData = DPDCabang::count();
        $filteredData = $query->count();

        if ($sortBy === 'provinsi') {
            $query->join('provinsi', 'provinsi.kode', '=', 'dpd_cabang.kode_provinsi')
                ->orderBy('provinsi.nama', $sortDirection)
                ->select('dpd_cabang.*');
        } else {
            $query->orderBy($sortBy, $sortDirection);
        }

        $dpd = $query->paginate(10);

        $viewData = [
            'data' => $dpd,
            'currentPage' => $dpd->currentPage(),
            'perPage' => $dpd->perPage(),
            'totalPages' => $dpd->lastPage(),
            'search' => $search,
            'sortBy' => $sortBy,
            'sortDirection' => $sortDirection,
            'totalData' => $totalData,
            'filteredData' => $filteredData,
        ];

        if (request()->ajax()) {
            return response()->json([
                'html' => view('public.organisasi.partials.table', $viewData)->render()
            ]);
        }

        return view('public.organisasi.dpd', $viewData);
    }
    
    public function strukturorganisasi(){
        return view('public.organisasi.strukturorganisasi');
    }

    public function kepengurusanpusat(){
        return view('public.organisasi.kepengurusanpusat');
    }
}