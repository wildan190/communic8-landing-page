<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BranchOffice;
use App\Models\Client;
use App\Models\Consumer;
use App\Models\Gallery;
use App\Models\WebInformation;
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

        $categories = Blog::select('category')->distinct()->pluck('category');
        $sliderBlogs = Blog::where('highlighted', true)->latest()->take(10)->get();
        $clients = Client::latest()->get();

        // 🔥 ambil semua data gallery terbaru
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = Blog::select('category')
            ->distinct()
            ->take(5)
            ->pluck('category');

        return view('web.contact.index', compact('blogs', 'categories', 'category', 'sliderBlogs', 'webInfo', 'branchOffices', 'insightCategories', 'clients', 'galleries'));
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
