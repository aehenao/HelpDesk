<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role', 'status', 'address', 'city'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSpecialist($query){
      return $query->where('role', 'aux');
    }

    public function scopeAdmins($query){
      return $query->where('role', 'admin');
    }

    public function scopeClients($query){
      return $query->where('role', 'client');
    }

    //Realtions
    public function cases_author(){//Obtengo los casos creados por el usuario (autor)
      return $this->hasMany('App\Cases', 'author_id');
    }

    public function files(){
      return $this->hasMany('App\CasesFiles');
    }

    public function cases_clients(){
      return $this->hasMany('App\Cases', 'client_id');
    }

    public function cases_specialists(){
      return $this->hasMany('App\Cases', 'specialist_id');
    }

    public function notes()
    {
       return $this->hasMany('App\Notes');
    }


}
