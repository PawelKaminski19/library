<?php
namespace App\Repositories;

use DB;
use App\Models\Book;
use App\Models\Isbn;

class BookRepository extends BaseRepository{

	public function __construct(Book $model){
    $this->model = $model;
  }

  public function create(array $data) {
      $book = Book::create($data);

      if(isset($data['author_id'])) {
        $book->authors()->sync($data['author_id']);
      }
      return $book;
  }


    public function update(array $data, $id) {
        $book = Book::find($id);
        $book->fill($data);
        $book->save();

        if(isset($data['author_id'])) {
          $book->authors()->sync($data['author_id']);
        }
        return $book;
    }

  public function cheapest()
  {
      $booksList = $this->model->orderBy('price','asc')->limit(3)->get();
      return $booksList;
  }

  public function longest()
  {
      $booksList = $this->model->orderBy('pages','desc')->limit(3)->get();
      return $booksList;
  }

  public function search(String $q)
  {
      $booksList = $this->model->where('name','like',"%" . $q ."%")->get();
      return $booksList;
  }
}
