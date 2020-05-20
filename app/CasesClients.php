<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CasesClients extends Model
{
    protected $fillable =['case_id', 'client_id'];

    public function user()
    {
      return $this->belongsTo('App\Users');
    }

    public function case()
    {
        return $this->belongsTo('App\Cases');
    }

}
