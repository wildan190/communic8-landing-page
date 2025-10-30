<?php

namespace App\Http\Controllers;

use App\Models\CardServices;
use Illuminate\Http\Request;

class CardServicesController extends Controller
{
    public function index()
    {
        $cards = CardServices::all();
        return view('cardservices.index', compact('cards'));
    }

    public function create()
    {
        return view('cardservices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required',
            'title_id' => 'required',
            'desc_en' => 'required',
            'desc_id' => 'required',
            'route_name' => 'required',
            'button_en' => 'required',
            'button_id' => 'required',
            'img' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // upload image
        $file = $request->file('img');
        $filename = time() . '_' . $file->getClientOriginalName();

        $destinationPath = public_path('storage/services');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);
        $imagePath = 'services/' . $filename;

        CardServices::create([
            'title_en' => $request->title_en,
            'title_id' => $request->title_id,
            'desc_en' => $request->desc_en,
            'desc_id' => $request->desc_id,
            'img' => $imagePath,
            'route_name' => $request->route_name,
            'button_en' => $request->button_en,
            'button_id' => $request->button_id,
        ]);

        return redirect()->route('card-services.index')->with('success', 'Service card berhasil ditambahkan.');
    }

    public function edit(CardServices $card_service)
    {
        return view('cardservices.edit', compact('card_service'));
    }

    public function update(Request $request, CardServices $card_service)
    {
        $request->validate([
            'title_en' => 'required',
            'title_id' => 'required',
            'desc_en' => 'required',
            'desc_id' => 'required',
            'route_name' => 'required',
            'button_en' => 'required',
            'button_id' => 'required',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'title_en', 'title_id', 'desc_en', 'desc_id',
            'route_name', 'button_en', 'button_id'
        ]);

        // Jika upload gambar baru
        if ($request->hasFile('img')) {

            // delete old file if exists
            if ($card_service->img && file_exists(public_path('storage/' . $card_service->img))) {
                unlink(public_path('storage/' . $card_service->img));
            }

            $file = $request->file('img');
            $filename = time() . '_' . $file->getClientOriginalName();

            $destinationPath = public_path('storage/services');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $data['img'] = 'services/' . $filename;
        }

        $card_service->update($data);

        return redirect()->route('card-services.index')->with('success', 'Service card berhasil diperbarui.');
    }

    public function destroy(CardServices $card_service)
    {
        if ($card_service->img && file_exists(public_path('storage/' . $card_service->img))) {
            unlink(public_path('storage/' . $card_service->img));
        }

        $card_service->delete();

        return redirect()->route('card-services.index')->with('success', 'Service card berhasil dihapus.');
    }
}
