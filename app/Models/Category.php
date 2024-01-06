<?php

// app/Models/Category.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Category extends Model
{
    protected $fillable = ['name']; // Add more fields as needed

    // Validation rules for creating a new category
    public static function createRules()
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name',
        ];
    }

    // Validation rules for updating a category
    public static function updateRules($id)
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($id),
            ],
        ];
    }

    // Define the relationship with the Book model
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
