<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index(Request $request)
    {
        $query = Kategori::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $kategori = $query->latest()->paginate(10);

        return view('dashboard.kategori.index', [
            'kategori' => $kategori,
        ]);
    }

    public function create()
    {
        return view('dashboard.kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:kategori,nama',
            'deskripsi' => 'nullable|string|min:3',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);

        Kategori::create($validated);

        return redirect()->route('dashboard.kategori.index')->with('success', 'Kategori ditambahkan');
    }

    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit', [
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255|unique:kategori,slug,' . $kategori->id,
            'deskripsi' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);

        $kategori->update($validated);

        return redirect()->route('dashboard.kategori.index')->with('success', 'Kategori diperbarui');
    }

    public function destroy(Kategori $kategori)
    {
        if ($kategori->berita()->exists()) {
            return redirect()->route('dashboard.kategori.index')->with('error', 'Kategori tidak bisa dihapus karena masih digunakan oleh berita');
        }

        $kategori->delete();

        return redirect()->route('dashboard.kategori.index')->with('success', 'Kategori dihapus');
    }
}