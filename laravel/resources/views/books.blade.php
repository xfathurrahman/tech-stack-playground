<!DOCTYPE html>
<html lang="id">
<head>
    <title>Perpustakaan</title>
    <style>body{font-family:sans-serif;padding:2rem}</style>
</head>
<body>
    <h2>Daftar Buku</h2>
    <table border="1" cellpadding="8" style="border-collapse: collapse; margin-bottom: 2rem;">
        <tr><th>Judul</th><th>Penulis</th><th>Stok</th><th>Aksi</th></tr>
        @foreach($books as $b)
        <tr>
            <td>{{ $b->title }}</td><td>{{ $b->author }}</td><td>{{ $b->stock }}</td>
            <td>
                <form action="/{{ $b->id }}" method="POST" style="margin:0;">
                    @csrf @method('DELETE') <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    <h3>Tambah Buku</h3>
    <form action="/" method="POST">
        @csrf
        <input name="title" placeholder="Judul" required>
        <input name="author" placeholder="Penulis" required>
        <input type="number" name="stock" placeholder="Stok" required>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
