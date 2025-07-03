<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Slider::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $sliders = $query->orderByRaw("
                CASE
                    WHEN status = 'draft' THEN 0
                    WHEN status = 'published' THEN 1
                    ELSE 2
                END
            ")
            ->orderByRaw("
                CASE
                    WHEN status = 'draft' THEN created_at
                    ELSE published_at
                END DESC
            ")
            ->paginate(10)->withQueryString();

        return view('dashboard.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'slider_' . time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('slider'), $filename);
            $validated['image'] = 'slider/' . $filename; // simpan path relatif
        }
    
        $validated['status'] = 'draft';
    
        Slider::create($validated);
    
        return redirect()->route('dashboard.sliders.index')->with('success', 'Slider baru berhasil ditambahkan!');
    }    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            $oldPath = public_path($slider->image);
            if ($slider->image && file_exists($oldPath)) {
                unlink($oldPath);
            }
    
            $image = $request->file('image');
            $filename = 'slider_' . time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('slider'), $filename);
            $validated['image'] = 'slider/' . $filename;
        }
    
        $validated['status'] = 'draft';
    
        $slider->update($validated);
    
        return redirect()->route('dashboard.sliders.index')->with('success', 'Slider berhasil diubah');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $filePath = public_path($slider->image);
        if ($slider->image && file_exists($filePath)) {
            unlink($filePath);
        }
    
        $slider->delete();
    
        return redirect()->route('dashboard.sliders.index')->with('success', 'Slider berhasil dihapus');
    }    

    public function publish(Slider $slider)
    {
        if ($slider->status === 'draft') {
            $slider->update([
                'status' => 'published',
                'published_at' => $slider->published_at ?? now(),
            ]);
            $message = 'Slider berhasil dipublikasikan';
        } else {
            $slider->update([
                'status' => 'draft',
            ]);
            $message = 'Slider dikembalikan ke draft';
        }

        return back()->with('success', $message);
    }
}
