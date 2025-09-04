<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Consumer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');

        $blogs = Blog::when($category, function ($query, $category) {
            $query->where('category', $category);
        })
            ->latest()
            ->paginate(10);

        // Ambil daftar kategori unik
        $categories = Blog::select('category')->distinct()->pluck('category');

        // Data untuk slider (10 terbaru)
        $sliderBlogs = Blog::latest()->take(10)->get();

        return view('web.contact.index', compact('blogs', 'categories', 'category', 'sliderBlogs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'industry' => 'nullable|string',
            'services' => 'nullable|string',
            'find_us' => 'nullable|string',
            'area' => 'nullable|in:1,2,3,4',
            'message' => 'nullable|string',
        ]);

        Consumer::create($validated);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
