<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function reciever(){
        return $this->hasOne('App\Reciever');
    }
}
