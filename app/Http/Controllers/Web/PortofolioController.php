<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BranchOffice;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\WebInformation;
use App\Models\PortfolioDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');

        $blogs = Blog::when($category, function ($query, $category) {
            $query->where('category', $category);
        })
            ->latest()
            ->paginate(10);

        $categories = \App\Models\Category::pluck('name', 'id');
        $sliderBlogs = Blog::where('highlighted', true)->latest()->take(10)->get();
        $clients = Client::latest()->get();

        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = \App\Models\Category::take(5)->pluck('name', 'id');

        // 🔥 Ambil semua project portfolio
        $projects = Project::latest()->get();

        return view('web.portofolio.index', compact(
            'blogs',
            'categories',
            'category',
            'sliderBlogs',
            'webInfo',
            'branchOffices',
            'insightCategories',
            'clients',
            'galleries',
            'projects'
        ));
    }

public function show($slug)
{
    $client = Client::whereRaw("LOWER(REPLACE(company_name, ' ', '-')) = ?", [$slug])
                    ->firstOrFail();

    $projects = Project::where('client_id', $client->id)->get();

    return view('portofolio.show', compact('client', 'projects'));
}


}
