<?php

namespace App\Events;

use App\Models\Book;
use Illuminate\Queue\SerializesModels;

class BookCreated
{
    use SerializesModels;

    public $book;

    /**
     * Create a new event instance.
     *
     * @param  \App\Models\Book  $book
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }
}
