<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    public $table= "visits";
    public function user(){
    	return $this->belongsTo('App/User');
    }
    public function customer(){
    	return $this->belongsTo('App/Customer');
    }
}
