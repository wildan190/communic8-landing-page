<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsightController extends Controller
{
    public function index()
    {
        return view('web.insight.index');
    }
}
