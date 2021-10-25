<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function authorsBook()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function generateISBN()
    {
        $isbn = "978-".rand(11,99)."-".rand(1000,9999)."-".rand(100,999)."-".rand(0,9);
        
        return $isbn;
    }
    public function categories()
    {
        $categories = ["Action and Adventure","Classics","Graphic Novel","Detective and Mystery",
        "Fantasy","Historical Fiction","Horror","Literary Fiction","Romance","Science Fiction",
        "Short Stories","Suspense and Thrillers","Women's Fiction","Biographies and Autobiographies",
        "Cookbooks","Essays","History","Memoir","Poetry","Self-Help","True Crime"];

        return $categories;
    }
}
