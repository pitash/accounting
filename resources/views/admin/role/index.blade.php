    
    @extends('admin.pages.dashboard')
     @section('content')
     <style type="text/css">
     	.fa{
     		font-size: 14px;
     	}
     </style>
      <div class="wrapper-md">
        <div class="panel panel-default">




            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-10">
                        <p class="m-n font-thin h3">All Role</p>
                    </div>
                    <div class="col-md-2">

                          <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-plus"></i>&nbsp;Add New </a>

                    </div>
                </div>
            </div>


  
            <div class="panel-body">
                <table id="pattern-type-data" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>created By</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
@foreach($role as $item)
<tr>
    <td>{{$l++}}</td>
    <td>{{$item->role_name}}</td>
    <td>{{$item->userName->name}}</td>
    <td>
       <a href="{{route('role.edit',$item->id)}}" class=" btn btn-sm btn-info"><i class="fa fa-pencil"> </i></a>
       <a href="{{route('role.edit',$item->id)}}" class=" btn btn-sm btn-success"><i class="fa fa-key"> </i></a>
    </td>

</tr>
@endforeach

                        

    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection