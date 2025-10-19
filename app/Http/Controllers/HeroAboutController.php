<?php

namespace App\Http\Controllers;

use App\Models\HeroAbout;
use Illuminate\Http\Request;

class HeroAboutController extends Controller
{
    public function edit()
    {
        $heroAbout = HeroAbout::firstOrCreate([]);

        return view('heroes-about.edit', compact('heroAbout'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'box_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'about_us' => 'nullable|string',
            'philosophy_title_1' => 'nullable|string|max:255',
            'content_philosophy_title_1' => 'nullable|string',
            'philosophy_title_2' => 'nullable|string|max:255',
            'content_philosophy_title_2' => 'nullable|string',
            'philosophy_title_3' => 'nullable|string|max:255',
            'content_philosophy_title_3' => 'nullable|string',
        ]);

        $heroAbout = HeroAbout::firstOrCreate([]);
        $data = $request->except('box_img');

        if ($request->hasFile('box_img')) {
            // Hapus gambar lama jika ada
            if ($heroAbout->box_img && file_exists(public_path($heroAbout->box_img))) {
                unlink(public_path($heroAbout->box_img));
            }

            $file = $request->file('box_img');
            $filename = time().'_'.preg_replace('/\s+/', '_', $file->getClientOriginalName());

            $destinationPath = public_path('uploads/about');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $data['box_img'] = 'uploads/about/'.$filename;
        }

        $heroAbout->update($data);

        return redirect()->route('admin.heroes-about.edit')->with('success', 'Hero About content updated successfully.');
    }

    public function destroyImage(HeroAbout $heroAbout)
    {
        if ($heroAbout->box_img && file_exists(public_path($heroAbout->box_img))) {
            unlink(public_path($heroAbout->box_img));
            $heroAbout->box_img = null;
            $heroAbout->save();
        }

        return redirect()->route('admin.heroes-about.edit')->with('success', 'Image deleted successfully.');
    }
}
