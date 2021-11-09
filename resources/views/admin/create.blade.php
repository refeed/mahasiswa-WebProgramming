@extends('layouts.buku_base')

@section('content')
<div class='container'>
    @if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <h4>Buat user</h4>
    <form action="{{ route('admin.store') }}" method="post">
        @csrf
        <div class="form-group row mb-2">
            <label for="name" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input class="form-control" name="name">
            </div>
        </div>
        <div class=" form-group row mb-2">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input class="form-control" name="email">
            </div>
        </div>
        <div class=" form-group row mb-2">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input class="form-control" name="password" type="password">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
                <select class="form-select" name="level">
                    <option value="admin">admin</option>
                    <option value="user">user</option>
                </select>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Simpan</button> <a href="/buku" class="btn btn-primary btn-danger">Batal</a>
        </div>

    </form>
</div>

@endsection
