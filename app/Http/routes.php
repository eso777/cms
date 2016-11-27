<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

Route::get('/', function () {
     return view('welcome');
});

Route::auth('admin');
Route::auth('user');

Route::group(['prefix' => 'admin/','middleware'=>'auth'],function(){
     Route::get('home', 'HomeController@index');

     Route::resource('menus', 'MenusController');
     /* Start Ajax javascript */
          Route::get('menus/create', 'MenusController@testAjax');
          Route::post('menu', 'MenusController@store');
          
     /* Start Ajax javascript */     

     Route::resource('items', 'ItemsController');
     
}); 

// logout Route 
Route::get('logout', function() {

    Auth::logout();
    return redirect()->to(Url('/'));
     
});



Route::auth();

Route::get('/home', 'HomeController@index');
