<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function test_book_can_be_added_to_library()
    {

        $this->withoutExceptionHandling(); //helps with getting more intuitive error messages

        $this->post('/books', [
            'title' => 'My New Book' ,
            'author' => 'Ndinda' ,
        ]);

        // $response->assertOk();
        $this->assertCount(1, Book::all());
    }

       /** @test */
     public function test_title_is_required()
    {   
        // $this->withoutExceptionHandling(); //helps with getting more intuitive error messages

       $response = $this->post('/books', [
            'title' => '' ,
            'author' => 'Ndinda' ,
       ]);

        $response->assertSessionHasErrors('title');
    }

         /** @test */
     public function test_author_is_required()
    {   
        // $this->withoutExceptionHandling(); //helps with getting more intuitive error messages

       $response = $this->post('/books', [
            'title' => 'My New Book' ,
            'author' => '' ,
       ]);

        $response->assertSessionHasErrors('author');
    }
    /** @test */
     public function test_book_can_be_updated()
    {
        $this->withoutExceptionHandling(); //helps with getting more intuitive error messages
        
            $this->post('/books', [
            'title' => 'My New Book' ,
            'author' => 'Ndinda' ,
       ]);

       $book = Book::first();

       $response = $this->patch('/books/'. $book->id, [
           'title' => 'New',
            'author' => 'Maya'

       ]);

       $this->assertEquals('New', Book::first()->title);
       $this->assertEquals('Maya', Book::first()->author);
    }}
