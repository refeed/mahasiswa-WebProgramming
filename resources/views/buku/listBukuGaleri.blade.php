@extends('layouts.buku_base')

@section('css')
<link href="{{ asset('css/lightbox.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h2>List Buku</h2>
        <hr>
        <div class="row">
            @foreach ($bukus as $data)
                <div class="col-md-4">
                    {{-- FIXME: Akan error ketika ada buku yang tidak memiliki galeri --}}
                    <div>
                        <a href="{{ asset('thumb/' . $data->photos()->first()->foto) }}" data-lightbox="image-1" data-title="{{ $data->keterangan }}">
                            <img src="{{ asset('thumb/' . $data->photos()->first()->foto) }}" style="width: 200px; height:150px">
                        </a>
                    </div>
                    <a href="{{ route('buku.like', $data->id) }}" class="btn btn-primary btn-sm">Suka (<span>{{ $data->suka }}</span>)</a>
                    <p><h5><a href="{{ route('galeri.buku',$data->judul) }}">{{ $data->judul }}</a></h5></p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
@endsection
