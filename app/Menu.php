<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = ['title','type','desc','img','status','user_id'] ;


    // This function to get user name
    Public function user()
    {
    	return $this->belongsTo('App\User');
    }
}



