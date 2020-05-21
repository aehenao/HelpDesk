<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $fillable = ['description'];

    public function case()
    {
      return $this->belongsTo('App\Cases');
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
