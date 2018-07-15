<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'isbn', 'title', 'author', 'genres', 'price', 'description'
    ];

    public function scopeName($query, $name) // Book::name()
    {
        return $query->where('name', $name)->first();
    }

}
