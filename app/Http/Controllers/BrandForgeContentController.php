<?php

namespace App\Http\Controllers;

use App\Models\BrandForgeContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandForgeContentController extends Controller
{
    // 📝 Tampilkan form (buat atau edit)
    public function form()
    {
        // Kita anggap hanya ada 1 konten BrandForgeContent
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
        ]);

        // Ambil konten pertama atau buat baru
        $content = BrandForgeContent::first();

        if (! $content) {
            $content = new BrandForgeContent;
        }

        // 📤 Upload semua gambar jika ada dan hapus yang lama jika update
        foreach (['head_img', 'img_insight_strategy_driven', 'img_bold_creative_ideas', 'img_impactful_visual_identity'] as $field) {
            if ($request->hasFile($field)) {
                // Hapus gambar lama jika ada
                if ($content->$field && Storage::disk('public')->exists($content->$field)) {
                    Storage::disk('public')->delete($content->$field);
                }
                // Simpan gambar baru
                $validated[$field] = $request->file($field)->store('brandforge', 'public');
            } else {
                // Jika tidak upload baru dan sudah ada gambar lama → tetap pakai yang lama
                if ($content->$field) {
                    $validated[$field] = $content->$field;
                }
            }
        }

        // Simpan data
        $content->fill($validated);
        $content->save();

        return redirect()->route('brandforge.form')->with('success', 'Konten berhasil disimpan.');
    }
}
