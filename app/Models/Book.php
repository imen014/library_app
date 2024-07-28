<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_title',
        'isbn',
        'category',
        'path',
        'color',
        'author',
        'basic_idea',
        'publication_year',
        'price'
    ];
}
