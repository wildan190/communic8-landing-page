<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BranchOffice;
use App\Models\BrandForgeContent;
use App\Models\Client;
use App\Models\Gallery;
use App\Models\SubService;
use App\Models\WebInformation;

class LayananController extends Controller
{
    public function brandForge()
    {
        $categories = Blog::select('category')->distinct()->pluck('category');
        $sliderBlogs = Blog::latest()->take(10)->get();
        $clients = Client::latest()->get();
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = Blog::select('category')->distinct()->take(5)->pluck('category');

        $brandForgeContent = BrandForgeContent::latest()->first();

        $brandForgeSubservices = SubService::with('service')->whereHas('service', fn($q) => $q->where('name', 'Brand Forge'))->latest()->get();

        return view('web.layanan.brand-forge', compact('categories', 'sliderBlogs', 'clients', 'galleries', 'webInfo', 'branchOffices', 'insightCategories', 'brandForgeContent', 'brandForgeSubservices'));
    }

    public function digitalCompass()
    {
        $categories = Blog::select('category')->distinct()->pluck('category');
        $sliderBlogs = Blog::latest()->take(10)->get();
        $clients = Client::latest()->get();
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = Blog::select('category')->distinct()->take(5)->pluck('category');

        // 🔥 Ambil semua SubService yang service name-nya "Digital Compass"
        $digitalCompassSubservices = SubService::whereHas('service', function ($query) {
            $query->where('name', 'Digital Compass');
        })->get();

        return view(
            'web.layanan.digital-compass',
            compact(
                'categories',
                'sliderBlogs',
                'clients',
                'galleries',
                'webInfo',
                'branchOffices',
                'insightCategories',
                'digitalCompassSubservices', // passing ke view
            ),
        );
    }

    public function digitalArchitecture()
    {
        $categories = Blog::select('category')->distinct()->pluck('category');
        $sliderBlogs = Blog::latest()->take(10)->get();
        $clients = Client::latest()->get();
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = Blog::select('category')->distinct()->take(5)->pluck('category');

        // 🔥 Ambil semua SubService yang service name-nya "Digital Architecture"
        $digitalArchitectureSubservices = SubService::whereHas('service', function ($query) {
            $query->where('name', 'Digital Architecture');
        })->get();

        return view(
            'web.layanan.digital-architecture',
            compact(
                'categories',
                'sliderBlogs',
                'clients',
                'galleries',
                'webInfo',
                'branchOffices',
                'insightCategories',
                'digitalArchitectureSubservices', // passing ke view
            ),
        );
    }

    public function publicPresence()
    {
        $categories = Blog::select('category')->distinct()->pluck('category');
        $sliderBlogs = Blog::latest()->take(10)->get();
        $clients = Client::latest()->get();
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = Blog::select('category')->distinct()->take(5)->pluck('category');

        // 🔥 Ambil semua SubService yang service name-nya "Public Presence"
        $publicPresenceSubservices = SubService::whereHas('service', function ($query) {
            $query->where('name', 'Public Presence');
        })->get();

        return view(
            'web.layanan.public-presence',
            compact(
                'categories',
                'sliderBlogs',
                'clients',
                'galleries',
                'webInfo',
                'branchOffices',
                'insightCategories',
                'publicPresenceSubservices', // passing ke view
            ),
        );
    }
}
