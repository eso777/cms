@extends('layouts.app')
@section('content')


<div class="panel panel-info">
     <div class="panel-heading">Edit Item : {{ $item->title }}</div>
     <div class="panel-body">

          {!! Form::model($item ,['method'=> 'PATCH', 'action' =>['ItemsController@update' , $item->id ], 'files' => true]) !!}
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
               <div class="col-lg-6">
                    {!! Form::textarea('desc', null , ['class' => 'form-control' , 'placeholder' => 'Write Some Description']) !!}
               </div>

               <div class="col-lg-6">
                    <img src="{{asset($item->img)}}" >
               </div>
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