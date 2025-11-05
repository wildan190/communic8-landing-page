<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BranchOffice;
use App\Models\BrandForgeContent;
use App\Models\Client;
use App\Models\DigitalArchitectureContent;
use App\Models\DigitalCompassContent;
use App\Models\Gallery;
use App\Models\LandingPage;
use App\Models\PublicPresenceContent;
use App\Models\SubService;
use App\Models\WebInformation;

class LayananController extends Controller
{
    public function brandLand()
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        $sliderBlogs = Blog::where('highlighted', true)->latest()->take(10)->get();
        $clients = Client::latest()->get();
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = \App\Models\Category::take(5)->pluck('name', 'id');

        $brandForgeContent = BrandForgeContent::latest()->first();

        $brandForgeSubservices = SubService::with('service')->whereHas('service', fn ($q) => $q->where('name', 'Brand Forge'))->latest()->get();

        return view('web.layanan.brand-forge', compact('categories', 'sliderBlogs', 'clients', 'galleries', 'webInfo', 'branchOffices', 'insightCategories', 'brandForgeContent', 'brandForgeSubservices'));
    }

    public function digitalStand()
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        $sliderBlogs = Blog::where('highlighted', true)->latest()->take(10)->get();
        $clients = Client::latest()->get();
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = \App\Models\Category::take(5)->pluck('name', 'id');

        // 🔥 Ambil semua SubService yang service name-nya "Digital Compass"
        $digitalCompassSubservices = SubService::whereHas('service', function ($query) {
            $query->where('name', 'Digital Compass');
        })->get();

        // 🔥 Ambil konten utama Digital Compass
        $digitalCompassContent = DigitalCompassContent::first();

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
                'digitalCompassSubservices',
                'digitalCompassContent', // ✅ kirim konten
            ),
        );
    }

    public function codeBand()
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        $sliderBlogs = Blog::where('highlighted', true)->latest()->take(10)->get();
        $clients = Client::latest()->get();
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = \App\Models\Category::take(5)->pluck('name', 'id');

        // 🔥 Ambil semua SubService yang service name-nya "Digital Architecture"
        $digitalArchitectureSubservices = SubService::whereHas('service', function ($query) {
            $query->where('name', 'Digital Architecture');
        })->get();

        // ✅ Ambil konten DigitalArchitectureContent
        $digitalArchitectureContent = DigitalArchitectureContent::first();

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
                'digitalArchitectureSubservices',
                'digitalArchitectureContent', // kirim ke view
            ),
        );
    }

    public function publicSpaceMedia()
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        $sliderBlogs = Blog::where('highlighted', true)->latest()->take(10)->get();
        $clients = Client::latest()->get();
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = \App\Models\Category::take(5)->pluck('name', 'id');

        // 🔥 Ambil semua SubService yang service name-nya "Public Presence"
        $publicPresenceSubservices = SubService::whereHas('service', function ($query) {
            $query->where('name', 'Public Presence');
        })->get();

        // 🔥 Ambil konten utama Public Presence
        $publicPresenceContent = PublicPresenceContent::first();

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
                'publicPresenceSubservices',
                'publicPresenceContent', // ✅ kirim ke view
            ),
        );
    }

    public function ottAdvertising()
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        $sliderBlogs = Blog::where('highlighted', true)->latest()->take(10)->get();
        $clients = Client::latest()->get();
        $galleries = Gallery::latest()->get();
        $webInfo = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $insightCategories = \App\Models\Category::take(5)->pluck('name', 'id');

        $ottAdvertisingSubservices = SubService::whereHas('service', function ($query) {
            $query->where('name', 'OTT Advertising');
        })->get();

        $landing = LandingPage::first();

        return view('web.layanan.ott-advertising', compact('categories', 'sliderBlogs', 'clients', 'galleries', 'webInfo', 'branchOffices', 'insightCategories', 'ottAdvertisingSubservices', 'landing'));
    }
}
