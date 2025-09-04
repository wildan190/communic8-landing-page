<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
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
}
