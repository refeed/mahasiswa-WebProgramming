@extends('layouts.buku_base')

@section('content')
<h4>Update Buku</h4>
<form action="{{ route('buku.storeUpdate', $id) }}" method="post">
    @csrf
    <div class="form-group row mb-2">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input class="form-control" name="judul" value="{{ $judul }}">
        </div>
    </div>
    <div class=" form-group row mb-2">
            <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
            <div class="col-sm-10">
                <input class="form-control" name="penulis" value="{{ $penulis }}">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="harga" class="col-sm-2 col-form-label">Harga</label>
            <div class="col-sm-10">
                <input class="form-control" name="harga" value="{{ $harga }}">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="tgl_terbit" class="col-sm-2 col-form-label">Tgl. Terbit</label>
            <div class="col-sm-10">
                <input class="form-control" name="tgl_terbit" id="tgl_terbit" value="{{ $tgl_terbit }}">
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Simpan</button> <a href="/buku" class="btn btn-primary btn-danger">Batal</a>
        </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $('#tgl_terbit').datepicker({
        format: 'yyyy/mm/dd',
        autoclose: true
    })
</script>
@endsection
