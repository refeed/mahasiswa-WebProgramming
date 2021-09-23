<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index() {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa', [
            'mahasiswa' => $mahasiswa
        ]);
    }
}
