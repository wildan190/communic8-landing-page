<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Tampilkan halaman pengaturan landing page
     */
    public function index()
    {
        $landing = LandingPage::first();
        return view('ott-advertising.index', compact('landing'));
    }

    /**
     * Simpan atau update data landing page
     */
    public function saveorupdate(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'title_id' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'subtitle_id' => 'nullable|string|max:255',
            'banner_text' => 'nullable|string',
            'banner_text_id' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_4' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_5' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title_text1' => 'nullable|string|max:255',
            'title_text1_id' => 'nullable|string|max:255',
            'description1' => 'nullable|string',
            'description1_id' => 'nullable|string',
            'title_text2' => 'nullable|string|max:255',
            'title_text2_id' => 'nullable|string|max:255',
            'description2' => 'nullable|string',
            'description2_id' => 'nullable|string',
            'title_text3' => 'nullable|string|max:255',
            'title_text3_id' => 'nullable|string',
            'description3' => 'nullable|string',
            'description3_id' => 'nullable|string',
            'section1_en_title' => 'nullable|string',
            'section1_en_p1' => 'nullable|string',
            'section1_en_p2' => 'nullable|string',
            'section1_id_title' => 'nullable|string',
            'section1_id_p1' => 'nullable|string',
            'section1_id_p2' => 'nullable|string',
            'section2_en_title' => 'nullable|string',
            'section2_en_p1' => 'nullable|string',
            'section2_en_p2' => 'nullable|string',
            'section2_id_title' => 'nullable|string',
            'section2_id_p1' => 'nullable|string',
            'section2_id_p2' => 'nullable|string',
        ]);

        $landing = LandingPage::first();

        $uploadPath = public_path('uploads/landing');
        if (! file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Upload banner image
        if ($request->hasFile('img')) {
            if ($landing && $landing->img && file_exists(public_path($landing->img))) {
                unlink(public_path($landing->img));
            }
            $file = $request->file('img');
            $filename = time().'_banner_'.$file->getClientOriginalName();
            $file->move($uploadPath, $filename);
            $validated['img'] = 'uploads/landing/'.$filename;
        }

        // Upload img_1 sampai img_5
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('img_'.$i)) {
                if ($landing && $landing->{'img_'.$i} && file_exists(public_path($landing->{'img_'.$i}))) {
                    unlink(public_path($landing->{'img_'.$i}));
                }
                $file = $request->file('img_'.$i);
                $filename = time().'_img'.$i.'_'.$file->getClientOriginalName();
                $file->move($uploadPath, $filename);
                $validated['img_'.$i] = 'uploads/landing/'.$filename;
            }
        }

        // Process sections
        $validated['section1_en'] = json_encode([
            'title' => $request->section1_en_title,
            'p1' => $request->section1_en_p1,
            'p2' => $request->section1_en_p2,
        ]);
        $validated['section1_id'] = json_encode([
            'title' => $request->section1_id_title,
            'p1' => $request->section1_id_p1,
            'p2' => $request->section1_id_p2,
        ]);
        $validated['section2_en'] = json_encode([
            'title' => $request->section2_en_title,
            'p1' => $request->section2_en_p1,
            'p2' => $request->section2_en_p2,
        ]);
        $validated['section2_id'] = json_encode([
            'title' => $request->section2_id_title,
            'p1' => $request->section2_id_p1,
            'p2' => $request->section2_id_p2,
        ]);


        // Update atau create
        if ($landing) {
            $landing->update($validated);
        } else {
            LandingPage::create($validated);
        }

        return redirect()->back()->with('success', 'Landing Page saved successfully!');
    }
}
