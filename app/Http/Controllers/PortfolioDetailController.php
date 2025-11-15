<?php

namespace App\Http\Controllers;

use App\Models\PortfolioDetail;
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
        $clients = \App\Models\Client::all(); // ambil semua client
        return view('portfolio-detail.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'client_id' => 'nullable|integer',
            'description' => 'nullable|string',
            'delivery' => 'nullable|string',
            'project_analysis' => 'nullable|string',
            'challenges_and_insight' => 'nullable|string',
            'bg_hero' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // project results
            'results.*.name' => 'nullable|string|max:255',
            'results.*.description' => 'nullable|string',
            'results.*.result_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // === Upload untuk bg_hero dan img ===
        foreach (['bg_hero', 'img'] as $field) {
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

        // Simpan PortfolioDetail utama
        $portfolioDetail = PortfolioDetail::create($validated);

        // === Simpan Project Results (jika ada) ===
        if ($request->has('results')) {
            foreach ($request->results as $index => $resultData) {
                if (empty($resultData['name']) && empty($resultData['description']) && empty($resultData['result_img'])) {
                    continue;
                }

                $data = [
                    'name' => $resultData['name'] ?? '',
                    'description' => $resultData['description'] ?? '',
                    'portfolio_detail_id' => $portfolioDetail->id,
                ];

                // upload result_img
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
        return view('portfolio-detail.edit', compact('portfolioDetail', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $portfolioDetail = PortfolioDetail::findOrFail($id);

        $validated = $request->validate([
            'hero_title' => 'required|string|max:255',
            'client_id' => 'nullable|integer',
            'description' => 'nullable|string',
            'delivery' => 'nullable|string',
            'project_analysis' => 'nullable|string',
            'challenges_and_insight' => 'nullable|string',
            'bg_hero' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        foreach (['bg_hero', 'img'] as $field) {
            if ($request->hasFile($field)) {
                // Hapus file lama jika ada
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

        $portfolioDetail->update($validated);
        return redirect()->route('portfolio-detail.index')->with('success', 'Portfolio Detail updated successfully.');
    }

    public function destroy($id)
    {
        $portfolioDetail = PortfolioDetail::findOrFail($id);

        // Hapus file gambar jika ada
        foreach (['bg_hero', 'img'] as $field) {
            if (!empty($portfolioDetail->$field) && file_exists(public_path('storage/' . $portfolioDetail->$field))) {
                unlink(public_path('storage/' . $portfolioDetail->$field));
            }
        }

        $portfolioDetail->delete();
        return redirect()->route('portfolio-detail.index')->with('success', 'Portfolio Detail deleted successfully.');
    }
}
