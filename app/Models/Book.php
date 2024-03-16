<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public function searchableAs()
    {
        return 'books_index';
    }

    public function toSearchableArray()
    {
        return [
            'title' => (string) $this->title,
            'price' => (float) $this->price,
            'quantity' => (int) $this->quantity
        ];
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
