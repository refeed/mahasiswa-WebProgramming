@extends('layouts.buku_base')

@section('css')
<link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section id="album" class="py-1 text-center bg-light">
    <div class="container mb-5">
        <h2>Buku {{ $bukus->judul }}</h2>
        <hr>
        <div class="row">
            @foreach ($galeris as $data)
                <div class="col-md-4">
                    <a href="{{ asset('thumb/' . $data->foto) }}" data-lightbox="image-1" data-title="{{ $data->keterangan }}">
                        <img src="{{ asset('thumb/' . $data->foto) }}" style="width: 200px; height:150px">
                    </a>
                    <p><h5>{{ $data->nama_galeri }}</h5></p>
                </div>
            @endforeach
        </div>
        <div>{{ $galeris->links() }}</div>
        <h3>{{ count($comments) }} Komentar</h3>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                @if (count($errors) > 0)
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <form action="{{ route('komentar.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_buku" value="{{ $bukus->id }}">
                    <div class="form-floating mb-5">
                        <textarea class="form-control mb-2" placeholder="Tuliskan komentar Anda" id="floatingTextarea" name="comment"></textarea>
                        <label for="floatingTextarea">Tuliskan komentar Anda</label>
                        <button type="submit" class="btn btn-primary w-100">Kirim</button>
                    </div>
                </form>
                @foreach ($comments as $comment)
                    <div class="card p-3 mb-1">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="user d-flex flex-row align-items-center"> <span><small class="font-weight-bold text-primary">{{ $comment->getAuthorName() }}</small> <small class="font-weight-bold">{{ $comment->comment }}</small></span> </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
@endsection
