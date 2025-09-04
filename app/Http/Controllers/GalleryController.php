<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'upload_picture' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('upload_picture')) {
            $path = $request->file('upload_picture')->store('galleries', 'public');
            $validated['upload_picture'] = $path;
        }

        Gallery::create($validated);

        return redirect()->route('galleries.index')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'upload_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('upload_picture')) {
            $path = $request->file('upload_picture')->store('galleries', 'public');
            $validated['upload_picture'] = $path;
        }

        $gallery->update($validated);

        return redirect()->route('galleries.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
