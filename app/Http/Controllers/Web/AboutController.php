<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Client;
use Illuminate\Http\Request;

class AboutController extends Controller
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

        // Ambil semua clients
        $clients = Client::latest()->get();

        return view('web.about.index', compact('blogs', 'categories', 'category', 'sliderBlogs', 'clients'));
    }
}
