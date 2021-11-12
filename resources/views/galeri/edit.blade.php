@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit galeri</h1>

    @if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <form action="{{ route('galeri.update', $galeri->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_galeri">Judul</label>
            <input type="text" class='form-control' name="nama_galeri" value="{{ $galeri->nama_galeri }}">
        </div>
        <div class="form-group">
            <label for="id_buku">Buku</label>
            <select name="id_buku" class="form-control">
                <option value="{{ $galeri->id_buku }}" selected>{{ $judulBukuSekarang }}</option>
                @foreach ($buku as $data)
                <option value="{{ $data->id }}">{{ $data->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $galeri->keterangan }}</textarea>
        </div>
        <b>Foto sekarang:</b>
        <img src="{{ asset('thumb/' . $galeri->foto) }}" style="width: 100px">
        <div class="form-group">
            <label for="foto">Ubah Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/galeri" class="btn btn-warning">Batal</a>
        </div>
    </form>
</div>
@endsection
