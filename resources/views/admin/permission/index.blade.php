    
@extends('admin.pages.dashboard')
@section('content')
<style type="text/css">
  .fa{
     font-size: 14px;
 }
</style>
<div class="wrapper-md">
    <div class="panel panel-default">


        <div class="row" style="margin-top:10px;">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
                @if (session('success'))
                <div class="alert alert-success text-center">
                    <b>{{ session('success') }}</b>
                </div>

                @endif
            </div>
        </div>


        <div class="panel-heading">
            <div class="row">
                <div class="col-md-10">
                    <p class="m-n font-thin h3">Permission</p>
                </div>
                <div class="col-md-2">



                </div>
            </div>
        </div>



        <div class="panel-body">

            <form class="bs-example form-horizontal" action="{{route('permission.store')}}" method="post"
            enctype="multipart/form-data">

            {{ csrf_field() }}


            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="col-md-6">

                            <div class="form-group">
    
                                 
                                    <select  class="form-control" name="role_id" id="role_id" required="">
                                      
                                        <option value=" ">Select Role</option>
                                        @foreach($role as $rr)
                                        <option value="{{$rr->id}}">{{$rr->role_name}} </option>
                                        @endforeach
                                        
                                        
                                    </select>

                            </div>
                    </div>
                    <div class="col-md-6">
                      <a type="btn" onclick="get_report();" class="btn btn-success btn-lg" style="padding: 5px 70px;" >Submit</a>
                    </div>
                </div>
            </div>

<div id="ajaxpage">


</div>




        </form>
    </div>
</div>
</div>



    <script type="text/javascript">
             function get_report(){
            var role_id=document.getElementById("role_id").value;
            // alert(role_id);
            $.ajax({
        url  : "{{URL::to('get-permission')}}",
        type : "get",
        data : {role_id:role_id},
        success : function(response){
            $("#ajaxpage").html(response);
            // alert(response);
        },
        error : function(xhr, status){
            alert('There is some error.Try after some time.');
        }
    });
        }
    </script>


@endsection