<?php

namespace App\Http\Controllers;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // create author
    public function store(Request $request)
    {
        Author::create(request()->only([
            'name', 'dob',
        ]));
    }
}
