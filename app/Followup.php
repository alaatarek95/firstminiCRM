<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    public $table= "followups";
    public function user(){
    	return $this->belongsTo('App/User');
    }
    public function customer(){
    	return $this->belongsTo('App/Customer');
    }
}
