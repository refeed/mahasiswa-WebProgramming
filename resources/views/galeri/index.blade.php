@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Galeri</h1>

    <a class="btn btn-primary btn-success" href="{{ route('galeri.create') }}">Tambah Galeri</a>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama galeri</th>
                <th>Nama buku</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        @foreach($galeri as $data)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $data->nama_galeri }}</td>
            <td>{{ $data->bukus->judul }}</td>
            <td><img src="{{ asset('thumb/' . $data->foto) }}" style="width: 100px"></td>
            <td>
                <form action="{{ route('galeri.destroy', $data->id) }}" method="post">
                    @csrf
                    <button onclick="return confirm('Yakin mau dihapus?')" class="btn btn-primary btn-sm btn-danger">Hapus</button>
                </form>
                <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-secondary btn-sm btn-success">Update</a>
            </td>
        </tr>
        @endforeach
    </table>

    <div>{{ $galeri->links() }}</div>
</div>
@endsection
