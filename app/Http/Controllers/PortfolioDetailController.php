<?php

namespace App\Http\Controllers;

use App\Models\PortfolioDetail;
use App\Models\Project;
use App\Models\ProjectResult;
use Illuminate\Http\Request;

class PortfolioDetailController extends Controller
{
    public function index()
    {
        $portfolioDetails = PortfolioDetail::all();
        return view('portfolio-detail.index', compact('portfolioDetails'));
    }

    public function create()
    {
        $clients = \App\Models\Client::all();
        $projects = Project::all();
        return view('portfolio-detail.create', compact('clients', 'projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_title_id' => 'nullable|string|max:255',
            'client_id' => 'nullable|integer',
            'project_id' => 'nullable|exists:projects,id',
            'description' => 'nullable|string',
            'description_id' => 'nullable|string',
            'delivery' => 'nullable|string',
            'project_analysis' => 'nullable|string',
            'project_analysis_id' => 'nullable|string',
            'challenges_and_insight' => 'nullable|string',
            'challenges_and_insight_id' => 'nullable|string',
            'bg_hero' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_project_analysis' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_challenges_and_insight' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // project results
            'results.*.name' => 'nullable|string|max:255',
            'results.*.description' => 'nullable|string',
            'results.*.result_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        foreach (['bg_hero', 'img', 'img_project_analysis', 'img_challenges_and_insight'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $file->getClientOriginalName();

                $destinationPath = public_path('storage/portfolio-detail');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $validated[$field] = 'portfolio-detail/' . $filename;
            }
        }

        // Simpan PortfolioDetail
        $portfolioDetail = PortfolioDetail::create($validated);

        // Simpan Project Results
        if ($request->has('results')) {
            foreach ($request->results as $resultData) {
                if (empty($resultData['name']) && empty($resultData['description']) && empty($resultData['result_img'])) {
                    continue;
                }

                $data = [
                    'name' => $resultData['name'] ?? '',
                    'description' => $resultData['description'] ?? '',
                    'portfolio_detail_id' => $portfolioDetail->id,
                ];

                if (isset($resultData['result_img']) && $resultData['result_img'] instanceof \Illuminate\Http\UploadedFile) {
                    $file = $resultData['result_img'];
                    $filename = time() . '_' . $file->getClientOriginalName();

                    $destinationPath = public_path('storage/project-result');
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0755, true);
                    }

                    $file->move($destinationPath, $filename);
                    $data['result_img'] = 'project-result/' . $filename;
                }

                ProjectResult::create($data);
            }
        }

        return redirect()->route('portfolio-detail.index')->with('success', 'Portfolio Detail and Results created successfully.');
    }

    public function edit($id)
    {
        $portfolioDetail = PortfolioDetail::with('projectResults')->findOrFail($id);
        $clients = \App\Models\Client::all();
        $projects = Project::all();
        return view('portfolio-detail.edit', compact('portfolioDetail', 'clients', 'projects'));
    }

    public function update(Request $request, $id)
    {
        $portfolioDetail = PortfolioDetail::with('projectResults')->findOrFail($id);

        // ============================
        // VALIDASI
        // ============================
        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_title_id' => 'nullable|string|max:255',
            'client_id' => 'nullable|integer',
            'project_id' => 'nullable|exists:projects,id',
            'description' => 'nullable|string',
            'description_id' => 'nullable|string',
            'delivery' => 'nullable|string',
            'project_analysis' => 'nullable|string',
            'project_analysis_id' => 'nullable|string',
            'challenges_and_insight' => 'nullable|string',
            'challenges_and_insight_id' => 'nullable|string',
            'bg_hero' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_project_analysis' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img_challenges_and_insight' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // project result validation
            'results.*.id' => 'nullable|integer',
            'results.*.name' => 'nullable|string|max:255',
            'results.*.description' => 'nullable|string',
            'results.*.result_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ============================
        // UPLOAD FILE PORTFOLIO DETAIL
        // ============================
        foreach (['bg_hero', 'img', 'img_project_analysis', 'img_challenges_and_insight'] as $field) {
            if ($request->hasFile($field)) {
                // hapus file lama
                if (!empty($portfolioDetail->$field) && file_exists(public_path('storage/' . $portfolioDetail->$field))) {
                    unlink(public_path('storage/' . $portfolioDetail->$field));
                }

                $file = $request->file($field);
                $filename = time() . '_' . $file->getClientOriginalName();

                $destinationPath = public_path('storage/portfolio-detail');
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $validated[$field] = 'portfolio-detail/' . $filename;
            }
        }

        // ============================
        // UPDATE PORTFOLIO DETAIL
        // ============================
        $portfolioDetail->update($validated);

        // ============================
        // UPDATE PROJECT RESULTS
        // ============================
        if ($request->has('results')) {
            $existingIds = $portfolioDetail->projectResults->pluck('id')->toArray();
            $incomingIds = [];

            foreach ($request->results as $key => $resultData) {
                // skip jika kosong semua
                if (empty($resultData['name']) && empty($resultData['description']) && empty($resultData['result_img'])) {
                    continue;
                }

                // jika punya id → update data lama
                if (!empty($resultData['id'])) {
                    $incomingIds[] = $resultData['id'];
                    $result = ProjectResult::find($resultData['id']);
                } else {
                    // data baru → create
                    $result = new ProjectResult();
                    $result->portfolio_detail_id = $portfolioDetail->id;
                }

                // update text
                $result->name = $resultData['name'] ?? '';
                $result->description = $resultData['description'] ?? '';

                // upload gambar baru
                if (isset($resultData['result_img']) && $resultData['result_img'] instanceof \Illuminate\Http\UploadedFile) {
                    // hapus gambar lama
                    if (!empty($result->result_img) && file_exists(public_path('storage/' . $result->result_img))) {
                        unlink(public_path('storage/' . $result->result_img));
                    }

                    $file = $resultData['result_img'];
                    $filename = time() . '_' . $file->getClientOriginalName();

                    $destinationPath = public_path('storage/project-result');
                    if (!file_exists($destinationPath)) {
                        mkdir($destinationPath, 0755, true);
                    }

                    $file->move($destinationPath, $filename);
                    $result->result_img = 'project-result/' . $filename;
                }

                $result->save();
            }

            // hasil yang dihapus dari form
            $deleteIds = array_diff($existingIds, $incomingIds);
            ProjectResult::whereIn('id', $deleteIds)->delete();
        }

        return redirect()->route('portfolio-detail.index')->with('success', 'Portfolio Detail updated successfully.');
    }

    public function destroy($id)
    {
        $portfolioDetail = PortfolioDetail::findOrFail($id);

        foreach (['bg_hero', 'img', 'img_project_analysis', 'img_challenges_and_insight'] as $field) {
            if (!empty($portfolioDetail->$field) && file_exists(public_path('storage/' . $portfolioDetail->$field))) {
                unlink(public_path('storage/' . $portfolioDetail->$field));
            }
        }

        $portfolioDetail->delete();
        return redirect()->route('portfolio-detail.index')->with('success', 'Portfolio Detail deleted successfully.');
    }
}
