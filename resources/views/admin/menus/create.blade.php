

<div class="panel-primary">
     <div class="panel-heading">Add New Menu</div>
     <div class="panel-body">

          <div class="add-menus">
               {!! Form::open(['route'=>'admin.menus.store' , 'files' =>true]) !!}
               <div class="col-lg-4">   
                    {!! Form::text('title',null ,array('required', 'class'=>'form-control' , 'placeholder'=>'Title menu')) !!}
               </div>

               <div class="col-lg-4">   
                    {!! Form::select('type',['Food'=>'Food','Hot Drink'=>'Hot Drink','could Drink'=>'could Drink'],
                    null ,array('required', 'class'=>'form-control' , 'placeholder' => 'Choose Menu Type :')) !!}
               </div>

               <div class="col-lg-4">   
                    {!! Form::select('status',['1'=>'Dis-Active','2'=>'Active'],
                    null,array('required', 'class'=>'form-control', 'placeholder' => 'Choose Menu Status :') )!!}
               </div>

               <div class="col-lg-12">   
                    {!! Form::textarea('desc',null, array('required','class'=>'form-control' , 'placeholder'=>'Menu Description')) !!}
               </div>


               <div class="col-lg-6">   
                    {!! Form::file('img',array('required','class'=>'form-control')) !!}
               </div>

               <div class="col-lg-6">   
                    <button id='btnSaveData' class='btn btn-primary'>Save</button>
               </div>         

               {!! Form::close() !!} 

          </div>
     </div>
</div>




<script>
    
    /* save data */
    
      var  $btn2 = document.getElementById('btnSaveData')

        $btn2.onclick = function (e) {
        e.preventDefault(); 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            var $div = document.getElementById('myDiv');
            if (xmlhttp.readyState == 1 || xmlhttp.readyState == 2 || xmlhttp.readyState == 3)
            {
                document.body.className = "";
            } else if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                document.body.className = "loaded";
                $div.innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("post", "{{Url('/')}}/admin/menus", true);
        xmlhttp.send();

    }// end event 






</script>
