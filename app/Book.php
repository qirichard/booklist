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

    // //
    // public function scopeDeleted($query) // Environment::deleted()
    // {
    //     return $query->where('status', 'deleted');
    // }
    //
    // public function scopeIdentifier($query, $identifier) // Environment::identifier()
    // {
    //     return $query->where('identifier', $identifier);
    // }
    //
    // public function scopeAccountRegion($query, $accountid, $region) // Environment::accountRegion()
    // {
    //     return $query->where([
    //         ['awsaccountid', $accountid],
    //         ['region', $region]
    //     ]);
    // }
}
