<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimoni::query();

        if ($request->has('q')) {
            $query->where('name', 'like', '%'.$request->q.'%')
                ->orWhere('title', 'like', '%'.$request->q.'%')
                ->orWhere('company', 'like', '%'.$request->q.'%');
        }

        $testimonies = $query->latest()->paginate(10);

        return view('testimonies.index', compact('testimonies'));
    }

    public function create()
    {
        return view('testimonies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'photo_cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        foreach (['photo', 'photo_cover'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time().'_'.$file->getClientOriginalName();

                $destinationPath = public_path('storage/testimoni');
                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $data[$field] = 'testimoni/'.$filename;
            }
        }

        Testimoni::create($data);

        return redirect()->route('testimonies.index')->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function edit(Testimoni $testimoni)
    {
        return view('testimonies.edit', compact('testimoni'));
    }

    public function update(Request $request, Testimoni $testimoni)
    {
        $data = $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'photo_cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        foreach (['photo', 'photo_cover'] as $field) {
            if ($request->hasFile($field)) {
                // Hapus file lama kalau ada
                if ($testimoni->$field && file_exists(public_path('storage/'.$testimoni->$field))) {
                    unlink(public_path('storage/'.$testimoni->$field));
                }

                $file = $request->file($field);
                $filename = time().'_'.$file->getClientOriginalName();

                $destinationPath = public_path('storage/testimoni');
                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $data[$field] = 'testimoni/'.$filename;
            } else {
                $data[$field] = $testimoni->$field;
            }
        }

        $testimoni->update($data);

        return redirect()->route('testimonies.index')->with('success', 'Testimoni berhasil diupdate');
    }

    public function destroy(Testimoni $testimoni)
    {
        foreach (['photo', 'photo_cover'] as $field) {
            if ($testimoni->$field && file_exists(public_path('storage/'.$testimoni->$field))) {
                unlink(public_path('storage/'.$testimoni->$field));
            }
        }

        $testimoni->delete();

        return redirect()->route('testimonies.index')->with('success', 'Testimoni berhasil dihapus');
    }
}
