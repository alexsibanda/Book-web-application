<?php

// app/Models/Rating.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['book_id', 'user_id', 'rating'];

    // Validation rules for creating a new rating
    public static function createRules()
    {
        return [
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id', // Assuming you have a User model
            'rating' => 'required|integer|between:1,10',
        ];
    }

    // Define the relationship with the Book model
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // Define the relationship with the User model (assuming you have one)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
