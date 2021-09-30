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

    public function create() {
        return view('buku.create');
    }

    public function store(Request $request) {
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku');
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku');
    }

    public function update($id) {
        $buku = Buku::find($id);
        $judul = $buku->judul;
        $penulis = $buku->penulis;
        $harga = $buku->harga;
        $tgl_terbit = $buku->tgl_terbit;
        return view('buku.update', compact('id', 'judul', 'penulis', 'harga', 'tgl_terbit'));
    }

    public function storeUpdate(Request $request, $id) {
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku');
    }

}
