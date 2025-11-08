<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category')->latest()->paginate(10);

        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'title_id' => 'nullable|string|max:255',
            'content' => 'required',
            'content_id' => 'required|string',
            'keywords' => 'nullable|string',
            'headline_img' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'headline_img_alt' => 'nullable|string|max:255',
            'date' => 'required|date',
            'status' => 'required|in:draft,published,archived',
            'highlighted' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($request->title);
        $validated['content'] = $request->input('content');
        $validated['highlighted'] = $request->has('highlighted');

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
        $locale = app()->getLocale();
        $blogTitle = ($locale === 'id' && !empty($blog->title_id)) ? $blog->title_id : $blog->title;
        $blogContent = ($locale === 'id' && !empty($blog->content_id)) ? $blog->content_id : $blog->content;

        return view('blogs.show', compact('blog', 'blogTitle', 'blogContent'));
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'title_id' => 'sometimes|nullable|string|max:255',
            'category_id' => 'sometimes|required|exists:categories,id',
            'content' => 'sometimes|required',
            'content_id' => 'sometimes|required|string',
            'keywords' => 'nullable|string',
            'headline_img' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'headline_img_alt' => 'nullable|string|max:255',
            'date' => 'sometimes|required|date',
            'status' => 'sometimes|required|in:draft,published,archived',
            'highlighted' => 'boolean',
        ]);

        if ($request->has('title')) {
            $validated['slug'] = Str::slug($request->title);
        }

        if ($request->has('content')) {
            $validated['content'] = $request->input('content');
        }

        // Add this block for 'highlighted'
        $validated['highlighted'] = $request->has('highlighted');

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
