<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $path = $request->file('file_img')->store('activities', 'public');
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
            if ($path) {
                Storage::disk('public')->delete($path);
            }
            $path = $request->file('file_img')->store('activities', 'public');
        }

        $activity->update([
            'caption' => $request->caption,
            'file_img' => $path,
        ]);

        return redirect()->route('activities.index')->with('success', 'Activity updated successfully.');
    }

    public function destroy(Activity $activity)
    {
        if ($activity->file_img) {
            Storage::disk('public')->delete($activity->file_img);
        }
        $activity->delete();

        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully.');
    }
}
