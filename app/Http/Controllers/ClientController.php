<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time().'_'.$file->getClientOriginalName();

            // Pastikan folder tujuan ada
            $destinationPath = public_path('storage/clients');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Pindahkan file ke folder public/storage/clients
            $file->move($destinationPath, $filename);

            // Simpan path relatif
            $logoPath = 'clients/'.$filename;
        }

        Client::create([
            'company_name' => $request->company_name,
            'industry' => $request->industry,
            'logo' => $logoPath,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client berhasil ditambahkan.');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['company_name', 'industry']);

        if ($request->hasFile('logo')) {
            // Hapus logo lama kalau ada
            if ($client->logo && file_exists(public_path('storage/'.$client->logo))) {
                unlink(public_path('storage/'.$client->logo));
            }

            $file = $request->file('logo');
            $filename = time().'_'.$file->getClientOriginalName();

            $destinationPath = public_path('storage/clients');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            $data['logo'] = 'clients/'.$filename;
        } else {
            // Tetap pakai logo lama kalau tidak upload baru
            $data['logo'] = $client->logo;
        }

        $client->update($data);

        return redirect()->route('clients.index')->with('success', 'Client berhasil diperbarui.');
    }

    public function destroy(Client $client)
    {
        if ($client->logo && file_exists(public_path('storage/'.$client->logo))) {
            unlink(public_path('storage/'.$client->logo));
        }

        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client berhasil dihapus.');
    }
}
