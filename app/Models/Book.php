<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    // helper function for getting the path to a book
    public function path()
    {
        return '/books/' . $this->id;
    }
}
