<div class='container'>
    <h4>Tambah Buku</h4>
    <form action="{{ route('buku.store') }}" method="post">
        @csrf
        <label for="judul">Judul</label> <input type="text" name="judul"> <br>
        <label for="penulis">Penulis</label> <input type="text" name="penulis"> <br>
        <label for="harga">Harga</label> <input type="text" name="harga"> <br>
        <label for="tgl_terbit">Tgl. Terbit</label> <input type="text" name="tgl_terbit"> <br>

        <div><button type="submit">Simpan</button></div>
        <a href="/buku">Batal</a>
    </form>
</div>
