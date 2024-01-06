<?php 

// app/Models/Author.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'bio']; // Add more fields as needed

    // Define the relationship with the Book model
    public function books()
    {
        return $this->hasMany(Book::class);
    }

    // Validation rules for creating a new author
    public static function createRules()
    {
        return [
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
        ];
    }
}
