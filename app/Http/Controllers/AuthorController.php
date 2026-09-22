<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // index view
    public function index() {
        $authors = Author::orderBy('created_at', 'desc')->get();

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
    public function store() {

    }
}
