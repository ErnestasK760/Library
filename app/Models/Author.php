<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public function authorBooks()
    {
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
