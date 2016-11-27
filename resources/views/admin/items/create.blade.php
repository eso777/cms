@extends('layouts.app')
@section('content')


<div class="panel panel-info">
     <div class="panel-heading">Add New Item</div>
     <div class="panel-body">

          {!! Form::open(['action' => 'ItemsController@store' , 'files' => true]) !!}
          <div class="col-lg-4">
               {!! Form::text('title', null , ['class' => 'form-control', 'placeholder' => 'Title Item']) !!}
          </div>
          <div class="col-lg-4">
               {!! Form::number('price', null , ['class' => 'form-control', 'placeholder' => 'Price This Item' , 'min'=>'20']) !!}
          </div>
          <div class="col-lg-4">
               {!! Form::select('status',['1'=>'Active','0'=>'DisActive'],null ,['class' => 'form-control', 'placeholder' => 'Choose Status ' ]) !!}
          </div>

          <div class="col-lg-12">
               {!! Form::textarea('desc', null , ['class' => 'form-control' , 'placeholder' => 'Write Some Description']) !!}
          </div>

          <div class="col-lg-6">
               {!! Form::file('img',['class' => 'form-control', 'placeholder' => 'Choose Image ' ]) !!}
          </div>

          <div class="col-lg-6">
               {!! Form::select('menu_id',$menus ,null,['class' => 'form-control', 'placeholder' => 'Choose Menu ' ]) !!}
          </div>

          <div class="col-lg-3">
               {!! Form::submit('Add',['class' => 'btn btn-primary']) !!}
          </div>

          {!! Form::close() !!}

     </div>

</div>




@stop 