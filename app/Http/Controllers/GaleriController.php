<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\Buku;
use Image;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $no = 0;
        $batas = 4;
        $galeri = Galeri::orderBy('id', 'desc')->paginate($batas);
        return view('galeri.index', compact('galeri', 'no'));
    }

    public function create()
    {
        $buku = Buku::all();
        return view('galeri.create', compact('buku'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'id_buku' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $galeri = new Galeri();
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->galeri_seo = "";
        $galeri->id_buku = $request->id_buku;

        $foto = $request->foto;
        $namafile = time() . "." . $foto->getClientOriginalName();

        Image::make($foto)->resize(200, 150)->save(public_path('thumb/' . $namafile));
        $foto->move("images/", $namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect()->route('galeri.index')->with('pesan', 'Data Galeri berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $galeri = Galeri::find($id);
        $galeri->delete();
        return redirect()->route('galeri.index')->with('pesan', 'Data Galeri berhasil dihapus');
    }

    public function edit($id)
    {
        $galeri = Galeri::find($id);
        $buku = Buku::all();
        $judulBukuSekarang = Buku::find($galeri->id_buku)->judul;
        return view('galeri.edit', compact('galeri', 'buku', 'judulBukuSekarang'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_galeri' => 'required',
            'keterangan' => 'required',
            'id_buku' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png',
        ]);

        $galeri = Galeri::find($id);
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->galeri_seo = "";
        $galeri->id_buku = $request->id_buku;

        if ($request->hasFile('foto')) {
            $foto = $request->foto;
            $namafile = time() . "." . $foto->getClientOriginalName();

            Image::make($foto)->resize(200, 150)->save(public_path('thumb/' . $namafile));
            $foto->move("images/", $namafile);

            $galeri->foto = $namafile;
        }

        $galeri->save();
        return redirect()->route('galeri.index')->with('pesan', 'Data Galeri berhasil diupdate');
    }
}
