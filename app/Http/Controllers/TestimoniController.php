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
            'photo' => 'nullable|image',
            'photo_cover' => 'nullable|image',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('public/testimoni');
        }

        if ($request->hasFile('photo_cover')) {
            $data['photo_cover'] = $request->file('photo_cover')->store('public/testimoni');
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
            'photo' => 'nullable|image',
            'photo_cover' => 'nullable|image',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('testimoni');
        }

        if ($request->hasFile('photo_cover')) {
            $data['photo_cover'] = $request->file('photo_cover')->store('testimoni');
        }

        $testimoni->update($data);

        return redirect()->route('testimonies.index')->with('success', 'Testimoni berhasil diupdate');
    }

    public function destroy(Testimoni $testimoni)
    {
        $testimoni->delete();

        return redirect()->route('testimonies.index')->with('success', 'Testimoni berhasil dihapus');
    }
}
