@extends('layouts.buku_base')

@section('content')
<h4>Update user</h4>
<form action="{{ route('admin.storeUpdate', $id) }}" method="post">
    @csrf
    <div class="form-group row mb-2">
        <label for="name" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input class="form-control" name="name" value="{{ $name }}">
        </div>
    </div>
    <div class=" form-group row mb-2">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input class="form-control" name="email" value="{{ $email }}">
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="level" class="col-sm-2 col-form-label">Level</label>
        <div class="col-sm-10">
            <input class="form-control" name="level" value="{{ $level }}">
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Simpan</button> <a href="{{ route('admin.index') }}" class="btn btn-primary btn-danger">Batal</a>
    </div>
</form>
@endsection
