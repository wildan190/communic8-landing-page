<?php

namespace App\Http\Controllers;

use App\Models\DigitalCompassContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DigitalCompassContentController extends Controller
{
    public function index()
    {
        $content = DigitalCompassContent::first();

        return view('digital-compass.index', compact('content'));
    }

    public function createOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'head_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_services' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // ✅ baru
            'title1' => 'nullable|string|max:255',
            'value_title1' => 'nullable|string',
            'title2' => 'nullable|string|max:255',
            'value_title2' => 'nullable|string',
            'title3' => 'nullable|string|max:255',
            'value_title3' => 'nullable|string',
            'title4' => 'nullable|string|max:255',
            'value_title4' => 'nullable|string',
        ]);

        $content = DigitalCompassContent::first() ?? new DigitalCompassContent();

        $destinationPath = public_path('storage/digital-compass');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // ✅ Upload photo baru
        if ($request->hasFile('img_photo')) {
            if ($content->img_photo && file_exists(public_path('storage/' . $content->img_photo))) {
                unlink(public_path('storage/' . $content->img_photo));
            }

            $file = $request->file('img_photo');
            $filename = time() . '_photo_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);
            $content->img_photo = 'digital-compass/' . $filename;
        }

        // ✅ Existing image handlers (head_img & img_services)
        // (tetap seperti sebelumnya — kode tidak dihapus)

        // ✅ Save text values
        for ($i = 1; $i <= 4; $i++) {
            $content->{'title' . $i} = $request->{'title' . $i};
            $content->{'value_title' . $i} = $request->{'value_title' . $i};
        }

        $content->save();

        return redirect()->back()->with('success', 'Digital Compass Content berhasil disimpan!');
    }
}
