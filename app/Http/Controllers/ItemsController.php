<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Item;
use App\Menu; // Just to get all menu ( id => name ) per items from menu table in a database .


class ItemsController extends Controller {

     // To Make User login in First  
     public function __construct() {

          $this->middleware('auth');
     }

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index() {
          //
          $Items = Item::paginate(10) ;
          // dd($Items) ;

          return view('items.Items', compact('Items'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create() {
          //
          $menus = Menu::lists('title', 'id') ;
          return view('Items.create' , compact('menus'));
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request) {

          $data = $request->all() ;
             dd($data) ;                
          if (isset($data['img'])) {
               $data['img'] = $this->uplode($data['img']);
          } else {
               
          }

          $data['user_id'] = \Auth::User()->id; // Get User In this time ( In the session ) ;

          $item = Item::create($data);
          
          $menus = Menu::lists('title', 'id');
          return view('Items.edit', compact('item','menus'));
     }

     /**
      * 
      */
     function uplode($file) {

          $ext = $file->getClientOriginalExtension();
          $sha1 = sha1($file->getClientOriginalName());

          $fileName = date('Y-m-d-i') . "-" . $sha1 . "." . $ext;
          $path = 'images/Items/';

          $file->move($path, $fileName);

          return $path . $fileName;
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id) {
          //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id) {
          
          //get all data just by id . 
          $item = Item::findOrFail($id) ;
          // Get all menus 
          $menus = Menu::lists('title','id') ;
          
          return view('Items.edit', compact('item','menus'));
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, $id) {
          //
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id) {

          Item::findOrFail($id)->delete();

          return redirect()->back();
     }

}
