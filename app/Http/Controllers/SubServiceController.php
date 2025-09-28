<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubServiceController extends Controller
{
    // Index
    public function index()
    {
        $subservices = SubService::with('service')->latest()->paginate(10);

        return view('services.subservices.index', compact('subservices'));
    }

    // Create
    public function create()
    {
        $services = Service::all();

        return view('services.subservices.create', compact('services'));
    }

    // Store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'picture_upload' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('picture_upload')) {
            $validated['picture_upload'] = $request->file('picture_upload')->store('subservices', 'public');
        }

        SubService::create($validated);

        return redirect()->route('subservices.index')->with('success', 'SubService created successfully!');
    }

    // Edit
    public function edit(SubService $subservice)
    {
        $services = Service::all();

        return view('services.subservices.edit', compact('subservice', 'services'));
    }

    // Update
    public function update(Request $request, SubService $subservice)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'picture_upload' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('picture_upload')) {
            if ($subservice->picture_upload) {
                Storage::disk('public')->delete($subservice->picture_upload);
            }
            $validated['picture_upload'] = $request->file('picture_upload')->store('subservices', 'public');
        }

        $subservice->update($validated);

        return redirect()->route('subservices.index')->with('success', 'SubService updated successfully!');
    }

    // Destroy
    public function destroy(SubService $subservice)
    {
        if ($subservice->picture_upload) {
            Storage::disk('public')->delete($subservice->picture_upload);
        }
        $subservice->delete();

        return redirect()->route('subservices.index')->with('success', 'SubService deleted successfully!');
    }
}
