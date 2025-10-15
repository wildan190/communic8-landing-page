<?php

namespace App\Http\Controllers;

use App\Models\PublicPresenceContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PublicPresenceContentController extends Controller
{
    // 🧭 Tampilkan data
    public function index()
    {
        $content = PublicPresenceContent::first();

        return view('public_presence.index', compact('content'));
    }

    // 💾 Simpan atau update data
    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'head_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_INSIGHT_DRIVEN_STRATEGY' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_Creative_and_Channel_Synergy' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $content = PublicPresenceContent::first() ?? new PublicPresenceContent;

        // ✅ Upload head_img
        if ($request->hasFile('head_img')) {
            if ($content->head_img && file_exists(public_path('storage/'.$content->head_img))) {
                unlink(public_path('storage/'.$content->head_img));
            }

            $file = $request->file('head_img');
            $filename = time().'_head_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('storage/public_presence');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $content->head_img = 'public_presence/'.$filename;
        }

        // ✅ Upload img_INSIGHT_DRIVEN_STRATEGY
        if ($request->hasFile('img_INSIGHT_DRIVEN_STRATEGY')) {
            if ($content->img_INSIGHT_DRIVEN_STRATEGY && file_exists(public_path('storage/'.$content->img_INSIGHT_DRIVEN_STRATEGY))) {
                unlink(public_path('storage/'.$content->img_INSIGHT_DRIVEN_STRATEGY));
            }

            $file = $request->file('img_INSIGHT_DRIVEN_STRATEGY');
            $filename = time().'_insight_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('storage/public_presence');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $content->img_INSIGHT_DRIVEN_STRATEGY = 'public_presence/'.$filename;
        }

        // ✅ Upload img_Creative_and_Channel_Synergy
        if ($request->hasFile('img_Creative_and_Channel_Synergy')) {
            if ($content->img_Creative_and_Channel_Synergy && file_exists(public_path('storage/'.$content->img_Creative_and_Channel_Synergy))) {
                unlink(public_path('storage/'.$content->img_Creative_and_Channel_Synergy));
            }

            $file = $request->file('img_Creative_and_Channel_Synergy');
            $filename = time().'_creative_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('storage/public_presence');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $content->img_Creative_and_Channel_Synergy = 'public_presence/'.$filename;
        }

        // 📝 Simpan text field
        $content->INSIGHT_DRIVEN_STRATEGY = $request->INSIGHT_DRIVEN_STRATEGY;
        $content->desc_INSIGHT_DRIVEN_STRATEGY = $request->desc_INSIGHT_DRIVEN_STRATEGY;
        $content->Creative_and_Channel_Synergy = $request->Creative_and_Channel_Synergy;
        $content->desc_Creative_and_Channel_Synergy = $request->desc_Creative_and_Channel_Synergy;

        $content->save();

        return redirect()->back()->with('success', 'Content saved successfully!');
    }
}
