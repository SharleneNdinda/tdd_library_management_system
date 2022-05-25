<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class AuthorManagementTest extends TestCase
{
    use RefreshDatabase;

   /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */

    public function test_author_can_be_created()
    {
        $this->withoutExceptionHandling(); //helps with getting more intuitive error messages

        $this->post('/author', [
            'name' => 'Author Name' ,
            'dob' => '1999-11-12' ,
        ]);

        $this->assertCount(1, Author::all());
    }
}
