<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\WebInformation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');

        $blogs = Blog::when($category, function ($query, $category) {
            $query->where('category', $category);
        })
            ->latest()
            ->paginate(10);

        $categories = Blog::select('category')->distinct()->pluck('category');
        $sliderBlogs = Blog::latest()->take(10)->get();

        $webInfo = WebInformation::first();

        return view('web.home.index', compact('blogs', 'categories', 'category', 'sliderBlogs', 'webInfo'));
    }
}
