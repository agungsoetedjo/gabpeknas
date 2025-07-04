<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\RunningText;
use Illuminate\Http\Request;

class RunningTextController extends Controller
{
    public function index()
    {
        $runningtexts = RunningText::latest()->paginate(10);
        return view('dashboard.runningtext.index', compact('runningtexts'));
    }

    public function create()
    {
        return view('dashboard.runningtext.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teks' => 'required|string',
            'aktif' => 'boolean',
        ]);

        $validated['aktif'] = $request->has('aktif'); // Set default aktif

        RunningText::create($validated);
        return redirect()->route('dashboard.runningtext.index')->with('success', 'Running Text berhasil ditambahkan.');
    }

    public function edit(RunningText $runningtext)
    {
        return view('dashboard.runningtext.edit', compact('runningtext'));
    }

    public function update(Request $request, RunningText $runningtext)
    {
        $validated = $request->validate([
            'teks' => 'required|string',
        ]);
    
        $validated['aktif'] = $request->has('aktif');
    
        $runningtext->update($validated);
    
        return redirect()->route('dashboard.runningtext.index')->with('success', 'Running Text diperbarui.');
    }    

    public function destroy(RunningText $runningtext)
    {
        $runningtext->delete();
        return redirect()->route('dashboard.runningtext.index')->with('success', 'Running Text dihapus.');
    }
}
