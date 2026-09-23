<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // index view
    public function index(Request $request) {
        $searchTerm = $request->input('search');

        $books = Book::leftJoin('authors', 'authors.id', '=', 'books.author_id')
            ->select('books.*', 'authors.name as author_name')
            ->when($searchTerm, function($query, $searchTerm) {
                $query->where(function ($query) use ($searchTerm) {
                    $query->where('books.title', 'like', "%{$searchTerm}%")
                        ->orWhere('authors.name', 'like', "%{$searchTerm}%");
                });
            })
            ->orderBy('books.created_at', 'desc')
            ->get();


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
        $authors = Author::orderBy('name')->get();

        return view('books.create', ['authors' => $authors]);
    }

    // handle a post request
    public function store(Request $request) {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author_id' => ['required', 'exists:authors,id'],
            'publish_date' => ['required', 'date'],
        ]);

        $book = Book::create($validated);

        return response()->json([
            'message' => 'Book created successfully.',
            'book' => $book,
        ], 201);

    }
    public function edit(Book $book) {
        $authors = Author::orderBy('name')->get();

        return view('books.edit', ['book' => $book, 'authors' => $authors]);
    }

    public function update(Request $request, Book $book) {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author_id' => ['required', 'exists:authors,id'],
            'publish_date' => ['required', 'date'],
        ]);

        $book->update($validated);

        return response()->json([
            'message' => 'Book updated successfully.',
            'book' => $book,
        ]);
    }

    public function destroy(Book $book) {

        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully.',
        ]);

    }
}
