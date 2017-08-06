<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    public $table= "calls";
    public function user(){
    	return $this->belongsTo('App/User');
    }
    public function customer(){
    	return $this->belongsTo('App/Customer');
    }
}
