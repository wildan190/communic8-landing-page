<?php

namespace App\Http\Controllers;

use App\Models\BrandForgeContent;
use Illuminate\Http\Request;

class BrandForgeContentController extends Controller
{
    // 📝 Tampilkan form (buat atau edit)
    public function form()
    {
        $content = BrandForgeContent::first();

        return view('brandforge.form', compact('content'));
    }

    // 💾 Simpan atau update konten
    public function save(Request $request)
    {
        $validated = $request->validate([
            'head_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'insight_strategy_driven' => 'nullable|string|max:255',
            'desc_insight_strategy_driven' => 'nullable|string',
            'img_insight_strategy_driven' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'bold_creative_ideas' => 'nullable|string|max:255',
            'desc_bold_creative_ideas' => 'nullable|string',
            'img_bold_creative_ideas' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'impactful_visual_identity' => 'nullable|string|max:255',
            'desc_impactful_visual_identity' => 'nullable|string',
            'img_impactful_visual_identity' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // ✅ Tambahan baru
            'img_framework' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'align_strategic_foundation' => 'nullable|string',
            'build_constructing_the_brand_world' => 'nullable|string',
            'maintain_ensuring_lasting_relevance' => 'nullable|string',

            // ✅ Tambahan Bahasa Indonesia
            'insight_strategy_driven_id' => 'nullable|string|max:255',
            'desc_insight_strategy_driven_id' => 'nullable|string',
            'bold_creative_ideas_id' => 'nullable|string|max:255',
            'desc_bold_creative_ideas_id' => 'nullable|string',
            'impactful_visual_identity_id' => 'nullable|string|max:255',
            'desc_impactful_visual_identity_id' => 'nullable|string',
            'align_strategic_foundation_id' => 'nullable|string',
            'build_constructing_the_brand_world_id' => 'nullable|string',
            'maintain_ensuring_lasting_relevance_id' => 'nullable|string',
        ]);

        // Ambil konten pertama atau buat baru
        $content = BrandForgeContent::first() ?? new BrandForgeContent;

        // 📤 Upload semua gambar jika ada dan hapus yang lama jika update
        foreach (['head_img', 'img_insight_strategy_driven', 'img_bold_creative_ideas', 'img_impactful_visual_identity', 'img_framework'] as $field) {
            if ($request->hasFile($field)) {
                // Hapus gambar lama jika ada
                if ($content->$field && file_exists(public_path('storage/'.$content->$field))) {
                    unlink(public_path('storage/'.$content->$field));
                }

                $file = $request->file($field);
                $filename = time().'_'.$file->getClientOriginalName();

                // Pastikan folder tujuan ada
                $destinationPath = public_path('storage/brandforge');
                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                // Pindahkan file ke folder publik
                $file->move($destinationPath, $filename);

                // Simpan path relatif (untuk asset())
                $validated[$field] = 'brandforge/'.$filename;
            } else {
                // Jika tidak upload baru dan sudah ada gambar lama → tetap pakai yang lama
                if ($content->$field) {
                    $validated[$field] = $content->$field;
                }
            }
        }

        // Simpan data (termasuk teks dan gambar)
        $content->fill($validated);

        // Sanitize field yang mungkin mengandung HTML
        $content->insight_strategy_driven = clean($request->input('insight_strategy_driven'));
        $content->desc_insight_strategy_driven = clean($request->input('desc_insight_strategy_driven'));
        $content->bold_creative_ideas = clean($request->input('bold_creative_ideas'));
        $content->desc_bold_creative_ideas = clean($request->input('desc_bold_creative_ideas'));
        $content->impactful_visual_identity = clean($request->input('impactful_visual_identity'));
        $content->desc_impactful_visual_identity = clean($request->input('desc_impactful_visual_identity'));
        $content->align_strategic_foundation = clean($request->input('align_strategic_foundation'));
        $content->build_constructing_the_brand_world = clean($request->input('build_constructing_the_brand_world'));
        $content->maintain_ensuring_lasting_relevance = clean($request->input('maintain_ensuring_lasting_relevance'));

        // Sanitize field Bahasa Indonesia
        $content->insight_strategy_driven_id = clean($request->input('insight_strategy_driven_id'));
        $content->desc_insight_strategy_driven_id = clean($request->input('desc_insight_strategy_driven_id'));
        $content->bold_creative_ideas_id = clean($request->input('bold_creative_ideas_id'));
        $content->desc_bold_creative_ideas_id = clean($request->input('desc_bold_creative_ideas_id'));
        $content->impactful_visual_identity_id = clean($request->input('impactful_visual_identity_id'));
        $content->desc_impactful_visual_identity_id = clean($request->input('desc_impactful_visual_identity_id'));
        $content->align_strategic_foundation_id = clean($request->input('align_strategic_foundation_id'));
        $content->build_constructing_the_brand_world_id = clean($request->input('build_constructing_the_brand_world_id'));
        $content->maintain_ensuring_lasting_relevance_id = clean($request->input('maintain_ensuring_lasting_relevance_id'));

        $content->save();

        return redirect()->route('brandforge.form')->with('success', 'Konten berhasil disimpan.');
    }
}
