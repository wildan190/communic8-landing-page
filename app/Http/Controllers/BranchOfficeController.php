<?php

namespace App\Http\Controllers;

use App\Models\BranchOffice;
use Illuminate\Http\Request;

class BranchOfficeController extends Controller
{
    public function index()
    {
        $branches = BranchOffice::latest()->paginate(10);

        return view('branch_offices.index', compact('branches'));
    }

    public function create()
    {
        return view('branch_offices.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'picture_upload' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
        ]);

        $data = $request->only(['name', 'address', 'phone']);

        if ($request->hasFile('picture_upload')) {
            $data['picture_upload'] = $request->file('picture_upload')->store('branch_offices', 'public');
        }

        BranchOffice::create($data);

        return redirect()->route('branch-offices.index')->with('success', 'Branch office created successfully.');
    }

    public function edit(BranchOffice $branchOffice)
    {
        return view('branch_offices.edit', compact('branchOffice'));
    }

    public function update(Request $request, BranchOffice $branchOffice)
    {
        $request->validate([
            'picture_upload' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'nullable|string|max:20',
        ]);

        $data = $request->only(['name', 'address', 'phone']);

        if ($request->hasFile('picture_upload')) {
            $data['picture_upload'] = $request->file('picture_upload')->store('branch_offices', 'public');
        }

        $branchOffice->update($data);

        return redirect()->route('branch-offices.index')->with('success', 'Branch office updated successfully.');
    }
}
