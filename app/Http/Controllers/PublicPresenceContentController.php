<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicPresenceContent;
use Illuminate\Support\Facades\Storage;

class PublicPresenceContentController extends Controller
{
    // Menampilkan data
    public function index()
    {
        $content = PublicPresenceContent::first(); // Ambil 1 data, bisa disesuaikan
        return view('public_presence.index', compact('content'));
    }

    // Simpan atau update data
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'head_img' => 'nullable|image|max:2048',
            'img_INSIGHT_DRIVEN_STRATEGY' => 'nullable|image|max:2048',
            'img_Creative_and_Channel_Synergy' => 'nullable|image|max:2048',
        ]);

        $content = PublicPresenceContent::first() ?? new PublicPresenceContent();

        // Upload gambar jika ada
        if ($request->hasFile('head_img')) {
            $content->head_img = $request->file('head_img')->store('public/subservices');
        }

        if ($request->hasFile('img_INSIGHT_DRIVEN_STRATEGY')) {
            $content->img_INSIGHT_DRIVEN_STRATEGY = $request->file('img_INSIGHT_DRIVEN_STRATEGY')->store('public/subservices');
        }

        if ($request->hasFile('img_Creative_and_Channel_Synergy')) {
            $content->img_Creative_and_Channel_Synergy = $request->file('img_Creative_and_Channel_Synergy')->store('public/subservices');
        }

        // Update text fields
        $content->INSIGHT_DRIVEN_STRATEGY = $request->INSIGHT_DRIVEN_STRATEGY;
        $content->desc_INSIGHT_DRIVEN_STRATEGY = $request->desc_INSIGHT_DRIVEN_STRATEGY;
        $content->Creative_and_Channel_Synergy = $request->Creative_and_Channel_Synergy;
        $content->desc_Creative_and_Channel_Synergy = $request->desc_Creative_and_Channel_Synergy;

        $content->save();

        return redirect()->back()->with('success', 'Content saved successfully!');
    }
}
