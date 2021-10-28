@extends('layouts.buku_base')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<p>
    <a class="btn btn-primary btn-success" href="{{ route('buku.create') }}">Tambah Buku</a>
</p>

@if(Session::has('pesan'))
<div class="alert alert-success">{{Session::get('pesan')}}</div>
@endif

<form action="{{ route('buku.search') }}" method="get">
    @csrf
    <input type="text" name="kueri" class="form-control" placeholder="Cari..." style="width:30%; display:inline; margin:10px 10px; float:right">
</form>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>id</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl. Terbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    @foreach($data_buku as $buku)
    <tr>
        <td>{{ ++$no }}</td>
        <td>{{ $buku->id }}</td>
        <td>{{ $buku->judul }}</td>
        <td>{{ $buku->penulis }}</td>
        <td>{{ "Rp " . number_format($buku->harga, 2, ',', '.') }}</td>
        <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
        <td>
            <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                @csrf
                <button onclick="return confirm('Yakin mau dihapus?')" class="btn btn-primary btn-sm btn-danger">Hapus</button>
            </form>
            <a href="{{ route('buku.update', $buku->id) }}" class="btn btn-secondary btn-sm btn-success">Update</a>
        </td>
    </tr>
    @endforeach
</table>

<div>{{ $data_buku->links() }}</div>
<br>
Jumlah buku: {{ $jumlah_buku }}
<br>
Jumlah harga: {{ "Rp " . number_format($jumlah_harga, 2, ',', '.') }}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@endsection
