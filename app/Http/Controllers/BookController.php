<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Book;
use App\Models\Isbn;
use App\Models\Author;
use App\Services\OpenLibrary;
use App\Repositories\BookRepository;
use App\Http\Requests\StoreBook;
use App\Events\BookCreated;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index(BookRepository $bookRepo)
    {
        $booksList = $bookRepo->getAll();
        return view('books/list',['booksList' => $booksList]);
    }

    public function create(BookRepository $bookRepo)
    {
      \App::setLocale(session('locale'));
      $authors = Author::all();
      return view('books/create',['authors' => $authors]);
    }

     public function store(StoreBook $request, BookRepository $bookRepo)
     {
       $data = $request->all();
       $book = $bookRepo->create($data);
       event(new BookCreated($book));
       return redirect('books');
     }

    public function show(OpenLibrary $ol, BookRepository $bookRepo, $id)
    {
      $book = $bookRepo->find($id);
      $openLibraryData = $ol->search($book->name);

      return view('books/show',['book' => $book,
                                'ol' => json_decode($openLibraryData)
                               ]);
    }

    public function edit(BookRepository $bookRepo, $id)
    {
      $book = $bookRepo->find($id);
      $authors = Author::all();
      return view('books/edit',['book' => $book,
                                'authors' => $authors]);
    }

    public function update(Request $request, BookRepository $bookRepo, $id)
    {
      $data = $request->all();
      $booksList = $bookRepo->update($data, $id);

      return redirect('books');
    }

    public function destroy(BookRepository $bookRepo, $id)
    {
        $booksList = $bookRepo->delete($id);
        return redirect('books');
    }

    public function cheapest(BookRepository $bookRepo)
    {
        $booksList = $bookRepo->cheapest();
        return view('books/list',['booksList' => $booksList]);
    }

    public function longest(BookRepository $bookRepo)
    {
        $booksList = $bookRepo->longest();
        return view('books/list',['booksList' => $booksList]);
    }

    public function search(Request $request, BookRepository $bookRepo)
    {
        $q = $request->input('q',"");
        $booksList = $bookRepo->search($q);
        return view('books/list',['booksList' => $booksList]);
    }
}
