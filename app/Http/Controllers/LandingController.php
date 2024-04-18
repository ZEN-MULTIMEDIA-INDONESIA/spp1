<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'ZEN MULTIMEDIA INDONESIA',
        ];
        return view('utama.landing', $data);
    }
}
