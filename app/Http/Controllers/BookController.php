<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // index view
    public function index() {
        $books = Book::orderBy('created_at', 'desc')->get();

        return view('books.index', ["books" => $books]);
    }

    // fetch a specific record
    // respond get request
    public function show(int $id) {
        $book = Book::findOrFail($id);

        return view('books.show', ["book" => $book]);
    }

    // render a create view
    public function create() {

    }

    // handle a post request
    public function store() {

    }

}
