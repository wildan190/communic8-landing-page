<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function brandForge()
    {
        return view('web.layanan.brand-forge');
    }

    public function digitalCompass()
    {
        return view('web.layanan.digital-compass');
    }

    public function digitalArchitecture()
    {
        return view('web.layanan.digital-architecture');
    }

    public function publicPresence()
    {
        return view('web.layanan.public-presence');
    }
}
