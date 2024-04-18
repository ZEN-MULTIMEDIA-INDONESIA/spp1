<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class PemantauanProyekController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'ZEN MULTIMEDIA INDONESIA',
            'proyeks' => Proyek::where('deleted_at', null)->orderBy('created_at', 'desc')->paginate(6)
        ];
        return view('pemantauan.index', $data);
    }
}
