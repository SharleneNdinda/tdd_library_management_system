<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    // create book
    public function store(Request $request)
    {
        $data =  $this-> validateRequest();
        $book = Book::create($data);
        return redirect($book->path());
    }

    // update method
      public function update(Book $book)
    {
        $data =  $this-> validateRequest();
        $book->update($data);

        return redirect($book->path());

    }

    // delete method
     public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/books');
    }

    // helper method
      public function validateRequest()
    {
        return  request()->validate([
            'title' => 'required',
            'author' => 'required'
        ]);
    }

    
}
