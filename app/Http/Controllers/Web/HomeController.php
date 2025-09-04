<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BranchOffice;
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

        // Ambil semua branch office
        $branchOffices = BranchOffice::all();

        // Ambil max 5 kategori unik untuk Insights
        $insightCategories = Blog::select('category')
            ->distinct()
            ->take(5)
            ->pluck('category');

        return view('web.home.index', compact(
            'blogs',
            'categories',
            'category',
            'sliderBlogs',
            'webInfo',
            'branchOffices',
            'insightCategories'
        ));
    }
}
