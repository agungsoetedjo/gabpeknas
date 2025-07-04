<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'desc');
    
        $allowedSorts = ['created_at', 'nama', 'email', 'kategori'];
        if (!in_array($sort, $allowedSorts)) {
            $sort = 'created_at';
        }
    
        $pesan = Pesan::orderBy($sort === 'nama' ? 'nama_depan' : $sort, $direction)->paginate(10);
    
        return view('dashboard.pesan.index', compact('pesan', 'sort', 'direction'));
    }
    
    public function show($id)
    {
        $pesan = Pesan::findOrFail($id);
        return view('dashboard.pesan.show', compact('pesan'));
    }

    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();
        return redirect()->route('dashboard.pesan.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
