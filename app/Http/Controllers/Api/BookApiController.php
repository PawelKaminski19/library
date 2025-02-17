<?php

namespace App\Http\Controllers\Api;

use DB;
use App\Models\Book;
use App\Models\Isbn;
use App\Models\Author;
use App\Services\OpenLibrary;
use App\Repositories\BookRepository;
use App\Http\Requests\StoreBook;
use App\Events\BookCreated;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Book as BookResource;
use App\Http\Resources\BookCollection as BookCollectionResource;

class BookApiController extends Controller
{
    public function find(BookRepository $bookRepo, $id)
    {
      $book = $bookRepo->find($id);
      return new BookResource($book);
    }

     public function store(StoreBook $request, BookRepository $bookRepo)
     {
       $data = $request->all();
       $book = $bookRepo->create($data);
       event(new BookCreated($book));
       return new BookResource($book);
     }

    public function list(BookRepository $bookRepo)
    {
      return new BookCollectionResource($bookRepo->getAll());
    }

    public function update(Request $request, BookRepository $bookRepo, $id)
    {
      $data = $request->all();
      $book = $bookRepo->update($data, $id);
      return new BookResource($book);
    }

    public function destroy(BookRepository $bookRepo, $id)
    {
      $booksList = $bookRepo->delete($id);
      return ["message" => "success"];
    }

}
