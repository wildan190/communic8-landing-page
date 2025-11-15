<?php

namespace App\Http\Controllers;

use App\Models\ProjectResult;
use App\Models\PortfolioDetail;
use Illuminate\Http\Request;

class ProjectResultController extends Controller
{
    public function create($portfolioDetailId)
    {
        $portfolioDetail = PortfolioDetail::findOrFail($portfolioDetailId);
        return view('project-result.create', compact('portfolioDetail'));
    }

    public function store(Request $request, $portfolioDetailId)
    {
        $portfolioDetail = PortfolioDetail::findOrFail($portfolioDetailId);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'result_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['portfolio_detail_id'] = $portfolioDetail->id;

        // upload file
        if ($request->hasFile('result_img')) {
            $file = $request->file('result_img');
            $filename = time().'_'.$file->getClientOriginalName();

            $destinationPath = public_path('storage/project-result');
            if (! file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $validated['result_img'] = 'project-result/'.$filename;
        }

        ProjectResult::create($validated);

        return redirect()->route('portfolio-detail.edit', $portfolioDetail->id)
            ->with('success', 'Project Result added successfully.');
    }

    public function destroy($id)
    {
        $result = ProjectResult::findOrFail($id);

        if (!empty($result->result_img) && file_exists(public_path('storage/'.$result->result_img))) {
            unlink(public_path('storage/'.$result->result_img));
        }

        $result->delete();
        return back()->with('success', 'Project Result deleted successfully.');
    }
}
