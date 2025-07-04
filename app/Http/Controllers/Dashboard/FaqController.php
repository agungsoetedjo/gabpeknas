<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->paginate(10);
        return view('dashboard.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('dashboard.faq.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $validated['is_active'] = $request->has('is_active');

        Faq::create($validated);
        return redirect()->route('dashboard.faq.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq)
    {
        return view('dashboard.faq.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $faq->update($validated);
        return redirect()->route('dashboard.faq.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('dashboard.faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}