<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\menu; // use the model menu in app ....

class MenusController extends Controller {

     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index() {

          $menus = menu::paginate(10);
          return view('admin.menus.Menus', compact('menus'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create() {
          //
          return view('admin.menus.create');
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request) {
          $data = $request->all();

          if (isset($data['img'])) {
               // upload image
               $data['img'] = $this->upload($data['img']);
          }

          // Get user id 
          $data['user_id'] = \Auth::User()->id;

          // Insert data to data base.. 
          Menu::create($data);

          //return redirect()->to(Url('/')."/admin/menus")->with(['msg' => 'Menu Has been added successfully .']);
     }

     /*      * *
      *  Function upload file 
      *  $file = the all array $_files 
      */

     public function upload($file) {

          $ext = $file->getClientOriginalExtension(); // To get the extension 
          $sha1 = sha1($file->getClientOriginalName()); // To get the file name and encrypt by the sha1 func

          $fileName = date('y-m-d-h-i-s') . "_" . $sha1 . "." . $ext;
          $path = public_path('images/menus/');

          // This function to move or upload file ( move($path, $filename) ).
          $file->move($path, $fileName);

          return 'images/menus/' . $fileName; // Now the return will be path file ..
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
          // Get Data From db Menus Where id = $id 
          $menu = Menu::findOrFail($id);
          return view('admin.menus.edit', compact('menu'));
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
          $data = $request->all();

          if (isset($data['img'])) {
               // upload image
               $data['img'] = $this->upload($data['img']);
          }

          // Update Data In a Data Base.. 
          Menu::findOrFail($id)->update($data);

          return redirect()->to(Url('/')."/admin/menus")->with(['msg' => 'Menu Has been Updated successfully .']);
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id) {
          //
          $menu = Menu::findOrFail($id)->delete();

          return redirect()->back();
     }
     
     /* testAjax */
     function testAjax(Request $bag) {
          
          return view('admin.menus.create');
     }  
     /* testAjax */
}
