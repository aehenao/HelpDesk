<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CasesFiles extends Model
{
   public function user()
   {
     return $this->belongsTo('App\Users');
   }

   public function case()
   {
     return $this->belongsTo('App\Users');
   }
}
