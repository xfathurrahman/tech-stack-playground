<?php
namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller {
    public function index() { return view('books', ['books' => Book::all()]); }
    public function store(Request $r) {
        Book::create($r->validate(['title' => 'required', 'author' => 'required', 'stock' => 'required|integer']));
        return back();
    }
    public function destroy(Book $book) { $book->delete(); return back(); }
}
