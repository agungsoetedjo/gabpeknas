<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Regulasi;
use App\Models\RegulasiKategori;
use Illuminate\Http\Request;

class RegulasiController extends Controller
{
    public function index()
    {
        $regulasi = Regulasi::with('kategori')->paginate(10);
        return view('dashboard.regulasi.index', compact('regulasi'));
    }

    public function create()
    {
        $kategori = RegulasiKategori::orderBy('id')->get();
        return view('dashboard.regulasi.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'regulasi_kategori_id' => 'required|exists:regulasi_kategori,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_dok' => 'nullable|file|mimes:pdf,doc,docx|max:20480',
            'aktif' => 'required|in:0,1',
        ]);

        if ($request->hasFile('file_dok')) {
            $filename = time() . '_' . $request->file('file_dok')->getClientOriginalName();
            $request->file('file_dok')->move(public_path('regulasi'), $filename);
            $validated['file_dok'] = 'regulasi/' . $filename;
        }
        

        Regulasi::create($validated);

        return redirect()->route('dashboard.regulasi.index')->with('success', 'Regulasi berhasil ditambahkan.');
    }

    public function edit(Regulasi $regulasi)
    {
        $kategori = RegulasiKategori::orderBy('nama')->get();
        return view('dashboard.regulasi.edit', compact('regulasi', 'kategori'));
    }

    public function update(Request $request, Regulasi $regulasi)
    {
        $validated = $request->validate([
            'regulasi_kategori_id' => 'required|exists:regulasi_kategori,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file_dok' => 'nullable|file|mimes:pdf,doc,docx|max:20480',
            'aktif' => 'required|in:0,1',
        ]);

        if ($request->hasFile('file_dok')) {
            // Hapus file lama (jika ada)
            if ($regulasi->file_dok && file_exists(public_path($regulasi->file_dok))) {
                unlink(public_path($regulasi->file_dok));
            }

            // Upload file baru
            $filename = time() . '_' . $request->file('file_dok')->getClientOriginalName();
            $request->file('file_dok')->move(public_path('regulasi'), $filename);
            $validated['file_dok'] = 'regulasi/' . $filename;
        }

        $regulasi->update($validated);

        return redirect()->route('dashboard.regulasi.index')->with('success', 'Regulasi berhasil diperbarui.');
    }

    public function destroy(Regulasi $regulasi)
    {
        if ($regulasi->file_dok && file_exists(public_path($regulasi->file_dok))) {
            unlink(public_path($regulasi->file_dok));
        }
    
        $regulasi->delete();
    
        return redirect()->route('dashboard.regulasi.index')->with('success', 'Regulasi berhasil dihapus.');
    }    
}