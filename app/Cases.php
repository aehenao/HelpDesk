<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{

  protected $fillable = [
      'title', 'description', 'status','priority', 'type', 'atention_time', 'solution_time'
  ];

   //Relations
   public function author() //Usuario Auxiliar
   {
      return $this->belongsTo('App\User');
   }

   public function category()
   {
      return $this->belongsTo('App\Category');
   }

   public function files()
   {
     return $this->hasMany('App\CasesFiles', 'case_id');
   }

   public function client()
   {
      return $this->belongsTo('App\User');
   }

   public function specialist()
   {
      return $this->belongsTo('App\User');
   }

   public function notes(){
     return $this->hasMany('App\Notes');
   }

   //Scopes
   public function scopeNumber($query, $number) //Busqueda por numero de caso
   {
      return $query->where('id', 'LIKE', $number);
   }


}
