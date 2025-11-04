<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'content' => 'required',
            'keywords' => 'nullable|string',
            'headline_img' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'headline_img_alt' => 'nullable|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['content'] = $request->input('content');

        // Upload image manual agar tidak perlu symbolic link
        if ($request->hasFile('headline_img')) {
            $file = $request->file('headline_img');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('storage/headline_images');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['headline_img'] = 'headline_images/'.$filename;
        }

        Blog::create($validated);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dibuat.');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'category' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required',
            'keywords' => 'nullable|string',
            'headline_img' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'headline_img_alt' => 'nullable|string|max:255',
            'date' => 'sometimes|required|date',
            'status' => 'sometimes|required|in:draft,published,archived',
        ]);

        if ($request->has('title')) {
            $validated['slug'] = Str::slug($request->title);
        }

        if ($request->has('content')) {
            $validated['content'] = $request->input('content');
        }

        // Handle update image
        if ($request->hasFile('headline_img')) {
            // Hapus gambar lama jika ada
            if ($blog->headline_img && file_exists(public_path('storage/'.$blog->headline_img))) {
                unlink(public_path('storage/'.$blog->headline_img));
            }

            $file = $request->file('headline_img');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('storage/headline_images');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['headline_img'] = 'headline_images/'.$filename;
        } else {
            $validated['headline_img'] = $blog->headline_img;
        }

        $blog->update($validated);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy(Blog $blog)
    {
        // Hapus gambar dari storage jika ada
        if ($blog->headline_img && file_exists(public_path('storage/'.$blog->headline_img))) {
            unlink(public_path('storage/'.$blog->headline_img));
        }

        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus.');
    }
}
