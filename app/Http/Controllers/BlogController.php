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

        if ($request->hasFile('headline_img')) {
            $path = $request->file('headline_img')->store('headline_images', 'public');
            $validated['headline_img'] = $path;
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

        if ($request->hasFile('headline_img')) {
            $path = $request->file('headline_img')->store('headline_images', 'public');
            $validated['headline_img'] = $path;
        }

        $blog->update($validated);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus.');
    }
}
