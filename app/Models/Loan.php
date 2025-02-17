<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'client', 'estimated_on', 'loaned_on', 'book_id', 'returned_on',
  ];

  public function book()
  {
        return $this->belongsTo(\App\Models\Book::class);
  }
}
