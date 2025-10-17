<?php

namespace App\Http\Controllers;

use App\Models\LandingPage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Tampilkan halaman pengaturan landing page (create/update)
     */
    public function index()
    {
        $landing = LandingPage::first();

        return view('ott-advertising.index', compact('landing'));
    }

    /**
     * Simpan atau update data landing page (create or update)
     */
    public function saveorupdate(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'banner_text' => 'nullable|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title_text1' => 'nullable|string|max:255',
            'description1' => 'nullable|string',
            'title_text2' => 'nullable|string|max:255',
            'description2' => 'nullable|string',
            'title_text3' => 'nullable|string|max:255',
            'description3' => 'nullable|string',
        ]);

        // Ambil data landing page pertama
        $landing = LandingPage::first();

        // Upload file manual (tanpa Storage facade)
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = time().'_'.$file->getClientOriginalName();
            $uploadPath = public_path('uploads/landing');

            // Pastikan folder ada
            if (! file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Pindahkan file ke folder public/uploads/landing
            $file->move($uploadPath, $filename);

            // Simpan path relatif ke DB
            $validated['img'] = 'uploads/landing/'.$filename;
        }

        // Jika sudah ada, update — jika belum, buat baru
        if ($landing) {
            $landing->update($validated);
        } else {
            LandingPage::create($validated);
        }

        return redirect()->back()->with('success', 'Landing Page saved successfully!');
    }
}
