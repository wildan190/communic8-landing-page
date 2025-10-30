<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SubService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'description' => 'nullable|string', // ✅
            'picture_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('picture_upload')) {
            $file = $request->file('picture_upload');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('storage/subservices');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['picture_upload'] = 'subservices/' . $filename;
        }

        SubService::create($validated);

        return redirect()->route('subservices.index')->with('success', 'SubService berhasil ditambahkan!');
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
            'description' => 'nullable|string', // ✅
            'picture_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('picture_upload')) {
            // Hapus gambar lama jika ada
            if ($subservice->picture_upload && file_exists(public_path('storage/' . $subservice->picture_upload))) {
                unlink(public_path('storage/' . $subservice->picture_upload));
            }

            $file = $request->file('picture_upload');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('storage/subservices');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['picture_upload'] = 'subservices/' . $filename;
        } else {
            $validated['picture_upload'] = $subservice->picture_upload;
        }

        $subservice->update($validated);

        return redirect()->route('subservices.index')->with('success', 'SubService berhasil diperbarui!');
    }

    // Destroy
    public function destroy(SubService $subservice)
    {
        if ($subservice->picture_upload && file_exists(public_path('storage/' . $subservice->picture_upload))) {
            unlink(public_path('storage/' . $subservice->picture_upload));
        }

        $subservice->delete();

        return redirect()->route('subservices.index')->with('success', 'SubService berhasil dihapus!');
    }
}
