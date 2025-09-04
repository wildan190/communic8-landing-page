<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BranchOffice;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\WebInformation;
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

        $categories = Blog::select('category')->distinct()->pluck('category');
        $sliderBlogs = Blog::latest()->take(10)->get();
        $clients = Client::latest()->get();

        // 🔥 ambil semua data gallery terbaru
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = Blog::select('category')
            ->distinct()
            ->take(5)
            ->pluck('category');

        return view('web.about.index', compact(
            'blogs',
            'categories',
            'category',
            'sliderBlogs',
            'clients',
            'galleries',
            'insightCategories',
            'webInfo',
            'branchOffices',
        ));
    }
}
