<?php

namespace App\Http\Controllers;

use App\Models\DigitalArchitectureContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DigitalArchitectureContentController extends Controller
{
    // ✅ Halaman index + form create/update
    public function index()
    {
        $content = DigitalArchitectureContent::first();
        return view('digitalarchitecture.index', compact('content'));
    }

    // ✅ Simpan atau update konten
    public function createOrUpdate(Request $request)
    {
        $request->validate([
            'head_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_services' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title1' => 'nullable|string|max:255',
            'value_title1' => 'nullable|string',
            'title2' => 'nullable|string|max:255',
            'value_title2' => 'nullable|string',
            'title3' => 'nullable|string|max:255',
            'value_title3' => 'nullable|string',
            'title4' => 'nullable|string|max:255',
            'value_title4' => 'nullable|string',
        ]);

        $content = DigitalArchitectureContent::first() ?? new DigitalArchitectureContent();

        // ✅ Upload head_img jika ada
        if ($request->hasFile('head_img')) {
            if ($content->head_img) {
                Storage::delete($content->head_img);
            }
            $content->head_img = $request->file('head_img')->store('digital-architecture', 'public');
        }

        // ✅ Upload img_services jika ada
        if ($request->hasFile('img_services')) {
            if ($content->img_services) {
                Storage::delete($content->img_services);
            }
            $content->img_services = $request->file('img_services')->store('digital-architecture', 'public');
        }

        // ✅ Simpan teks
        $content->title1 = $request->title1;
        $content->value_title1 = $request->value_title1;
        $content->title2 = $request->title2;
        $content->value_title2 = $request->value_title2;
        $content->title3 = $request->title3;
        $content->value_title3 = $request->value_title3;
        $content->title4 = $request->title4;
        $content->value_title4 = $request->value_title4;

        $content->save();

        return redirect()->back()->with('success', 'Digital Architecture content saved successfully!');
    }
}
