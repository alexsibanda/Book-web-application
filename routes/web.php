<?php

// routes/web.php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RatingController;

// Route for displaying the list of books
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Route for displaying the top 10 authors
Route::get('/authors/top', [AuthorController::class, 'top'])->name('authors.top');

// Routes for rating a book
Route::get('/ratings/create', [BookController::class, 'createRatingForm'])->name('ratings.create');
Route::post('/ratings', [BookController::class, 'storeRating'])->name('ratings.store');
