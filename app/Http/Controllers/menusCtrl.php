<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Item;
use App\Menu; // Just to get all menu ( id => name ) per items from menu table in a database .


class menusCtrl extends Controller {

     
     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function get(request $request) 
     {
        $secrt = 'sawa4' ;
        if(!$request->has('secret'))
        {
          return response()->json(['status' => 400 , 'msg' => 'Bad Request : Missing Secret Key'], 400) ;  
        }

        if($secrt !== $request['secret'])
        {
          return response()->json(['status' => 400 , 'msg' => 'Bad Request : wrong secret key'], 400) ;  
        }    
        $items = Item::all();
        return response()->json(['status' => 200 , 'data' => $items], 200) ;  
     }

     
}
