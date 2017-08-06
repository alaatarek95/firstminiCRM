<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $guard='customer';
    public function calls(){
        return $this->hasMany('App/Call');
    }
    public function visits(){
        return $this->hasMany('App/Visit');
    }
    public function followups(){
        return $this->hasMany('App/Followup');
    }
}
