<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    public function index() {
        $data_buku = Buku::all()->sortByDesc('buku');
        $no = 0;
        $jumlah_buku = count($data_buku);
        $jumlah_harga = 0;

        foreach ($data_buku as $buku) {
            $jumlah_harga += $buku->harga;
        }

        return view('buku.index', compact('data_buku', 'no', 'jumlah_buku', 'jumlah_harga'));
    }
}
