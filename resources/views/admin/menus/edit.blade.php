@extends('admin.layout')

@section('content')

<div class="panel panel-primary">
     <div class="panel-heading">Edit Menu : {{ $menu->title }}</div>
     <div class="panel-body">

          <div class="add-menus">
               {!! Form::model($menu, ['method'=> 'PATCH','action'=>['MenusController@update', $menu->id] , 'files' =>true]) !!}
               <div class="col-lg-8">
                    
                    {!! Form::text('title',null ,array('required', 'class'=>'form-control' , 'placeholder'=>'Title menu')) !!}

                    {!! Form::select('type',['Food'=>'Food','Hot Drink'=>'Hot Drink','could Drink'=>'could Drink'],
                    null ,array('required', 'class'=>'form-control' , 'placeholder' => 'Choose Menu Type :')) !!}
                    
                    {!! Form::select('status',['0'=>'Dis-Active','1'=>'Active'],
                    null,array('required', 'class'=>'form-control', 'placeholder' => 'Choose Menu Status :') )!!}


                    {!! Form::textarea('desc',null, array('required','class'=>'form-control' , 'placeholder'=>'Menu Description')) !!}

               </div>
               <div class="col-lg-4">   
                    <img src="{{asset($menu->img)}}" class="img-responsive img-rounded img-edit-menu"/>
               </div>



               <div class="col-lg-6">   
                    {!! Form::file('img',array('class'=>'form-control')) !!}
               </div>

               <div class="col-lg-6">   
                    {!! Form::submit('Update', array('class'=>'btn btn-primary') ) !!}
               </div>

               {!! Form::close() !!} 

          </div>


     </div>
</div>

@endsection('content')