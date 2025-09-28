<?php

namespace App\Http\Controllers;

use App\Models\DigitalCompassContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $content = DigitalCompassContent::first() ?? new DigitalCompassContent;

        $content->title1 = $request->title1;
        $content->value_title1 = $request->value_title1;
        $content->title2 = $request->title2;
        $content->value_title2 = $request->value_title2;
        $content->title3 = $request->title3;
        $content->value_title3 = $request->value_title3;
        $content->title4 = $request->title4;
        $content->value_title4 = $request->value_title4;

        // ✅ Upload head_img
        if ($request->hasFile('head_img')) {
            if ($content->head_img) {
                Storage::delete($content->head_img);
            }
            $content->head_img = $request->file('head_img')->store('digital_compass', 'public');
        }

        // ✅ Upload img_services
        if ($request->hasFile('img_services')) {
            if ($content->img_services) {
                Storage::delete($content->img_services);
            }
            $content->img_services = $request->file('img_services')->store('digital_compass', 'public');
        }

        $content->save();

        return redirect()->back()->with('success', 'Digital Compass Content berhasil disimpan!');
    }
}
