<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'project_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'project_url' => 'nullable|url',
        ]);

        if ($request->hasFile('project_img')) {
            $validated['project_img'] = $request->file('project_img')->store('projects', 'public');
        }

        Project::create($validated);

        return redirect()->route('projects.index')->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'client' => 'nullable|string|max:255',
            'project_img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'project_url' => 'nullable|url',
        ]);

        if ($request->hasFile('project_img')) {
            if ($project->project_img) {
                Storage::disk('public')->delete($project->project_img);
            }
            $validated['project_img'] = $request->file('project_img')->store('projects', 'public');
        }

        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        if ($project->project_img) {
            Storage::disk('public')->delete($project->project_img);
        }
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
