@extends('admin.pages.dashboard')
 @section('content')
 {{-- <style type="text/css">
  .fa{
    font-size: 14px;
  }
 </style> --}}
<div class="wrapper-md">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="row">
        <div class="col-md-10">
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-bars"></i> &nbspAll Tree</p>
        </div>
        <div class="col-md-2">
          <a style="font-size: 14px;" href="{{ route('category-tree-view') }}" class="btn btn-primary btn-sm"><i
              class="fa fa-mail-reply-all"></i>&nbsp; Accounting Tree</a>
        </div>
     </div>
   </div>
    <div class="panel-body">
      <table id="pattern-type-data" class="table table-bordered text-center">
        <thead>
        <tr>
          <th class="text-center">SL</th>
          <th class="text-center">Name</th>
          <th class="text-center">Parent</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          <?php $a=1; ?>
          @forelse ($trees as $tree)
          <tr>
            <td>{{ $a++ }}</td>
            <td>{{ $tree->title }}</td>
            <td>{{ ($tree->parent_id == 0) ? 'Main' : $tree->tr->title }}</td>
            <td>
              <form action="{{ route('tree.destroy',$tree->id) }}" method="POST">
                <button type="button" data-toggle="tooltip" data-placement="top" title='Edit' class=" btn btn-sm btn-info edit_link"
                value="{{ route('tree.edit',$tree->id) }}" ><i class="fa fa-pencil"> </i></button>
                @csrf
                @method('DELETE')
                {{-- <button type="submit" data-toggle="tooltip" data-placement="top" title='Delete' class=" btn btn-sm btn-success" onclick="return confirm('Are you sure you want to Delete ?');" ><i class="fa fa-trash"> </i></button> --}}
              </form>
            </td>
          </tr>
          @empty
          <tr>
          <td colspan="12" class="text-center"><h2>No Tree Here</h2></td>
        </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
