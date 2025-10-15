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
            $file = $request->file('upload_picture');
            $filename = time().'_'.$file->getClientOriginalName();

            $destinationPath = public_path('storage/galleries');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['upload_picture'] = 'galleries/'.$filename;
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
            // Hapus file lama jika ada
            if ($gallery->upload_picture && file_exists(public_path('storage/'.$gallery->upload_picture))) {
                unlink(public_path('storage/'.$gallery->upload_picture));
            }

            $file = $request->file('upload_picture');
            $filename = time().'_'.$file->getClientOriginalName();

            $destinationPath = public_path('storage/galleries');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['upload_picture'] = 'galleries/'.$filename;
        } else {
            // kalau tidak upload baru, tetap pakai gambar lama
            $validated['upload_picture'] = $gallery->upload_picture;
        }

        $gallery->update($validated);

        return redirect()->route('galleries.index')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->upload_picture && file_exists(public_path('storage/'.$gallery->upload_picture))) {
            unlink(public_path('storage/'.$gallery->upload_picture));
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Gambar berhasil dihapus.');
    }
}
