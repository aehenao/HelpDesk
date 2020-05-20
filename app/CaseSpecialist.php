<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseSpecialist extends Model
{
  protected $fillable =['case_id', 'specialist_id'];

  public function user()
  {
    return $this->belongsTo('App\Users');
  }

  public function case()
  {
      return $this->belongsTo('App\Cases');
  }
}
