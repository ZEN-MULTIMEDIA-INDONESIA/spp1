<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Review Rating',
            'ratings' => Rating::all()
        ];
        return view('rating.index', $data);
    }

    public function detail($uuid)
    {
        $data = [
            'title' => 'Detail Review',
            'rating' => Rating::where('uuid', $uuid)->first()
        ];
        return view('rating.detail', $data);
    }
}
