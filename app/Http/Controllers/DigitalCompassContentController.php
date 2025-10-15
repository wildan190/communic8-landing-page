<?php

namespace App\Http\Controllers;

use App\Models\DigitalCompassContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DigitalCompassContentController extends Controller
{
    // 📄 Tampilkan form dan data
    public function index()
    {
        $content = DigitalCompassContent::first();

        return view('digital-compass.index', compact('content'));
    }

    // ✏️ Simpan atau update konten
    public function createOrUpdate(Request $request)
    {
        $validated = $request->validate([
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

        $content = DigitalCompassContent::first() ?? new DigitalCompassContent;

        // 🔧 Pastikan folder tujuan ada (public/storage/digital-compass)
        $destinationPath = public_path('storage/digital-compass');
        if (! file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // ✅ Upload head_img
        if ($request->hasFile('head_img')) {
            if ($content->head_img && file_exists(public_path('storage/'.$content->head_img))) {
                unlink(public_path('storage/'.$content->head_img));
            }

            $file = $request->file('head_img');
            $filename = time().'_head_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $content->head_img = 'digital-compass/'.$filename;
        }

        // ✅ Upload img_services
        if ($request->hasFile('img_services')) {
            if ($content->img_services && file_exists(public_path('storage/'.$content->img_services))) {
                unlink(public_path('storage/'.$content->img_services));
            }

            $file = $request->file('img_services');
            $filename = time().'_services_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $content->img_services = 'digital-compass/'.$filename;
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

        return redirect()->back()->with('success', 'Digital Compass Content berhasil disimpan!');
    }
}
