<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [
            'title' => 'ZEN MULTIMEDIA INDONESIA',
        ];
        return view('utama.dashboard', $data);
    }
}
