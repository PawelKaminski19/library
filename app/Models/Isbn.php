<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Isbn extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'number', 'issued_by', 'issued_on', 'book_id',
  ];

  public function book()
  {
        return $this->belongsTo('App\Models\Book');
  }
}
