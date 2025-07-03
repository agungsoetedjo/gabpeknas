<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\RegulasiKategori;
use Illuminate\Http\Request;

class RegulasiKategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = RegulasiKategori::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $kategori = $query->paginate(10);

        return view('dashboard.regulasi-kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('dashboard.regulasi-kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:kategori,nama',
            'deskripsi' => 'nullable|string|min:3',
            'aktif' => 'required|in:1,0',
        ]);

        RegulasiKategori::create($validated);

        return redirect()->route('dashboard.regulasi-kategori.index')->with('success', 'Kategori regulasi berhasil ditambahkan');
    }

    public function edit(RegulasiKategori $kategori)
    {
        return view('dashboard.regulasi-kategori.edit', compact('kategori'));
    }

    public function update(Request $request, RegulasiKategori $kategori)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:kategori,nama,' . $kategori->id,
            'deskripsi' => 'nullable|string|min:3',
            'aktif' => 'required|in:1,0',
        ]);

        $kategori->update($validated);

        return redirect()->route('dashboard.regulasi-kategori.index')->with('success', 'Kategori regulasi berhasil diperbarui');
    }

    public function destroy(RegulasiKategori $kategori)
    {
        $kategori->delete();

        return redirect()->route('dashboard.regulasi-kategori.index')->with('success', 'Kategori regulasi berhasil dihapus');
    }
}