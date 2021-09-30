<div class='container'>
    <h4>Update Buku</h4>
    <form action="{{ route('buku.storeUpdate', $id) }}" method="post">
        @csrf
        <label for="judul">Judul</label> <input type="text" name="judul" value="{{ $judul }}"> <br>
        <label for="penulis">Penulis</label> <input type="text" name="penulis" value="{{ $penulis }}"> <br>
        <label for="harga">Harga</label> <input type="text" name="harga" value="{{ $harga }}"> <br>
        <label for="tgl_terbit">Tgl. Terbit</label> <input type="text" name="tgl_terbit" value="{{ $tgl_terbit }}"> <br>

        <div><button type="submit">Simpan</button></div>
        <a href="/buku">Batal</a>
    </form>
</div>
