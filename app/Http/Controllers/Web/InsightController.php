<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
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

        // Ambil daftar kategori unik untuk tombol filter
        $categories = Blog::select('category')->distinct()->pluck('category');

        return view('web.insight.index', compact('blogs', 'categories', 'category'));
    }
}
