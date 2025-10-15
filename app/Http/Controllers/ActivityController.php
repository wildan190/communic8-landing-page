<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->paginate(10);

        return view('activities.index', compact('activities'));
    }

    public function create()
    {
        return view('activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'file_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = null;

        if ($request->hasFile('file_img')) {
            $file = $request->file('file_img');
            $filename = time().'_'.$file->getClientOriginalName();

            // Pastikan folder tujuan ada
            $destinationPath = public_path('storage/activities');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Pindahkan file ke folder publik
            $file->move($destinationPath, $filename);

            // Simpan path relatif untuk digunakan di view
            $path = 'activities/'.$filename;
        }

        Activity::create([
            'caption' => $request->caption,
            'file_img' => $path,
        ]);

        return redirect()->route('activities.index')->with('success', 'Activity created successfully.');
    }

    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'file_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $path = $activity->file_img;

        if ($request->hasFile('file_img')) {
            // Hapus file lama jika ada
            if ($path && file_exists(public_path('storage/'.$path))) {
                unlink(public_path('storage/'.$path));
            }

            $file = $request->file('file_img');
            $filename = time().'_'.$file->getClientOriginalName();

            $destinationPath = public_path('storage/activities');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $path = 'activities/'.$filename;
        }

        $activity->update([
            'caption' => $request->caption,
            'file_img' => $path,
        ]);

        return redirect()->route('activities.index')->with('success', 'Activity updated successfully.');
    }

    public function destroy(Activity $activity)
    {
        if ($activity->file_img && file_exists(public_path('storage/'.$activity->file_img))) {
            unlink(public_path('storage/'.$activity->file_img));
        }

        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
    }
}
