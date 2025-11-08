<?php

namespace App\Http\Controllers;

use App\Models\HeroHome;
use Illuminate\Http\Request;

class HeroHomeController extends Controller
{
    public function index()
    {
        $hero = HeroHome::first();
        return view('herohome.index', compact('hero'));
    }

    public function save(Request $request)
    {
        $data = $request->validate([
            'description' => 'required|string',
            'description_en' => 'required|string',
        ]);

        $hero = HeroHome::first();

        if ($hero) {
            $hero->update($data);
        } else {
            HeroHome::create($data);
        }

        return back()->with('success', 'Hero description updated!');
    }
}
