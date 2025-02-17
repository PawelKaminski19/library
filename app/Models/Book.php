<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'year', 'publication_place', 'pages', 'price',
  ];

  public function isbn()
  {
        return $this->hasOne(\App\Models\Isbn::class);
  }

  public function loans()
  {
        return $this->hasMany(\App\Models\Loan::class);
  }

  public function authors()
  {
        return $this->belongsToMany(\App\Models\Author::class);
  }
}
