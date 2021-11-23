<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $batas = 5;
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
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
        $this->validate($request , [
            'judul'          => 'required|string',
            'penulis'        => 'required|string|max:30',
            'harga'          => 'required|numeric',
            'tgl_terbit'     => 'required|date',
        ]);

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();
        return redirect('/buku')->with('pesan', 'Data buku berhasil disimpan');
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('pesan', 'Buku berhasil dihapus');
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
        return redirect('/buku')->with(
            'pesan', 'Buku ' . $buku->judul . ' berhasil diupdate');
    }

    public function search(Request $request) {
        $batas = 5;
        $kueri = $request->kueri;
        $data_buku = Buku::where('judul', 'like', '%' . $kueri . '%')
            ->orwhere('penulis', 'like', '%' . $kueri . '%')
            ->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $jumlah_buku = $data_buku->count();

        return view('buku.search', compact('data_buku', 'no', 'jumlah_buku', 'kueri'));
    }

    public function galbuku($title) {
        $bukus = Buku::where('judul', $title)->first();
        $galeris = $bukus->photos()->orderBy('id', 'desc')->paginate(6);
        return view('buku.galeri', compact('bukus', 'galeris'));
    }

    public function listBuku() {
        $bukus = Buku::all();
        return view('buku.listBukuGaleri', compact('bukus'));
    }
}
