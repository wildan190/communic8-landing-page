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
            'img_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'title1' => 'nullable|string|max:255',
            'value_title1' => 'nullable|string',
            'title2' => 'nullable|string|max:255',
            'value_title2' => 'nullable|string',
            'title3' => 'nullable|string|max:255',
            'value_title3' => 'nullable|string',
            'title4' => 'nullable|string|max:255',
            'value_title4' => 'nullable|string',
            'title1_id' => 'nullable|string|max:255',
            'value_title1_id' => 'nullable|string',
            'title2_id' => 'nullable|string|max:255',
            'value_title2_id' => 'nullable|string',
            'title3_id' => 'nullable|string|max:255',
            'value_title3_id' => 'nullable|string',
            'title4_id' => 'nullable|string|max:255',
            'value_title4_id' => 'nullable|string',
        ]);

        $content = DigitalCompassContent::first() ?? new DigitalCompassContent();

        // Folder tujuan
        $destinationPath = public_path('storage/digital-compass');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // -------------------------------
        // ✅ Upload head_img
        // -------------------------------
        if ($request->hasFile('head_img')) {

            if ($content->head_img && file_exists(public_path('storage/' . $content->head_img))) {
                unlink(public_path('storage/' . $content->head_img));
            }

            $file = $request->file('head_img');
            $filename = time() . '_head_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);

            $content->head_img = 'digital-compass/' . $filename;
        }

        // -------------------------------
        // ✅ Upload img_services
        // -------------------------------
        if ($request->hasFile('img_services')) {

            if ($content->img_services && file_exists(public_path('storage/' . $content->img_services))) {
                unlink(public_path('storage/' . $content->img_services));
            }

            $file = $request->file('img_services');
            $filename = time() . '_services_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);

            $content->img_services = 'digital-compass/' . $filename;
        }

        // -------------------------------
        // ✅ Upload img_photo
        // -------------------------------
        if ($request->hasFile('img_photo')) {

            if ($content->img_photo && file_exists(public_path('storage/' . $content->img_photo))) {
                unlink(public_path('storage/' . $content->img_photo));
            }

            $file = $request->file('img_photo');
            $filename = time() . '_photo_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->move($destinationPath, $filename);

            $content->img_photo = 'digital-compass/' . $filename;
        }

        // -------------------------------
        // ✅ Save Titles & Values
        // -------------------------------
        for ($i = 1; $i <= 4; $i++) {
            $content->{'title' . $i} = $request->{'title' . $i};
            $content->{'value_title' . $i} = $request->{'value_title' . $i};
            $content->{'title' . $i . '_id'} = $request->{'title' . $i . '_id'};
            $content->{'value_title' . $i . '_id'} = $request->{'value_title' . $i . '_id'};
        }

        // Save database
        $content->save();

        return redirect()->back()->with('success', 'Digital Compass Content berhasil disimpan!');
    }
}
