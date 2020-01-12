    
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

      </div>
    </div>


    <div class="panel-heading">
      <div class="row">
        <div class="col-md-10">
          <p class="m-n font-thin h3">All Menu</p>
        </div>
        <div class="col-md-2">

          <a href="{{ route('menu.create') }}" class="btn btn-primary btn-sm"><i
            class="fa fa-plus"></i>&nbsp;Add New </a>

          </div>
        </div>
      </div>


      <div class="panel-body">
        <table id="pattern-type-data" class="table table-bordered">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>url</th>
              <th>Parent</th>
              <th>Icon</th>
              <th> Order</th>
              <th> Type</th>
              <th> Status</th>
              <th>created By</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($menu as $item)
            <tr>
              <td>{{$l++}}</td>
              <td>{{$item->title}}</td>
              <td>{{$item->url}}</td>
              <td>{{$item->parent_id}}</td>
              <td>{{$item->icon}}</td>
              <td>{{$item->order}}</td>
              <td>

                @if($item->type==1)
                <span>Signle Menu</span>
                @elseif($item->type==2)
                <span>Dropdown Menu</span>
                 @elseif($item->type==3)
                 <span>Page Menu</span>
                 @endif

              </td>
              <td>

                @if($item->status==1)
                <span>Active</span>
                @elseif($item->status==0)
                <span>Inactive</span>
                 @endif
              </td>
              <td>{{$item->userName->name}}</td>
<td>
  

  <a href="{{route('menu.edit',$item->id)}}" class=" btn btn-sm btn-info"><i class="fa fa-pencil"> </i></a>

</td>

            </tr>
            @endforeach



          </tbody>
        </table>
      </div>
    </div>
  </div>

  @endsection