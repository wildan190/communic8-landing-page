<?php

namespace App\Http\Controllers;

use App\Models\Value;
use Illuminate\Http\Request;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $values = Value::all();
        return view('values.index', compact('values'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('values.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|string|unique:values,key',
            'title' => 'required|string',
            'value' => 'required|string',
            'icon' => 'required|string',
        ]);

        Value::create($request->all());

        return redirect()->route('values.index')
            ->with('success', 'Value created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Value $value)
    {
        // Not typically needed for a simple value resource, but included for completeness.
        return view('values.show', compact('value'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Value $value)
    {
        return view('values.edit', compact('value'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Value $value)
    {
        $request->validate([
            'key' => 'required|string|unique:values,key,' . $value->id,
            'title' => 'required|string',
            'value' => 'required|string',
            'icon' => 'required|string',
        ]);

        $value->update($request->all());

        return redirect()->route('values.index')
            ->with('success', 'Value updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Value $value)
    {
        $value->delete();

        return redirect()->route('values.index')
            ->with('success', 'Value deleted successfully.');
    }
}