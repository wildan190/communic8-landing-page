<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->get();
        return view('about.index', compact('abouts'));
    }

    public function create()
    {
        return view('about.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $uploadPath = public_path('uploads/about');

            // Buat folder jika belum ada
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Pindahkan file ke folder tujuan
            $file->move($uploadPath, $filename);

            // Simpan nama file saja ke database
            $data['img'] = $filename;
        }

        About::create($data);

        return redirect()->route('admin.about.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $about = About::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        $request->validate([
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $uploadPath = public_path('uploads/about');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Hapus file lama jika ada
            if ($about->img && file_exists($uploadPath . '/' . $about->img)) {
                unlink($uploadPath . '/' . $about->img);
            }

            // Simpan file baru
            $file->move($uploadPath, $filename);
            $data['img'] = $filename;
        }

        $about->update($data);

        return redirect()->route('admin.about.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $uploadPath = public_path('uploads/about');

        if ($about->img && file_exists($uploadPath . '/' . $about->img)) {
            unlink($uploadPath . '/' . $about->img);
        }

        $about->delete();

        return redirect()->route('admin.about.index')->with('success', 'Data berhasil dihapus.');
    }
}
