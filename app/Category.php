<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
      'name', 'ans'
  ];

    public function cases()
    {
      return $this->hasMany('App\Cases');
    }
}
