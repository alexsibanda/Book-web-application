<?php

// app/Http/Controllers/AuthorController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function top()
    {
        $authors = Author::withCount('books')->orderByDesc('books_count')->take(10)->get();

        return view('authors.top', compact('authors'));
    }
}
