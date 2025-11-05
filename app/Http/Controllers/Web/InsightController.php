<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BranchOffice;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\WebInformation;
use Illuminate\Http\Request;

class InsightController extends Controller
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
        $categories = \App\Models\Category::pluck('name', 'id');

        // Data untuk slider (10 terbaru)
        $sliderBlogs = Blog::where('highlighted', true)->latest()->take(10)->get();

        $categories = \App\Models\Category::pluck('name', 'id');
        $highlightedBlogs = Blog::where('highlighted', true)->latest()->take(3)->get();
        $clients = Client::latest()->get();

        // 🔥 ambil semua data gallery terbaru
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = \App\Models\Category::take(5)->pluck('name', 'id');

        return view('web.insight.index', compact('blogs', 'categories', 'category', 'sliderBlogs', 'webInfo', 'branchOffices', 'insightCategories', 'clients', 'galleries', 'highlightedBlogs'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Data untuk slider (10 terbaru)
        $sliderBlogs = Blog::where('highlighted', true)->latest()->take(10)->get();

        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = \App\Models\Category::take(5)->pluck('name', 'id');

        return view('web.insight.blog-detail', compact('blog', 'webInfo', 'branchOffices', 'insightCategories', 'sliderBlogs'));
    }
}
