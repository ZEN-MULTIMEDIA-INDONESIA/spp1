<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Rating;
use Illuminate\Http\Request;

class PemantauanProyekController extends Controller
{
    public function index()
    {
        if (auth()?->user()?->peran === '4') {
            $proyeks = Proyek::where([['deleted_at', null], ['user_id', auth()->user()->id]])->paginate(6);
            $view = 'pemantauan.index-klien';
        } else {
            $proyeks = Proyek::where('deleted_at', null)->orderBy('created_at', 'desc')->paginate(6);
            $view = 'pemantauan.index';
        }
        $data = [
            'title' => 'ZEN MULTIMEDIA INDONESIA',
            'proyeks' => $proyeks
        ];
        return view($view, $data);
    }

    public function rating($uuid)
    {
        $proyek = Proyek::where('uuid', $uuid)->first();
        $rating = Rating::where('proyek_id', $proyek->id)->first();
        $view = auth()->user()->peran === '4' ? 'pemantauan.rating' : 'pemantauan.detail';
        $data = [
            'title' => 'Pemberian Rating',
            'proyek' => $proyek,
            'rating' => $rating
        ];
        return view($view, $data);
    }

    public function submit_rating(Request $request, $uuid)
    {
        $proyek = Proyek::where('uuid', $uuid)->first();

        Rating::insert([
            'uuid' => uuid_create(),
            'user_id' => auth()->user()->id,
            'proyek_id' => $proyek->id,
            'rate' => $request->rate,
            'text' => $request->text,
            'publish' => '0',
            'created_at' => now()
        ]);

        return redirect()->route('pemantauan-proyek.rating', ['uuid' => $uuid])->with([
            'title' => 'Menambahkan Rating',
            'icon' => 'success',
            'text' => 'Terimakasih telah memberikan feedback pada pekerjaan kami!'
        ]);
    }
}
