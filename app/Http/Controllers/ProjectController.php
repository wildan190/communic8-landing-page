<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'project_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'project_url' => 'nullable|url',
            'is_highlighted' => 'nullable|boolean',
        ]);

        // Boolean highlight
        $validated['is_highlighted'] = $request->has('is_highlighted');

        // Cegah lebih dari 2 project highlight
        if ($validated['is_highlighted'] && Project::where('is_highlighted', true)->count() >= 2) {
            return back()->withErrors(['is_highlighted' => 'Maximum 2 projects can be highlighted at a time.'])->withInput();
        }

        // 📤 Upload gambar ke public/storage/projects
        if ($request->hasFile('project_img')) {
            $file = $request->file('project_img');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('storage/projects');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['project_img'] = 'projects/'.$filename;
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
            'project_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'project_url' => 'nullable|url',
            'is_highlighted' => 'nullable|boolean',
        ]);

        $validated['is_highlighted'] = $request->has('is_highlighted');

        // Cegah lebih dari 2 highlight, kecuali project ini sendiri
        if ($validated['is_highlighted'] && Project::where('is_highlighted', true)->where('id', '!=', $project->id)->count() >= 2) {
            return back()->withErrors(['is_highlighted' => 'Maximum 2 projects can be highlighted at a time.'])->withInput();
        }

        // 📤 Upload baru jika ada file baru
        if ($request->hasFile('project_img')) {
            // Hapus gambar lama
            if ($project->project_img && file_exists(public_path('storage/'.$project->project_img))) {
                unlink(public_path('storage/'.$project->project_img));
            }

            $file = $request->file('project_img');
            $filename = time().'_'.Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)).'.'.$file->getClientOriginalExtension();

            $destinationPath = public_path('storage/projects');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['project_img'] = 'projects/'.$filename;
        }

        $project->update($validated);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        // 🧹 Hapus file fisik jika ada
        if ($project->project_img && file_exists(public_path('storage/'.$project->project_img))) {
            unlink(public_path('storage/'.$project->project_img));
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
