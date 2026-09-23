<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    // index view
    public function index(Request $request) {
        $searchTerm = $request->input('search');
        $authors = Author::query()
            ->when($searchTerm, function($query, $searchTerm) {
                $query->where("name", "like", "%{$searchTerm}%");
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('authors.index', ["authors" => $authors]);
    }

    // fetch a specific record
    // respond get request
    public function show(int $id) {
        $author = Author::findOrFail($id);

        return view('authors.show', ["author" => $author]);
    }


    // render a create view
    public function create() {
        return view('authors.create');
    }

    // handle a post request
    public function store(Request $request) {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
        ]);

        $author = Author::create($validated);

        return response()->json([
            'message' => 'Author created successfully.',
            'author' => $author,
        ], 201);

    }

    public function edit() {
        return view('authors.edit');
    }

    public function update(Request $request) {

    }

    public function destroy(Author $author)
    {
        $author->delete();

        return response()->json([
            'message' => 'Author deleted successfully.',
        ]);
    }
}
