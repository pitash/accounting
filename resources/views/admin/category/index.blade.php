    
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
                        <p class="m-n font-thin h3">All Category</p>
                    </div>
                    <div class="col-md-2">

                          <a href="{{ route('create-category') }}" class="btn btn-primary btn-sm"><i
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
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    	@foreach($category as $item)
                    	<tr>
                    		<td>{{$l++}}</td>
                    		<td>{{$item->name}}</td>
                    		@if($item->status==1)
                    		<td>Active</td>
                    		@else
                    		<td>Inactive</td>
                    		@endif
                    		<td>
                    			<a href="" class=" btn btn-sm btn-danger"><i class="fa fa-trash"> </i></a>
                    			<a href="" class=" btn btn-sm btn-info"><i class="fa fa-pencil"> </i></a>
                    		</td>
                    	</tr>
                    	@endforeach
                        

    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endsection