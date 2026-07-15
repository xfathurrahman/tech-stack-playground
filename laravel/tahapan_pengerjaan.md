# Tahapan Pengerjaan CRUD Full Stack (Live Coding Cheat Sheet)

Jika kamu disuruh membuat CRUD dalam waktu sempit, ikuti alur ini secara berurutan agar tidak ada yang terlewat.

### 1. Setup Database Cepat (SQLite)
Agar tidak pusing mikirin koneksi MySQL saat grogi:
Buka file `.env`, ubah bagian DB menjadi:
```env
DB_CONNECTION=sqlite
# Hapus baris DB_HOST, DB_PORT, DB_DATABASE, dll
```
Lalu buat file kosong di terminal:
```bash
touch database/database.sqlite
```

---

### 2. Buat Kerangka Dasar (Satu Perintah!)
Jangan bikin file satu-satu. Gunakan command ini untuk bikin Model, Migration, dan Controller sekaligus:
```bash
php artisan make:model Book -mc
```

---

### 3. Edit Migration (Definisi Tabel)
Buka `database/migrations/xxxx_create_books_table.php`. Tambahkan kolom di method `up()`:
```php
public function up()
{
    Schema::create('books', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('author');
        $table->integer('stock');
        $table->timestamps();
    });
}
```
Lalu eksekusi:
```bash
php artisan migrate
```

---

### 4. Edit Model (Biar Bisa Di-insert)
Buka `app/Models/Book.php`. **JANGAN LUPA** bagian ini, kalau lupa kena `MassAssignmentException`!
```php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Book extends Model 
{
    protected $fillable = ['title', 'author', 'stock']; 
}
```

---

### 5. Buat Logika CRUD di Controller
Buka `app/Http/Controllers/BookController.php`. Bikin 3 fungsi utama (Tampil, Simpan, Hapus).
```php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller 
{
    // Tampilkan List Buku
    public function index() { 
        $books = Book::all();
        return view('books', compact('books')); 
    }

    // Simpan Buku Baru
    public function store(Request $request) {
        // Validasi
        $validated = $request->validate([
            'title' => 'required', 
            'author' => 'required', 
            'stock' => 'required|integer'
        ]);

        Book::create($validated);
        return back(); // Refresh halaman
    }

    // Hapus Buku
    public function destroy(Book $book) { 
        $book->delete(); 
        return back(); 
    }
}
```

---

### 6. Daftarkan Routes
Buka `routes/web.php`.
```php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index']);
Route::post('/', [BookController::class, 'store']);
Route::delete('/{book}', [BookController::class, 'destroy']);
```

---

### 7. Buat User Interface (UI Blade)
Buat file baru di `resources/views/books.blade.php`.
*(Fokus ke tag `@foreach`, `@csrf`, dan `@method('DELETE')`!)*

```html
<!DOCTYPE html>
<html>
<head><title>Perpustakaan</title></head>
<body style="font-family: sans-serif; padding: 2rem;">

    <h2>Daftar Buku</h2>
    <table border="1" cellpadding="8" style="border-collapse: collapse; margin-bottom: 2rem;">
        <tr>
            <th>Judul</th><th>Penulis</th><th>Stok</th><th>Aksi</th>
        </tr>
        
        <!-- LOOPING DATA BUKU -->
        @foreach($books as $b)
        <tr>
            <td>{{ $b->title }}</td>
            <td>{{ $b->author }}</td>
            <td>{{ $b->stock }}</td>
            <td>
                <!-- TOMBOL HAPUS (Harus pakai form untuk DELETE) -->
                <form action="/{{ $b->id }}" method="POST">
                    @csrf 
                    @method('DELETE') 
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    <h3>Tambah Buku</h3>
    <!-- FORM TAMBAH -->
    <form action="/" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Judul" required>
        <input type="text" name="author" placeholder="Penulis" required>
        <input type="number" name="stock" placeholder="Stok" required>
        <button type="submit">Simpan</button>
    </form>

</body>
</html>
```
