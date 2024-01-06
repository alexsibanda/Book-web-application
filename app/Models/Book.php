<?php

// app/Models/Book.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Book extends Model
{
    protected $fillable = ['title', 'author_id', 'category_id']; // Add more fields as needed

    // Validation rules for creating a new book
    public static function createRules()
    {
        return [
            'title' => 'required|string|max:255|unique:books,title',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    // Validation rules for updating a book
    public static function updateRules($id)
    {
        return [
            'title' => [
                'required',
                'string',
                'max:255',
                Rule::unique('books', 'title')->ignore($id),
            ],
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    // Define the relationship with the Author model
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Define the relationship with the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Define the relationship with the Rating model
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Calculate the average rating for the book
    public function calculateAverageRating()
    {
        return $this->ratings->avg('rating');
    }

    // Get the count of voters for the book
    public function getVoterCount()
    {
        return $this->ratings->count();
    }
}

