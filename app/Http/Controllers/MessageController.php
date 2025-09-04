<?php

namespace App\Http\Controllers;

use App\Models\Consumer;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Consumer::latest()->paginate(10);

        return view('messages.index', compact('messages'));
    }

    public function show(Consumer $message)
    {
        return view('messages.show', compact('message'));
    }

    public function destroy(Consumer $message)
    {
        $message->delete();

        return redirect()->route('messages.index')->with('success', 'Message deleted successfully.');
    }
}
