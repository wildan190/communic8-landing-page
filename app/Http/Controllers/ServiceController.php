<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // 📜 Tampilkan semua services
    public function index(Request $request)
    {
        $query = Service::query();

        if ($request->has('q') && $request->q !== '') {
            $query->where('name', 'like', '%'.$request->q.'%')
                ->orWhere('description', 'like', '%'.$request->q.'%');
        }

        $services = $query->latest()->paginate(10);

        return view('services.index', compact('services'));
    }

    // 🆕 Form tambah service
    public function create()
    {
        return view('services.create');
    }

    // 💾 Simpan service baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Service::create($validated);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service berhasil ditambahkan.');
    }

    // 👁️‍🗨️ Detail service
    public function show($id)
    {
        $service = Service::findOrFail($id);

        return view('services.show', compact('service'));
    }

    // ✏️ Form edit service
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('services.edit', compact('service'));
    }

    // 🔄 Update service
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $service->update($validated);

        return redirect()
            ->route('services.index')
            ->with('success', 'Service berhasil diperbarui.');
    }

    // 🗑️ Hapus service
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()
            ->route('services.index')
            ->with('success', 'Service berhasil dihapus.');
    }
}
