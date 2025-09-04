<?php

namespace App\Http\Controllers;

use App\Models\WebInformation;
use Illuminate\Http\Request;

class WebInformationController extends Controller
{
    public function index()
    {
        $webInfo = WebInformation::first();

        return view('web_information.index', compact('webInfo'));
    }

    public function create()
    {
        return view('web_information.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        WebInformation::create($request->all());

        return redirect()->route('web_information.index')->with('success', 'Informasi berhasil ditambahkan');
    }

    public function edit(WebInformation $webInformation)
    {
        return view('web_information.edit', compact('webInformation'));
    }

    public function update(Request $request, WebInformation $webInformation)
    {
        $request->validate([
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100',
            'address' => 'nullable|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);

        $webInformation->update($request->all());

        return redirect()->route('web_information.index')->with('success', 'Informasi berhasil diperbarui');
    }
}
