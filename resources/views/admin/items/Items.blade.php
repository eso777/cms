@extends('layouts.app')

@section('content')

<h1 class="text-center">  Items  </h1>
<a href="items/create" class="pull-right">Add New Item</a>
<div class="table">
     <table class="table table-bordered">
          
          <tr>
               <th>#ID</th>
               <th>Title</th>
               <th>Description</th>
               <th>Price</th>
               <th>Status</th>
               <th>Menu</th>
               <th>Created By</th>
               <th>Created At</th>
               <th>Image</th>
               <th>Edit</th>
               <th>Delete</th>
          </tr>
          
          @foreach ($Items as $Item )
               <tr>
                    <td>{{ $Item->id }}</td>
                    <td>{{ $Item->title }}</td>
                    <td>{{ $Item->desc }}</td>
                    <td>{{ $Item->price }}</td>
                    <td>{{ $Item->status }}</td>
                    <td>{{ $Item->Menu->title }}</td>
                    <td>{{ $Item->user->name }}</td>
                    <td>{{ $Item->created_at }}</td>
                    <td>{{ $Item->img }}</td>
                    <th>              
                         <a href="items/{{ $Item->id }}/edit" class="btn btn-info">Edit</a>
                    </th>
                    
                    <th>
                         {!! Form::open(['method'=> 'DELETE' , 'route' =>[ 'items.destroy' , $Item->id]] ) !!}
                              {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                         {!! Form::close() !!}
                    </th>
               </tr>
          @endforeach
          
     </table>
     
     <div class="panigat">
          {{ $Items->render() }}
     </div>
</div>

@stop