<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function admin()
    {
        return view('guides.admin_guide');
    }

    public function kasir()
    {
        return view('guides.kasir_guide');
    }
}
