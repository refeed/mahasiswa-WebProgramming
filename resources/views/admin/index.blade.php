@extends('layouts.buku_base')

@section('content')
<h1>List user</h1>

@if(Session::has('pesan'))
<div class="alert alert-success">{{Session::get('pesan')}}</div>
@endif

<a href="{{ route('admin.create') }}" class="btn btn-primary">Create user</a>

<table class="table">
    <thead>
        <tr>
            <td>Nama</td>
            <td>Email</td>
            <td>Level</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data_user as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->level}}</td>
            <td>
                <a href="{{ route('admin.update', $user->id) }}" class="btn btn-sm btn-outline-secondary">Update</a>
                <a href="{{ route('admin.destroy', $user->id) }}" class="btn btn-outline-danger btn-sm">Hapus</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
