<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\BranchOffice;
use App\Models\Client;
use App\Models\Project;
use App\Models\Testimoni;
use App\Models\CardServices;
use App\Models\WebInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->get('category');

        $blogs = Blog::where('highlighted', true)->when($category, function ($query, $category) {
            $query->where('category', $category);
        })
        ->latest()
        ->paginate(10);

        $categories = Blog::select('category')->distinct()->pluck('category');
        $sliderBlogs = Blog::where('highlighted', true)->latest()->take(10)->get();

        $highlightedBlogs = Blog::where('highlighted', true)->latest()->get();

        $webInformation = WebInformation::first();
        $branchOffices = BranchOffice::all();
        $card_services = CardServices::orderBy('id')->get();

        $insightCategories = Blog::select('category')->distinct()->take(5)->pluck('category');

        $trustedProjects = Project::latest()->get();
        $clients = Client::latest()->get();
        $testimonis = Testimoni::latest()->get();

        // ✅ Ambil hanya 1 data About terbaru
        $about = About::latest()->first();

        $hero = \App\Models\HeroHome::first();

        $accessToken = config('services.instagram.token');
        $userId = config('services.instagram.user_id');

        $instagramPosts = [];
        try {
            $response = Http::get("https://graph.instagram.com/{$userId}/media", [
                'fields' => 'id,caption,media_type,media_url,permalink,thumbnail_url,timestamp',
                'access_token' => $accessToken,
                'limit' => 6,
            ]);

            if ($response->ok()) {
                $instagramPosts = $response->json()['data'];
            }
        } catch (\Exception $e) {}

        return view('web.home.index', compact(
            'hero',
            'blogs',
            'categories',
            'category',
            'sliderBlogs',
            'webInformation',
            'branchOffices',
            'insightCategories',
            'trustedProjects',
            'clients',
            'testimonis',
            'instagramPosts',
            'about', 
            'card_services'
        ));
    }
}
