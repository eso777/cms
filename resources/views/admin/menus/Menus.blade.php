@extends('admin.layout')

@section('content')
<h1 class="text-center">Menus</h1> 
<div class="row">
    <a href="menus/create" class="pull-right fa-2x" id="MenuBtnAdd" title="Add New Menu" token="{{csrf_token()}}"><i class="fa fa-plus"></i> Add New Menu</a>
    <!-- 
         {!! Form::open(['url'=>'admin/menus/create']) !!}
              {!! Form::button('Add New Menu',['class'=>"pull-right fa-2x" , 'id'=>"MenuBtnAdd"]) !!}
         {!! Form::close() !!}
    -->
</div>

@if(Session::has('msg'))

<div class="alert alert-success">{{ Session::get('msg') }}</div>     

@endif

@if($menus->total() > 0)
<table class="table table-bordered thead-inverse widthImg">
    <tr>
        <th>#ID</th>
        <th>Title</th>
        <th>Type</th>
        <th>Description</th>
        <th>Status</th>
        <th>Image</th>
        <th>Created By</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    @foreach ($menus as $menu)
    <tr>
        <td>{{$menu->id}}</td>
        <td>{{$menu->title}}</td>
        <td>{{$menu->type}}</td>
        <td>{{$menu->desc}}</td>
        <td>{{$menu->status}}</td>
        <td><img src="{{asset($menu->img)}}" /></td>
        <td>{{$menu->User->name}}</td>

        <td> 

            {!! Form::open(['method'=>'DELETE', 'route'=>['admin.menus.destroy' , $menu->id]])
            !!}        

            <div class="col-lg-2">
                {!! Form::submit('Delete', ['class'=>'btn btn-danger' ,  'onClick' =>'return confirm(" Â· «‰  „ √ﬂœ „‰ «·Õ–›ø")']) !!}
            </div>

            {!! Form::close() !!}


        </td>
        <td>
            <a href="menus/{{$menu->id}}/edit" class="btn btn-primary">Edit</a>

        </td>
    </tr>
    @endforeach
</table>
<div id="txtHint"></div>

<div class="panigat col-lg-12">
    {!! $menus->render() !!}
</div>
@else
<br /><br />  <div class="alert alert-info"> Sorry , No Data To Show! .  </div>
@endif


@section('inlineJS')

<script>

    // First add new menu by ajax js 

    var $btn = document.getElementById('MenuBtnAdd');
    $btn.onclick = function (e) {
        e.preventDefault();
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            var $div = document.getElementById('myDiv');

            if (xmlhttp.readyState == 1 || xmlhttp.readyState == 2 || xmlhttp.readyState == 3)
            {
//                    $div.innerHTML = '<img src="{{Url('/')}}/images/load.gif">' ;
                document.body.className = "";
            } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                document.body.className = "loaded";
                $div.innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("get", "{{Url('/')}}/admin/menus/create", true);
        xmlhttp.send();

    }// end event 
    
    /* save data */
    
    
  
//        $btn2.onclick = function(e) {
//            e.preventDefault(); 
//            console.log("D:_") ;
//        }
//        
//        window.onload = function(){
//             var $btn2 = document.getElementById('btnSaveData').onclick=function(){
//            alert("Hello WOrld");
//
//        }
//}

//        $btn2.onclick = function (e) {
//        
//        var xmlhttp = new XMLHttpRequest();
//        xmlhttp.onreadystatechange = function () {
//            var $div = document.getElementById('myDiv');
//            if (xmlhttp.readyState == 1 || xmlhttp.readyState == 2 || xmlhttp.readyState == 3)
//            {
//                document.body.className = "";
//            } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//
//                document.body.className = "loaded";
//                $div.innerHTML = xmlhttp.responseText;
//            }
//        }
//        xmlhttp.open("post", "{{Url('/')}}/admin/menus", true);
//        xmlhttp.send();

    //}// end event 






</script>

@endsection 


@endsection
