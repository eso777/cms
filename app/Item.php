<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
     
     protected $fillable = ['title','desc','img','price','status','menu_id','user_id'];
     
     // get menu contan this item 
     public function Menu() {
          return $this->belongsTo('\App\Menu');
     }
     
     // Get user create this item 
     public function user() {
          return $this->belongsTo('\App\User');
     }
     
}



