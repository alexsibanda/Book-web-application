<?php

// app/Http/Controllers/BookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rating;
use App\Models\Category;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->input('filter', 10); // Default filter value is 10
        $search = $request->input('search', '');

        $books = Book::with(['author', 'category'])
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderByDesc('average_rating')
            ->paginate($filter);

        return view('books.index', compact('books', 'filter', 'search'));
    }

    public function createRatingForm()
    {
        $books = Book::pluck('title', 'id');
        return view('ratings.create', compact('books'));
    }

    public function storeRating(Request $request)
    {
        $request->validate(Rating::createRules());

        Rating::create([
            'book_id' => $request->input('book_id'),
            'user_id' => auth()->user()->id, // Adjust this according to your authentication setup
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('books.index')->with('success', 'Rating submitted successfully!');
    }
}
