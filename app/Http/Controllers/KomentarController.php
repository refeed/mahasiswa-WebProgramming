<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komentar;

class KomentarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment'          => 'required|string',
            'id_buku'        => 'required|numeric',
        ]);

        $komentar = new Komentar();
        $komentar->id_user = $request->user()->id;
        $komentar->id_buku = $request->id_buku;
        $komentar->comment = $request->comment;

        $komentar->save();
        return back();
    }
}
