<?php

namespace App\Http\Controllers;

use App\Models\IdeasAction;
use App\Models\PortfolioDetail;
use Illuminate\Http\Request;

class IdeasActionController extends Controller
{
    public function index()
    {
        $ideas = IdeasAction::with('portfolioDetail')->get();
        return view('ideas_actions.index', compact('ideas'));
    }

    public function create()
    {
        $portfolioDetails = PortfolioDetail::all();
        return view('ideas_actions.create', compact('portfolioDetails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'portfolio_detail_id' => 'required',
            'img_upload' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('img_upload')) {
            $fileName = time() . '.' . $request->img_upload->extension();
            $request->img_upload->move(public_path('uploads/ideas'), $fileName);
            $data['img_upload'] = $fileName;
        }

        IdeasAction::create($data);

        return redirect()->route('ideas-actions.index')
                         ->with('success', 'Data created successfully');
    }

    public function edit($id)
    {
        $idea = IdeasAction::findOrFail($id);
        $portfolioDetails = PortfolioDetail::all();

        return view('ideas_actions.edit', compact('idea', 'portfolioDetails'));
    }

    public function update(Request $request, $id)
    {
        $idea = IdeasAction::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'portfolio_detail_id' => 'required',
            'img_upload' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('img_upload')) {
            $fileName = time() . '.' . $request->img_upload->extension();
            $request->img_upload->move(public_path('uploads/ideas'), $fileName);
            $data['img_upload'] = $fileName;
        }

        $idea->update($data);

        return redirect()->route('ideas-actions.index')
                         ->with('success', 'Data updated successfully');
    }

    public function delete($id)
    {
        $idea = IdeasAction::findOrFail($id);

        // hapus file jika ada
        if ($idea->img_upload && file_exists(public_path('uploads/ideas/' . $idea->img_upload))) {
            unlink(public_path('uploads/ideas/' . $idea->img_upload));
        }

        $idea->delete();

        return redirect()->route('ideas-actions.index')
                         ->with('success', 'Data deleted successfully');
    }
}
