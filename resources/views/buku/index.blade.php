<p>
    <a href="{{ route('buku.create') }}">Tambah Buku</a>
</p>

<table>
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
        <td>{{ $buku->tgl_terbit }}</td>
        <td>
            <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                @csrf
                <button onclick="return confirm('Yakin mau dihapus?')">Hapus</button>
            </form>
            <a href="{{ route('buku.update', $buku->id) }}">Update</a>
        </td>
    </tr>
    @endforeach
</table>

<br>
Jumlah buku: {{ $jumlah_buku }}
<br>
Jumlah harga: {{ "Rp " . number_format($jumlah_harga, 2, ',', '.') }}
