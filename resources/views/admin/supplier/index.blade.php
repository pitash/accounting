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
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-share-alt-square"></i> &nbspSupplier</p>
        </div>
        <div class="col-md-2">
          <a style="font-size: 14px;" href="{{ route('supplier.create') }}" class="btn btn-primary btn-sm"><i
              class="fa fa-plus"></i>&nbsp;Add New Supplier</a>
        </div>
     </div>
   </div>
    <div class="panel-body">
      <table id="pattern-type-data" class="table table-bordered text-center">
        <thead>
        <tr>
          <th class="text-center">SL</th>
          <th class="text-center">Image</th>
          <th class="text-center">Name</th>
          <th class="text-center">Id</th>
          <th class="text-center">Email</th>
          <th class="text-center">Phone</th>
          <th class="text-center">Currency</th>
          <th class="text-center">Under</th>
          <th class="text-center">Address</th>
          <th class="text-center">Created By</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          <?php $a=1; ?>
          @forelse ($sups as $sup)
          <tr>
            <td>{{ $a++ }}</td>
            <td> <img class="img-profile rounded-circle" width="70" height="40" src="{{ asset('public/Supplier/'. $sup->image ) }}" alt="Photo Not Found"> </td>
            <td>{{ $sup->supplier }}</td>
            <td>{{ $sup->sup_id }}</td>
            <td>{{ $sup->eamil }}</td>
            <td>{{ $sup->phone }}</td>
            <td>{{ $sup->getCurrency->code }}</td>
            <td>{{ $sup->getUnder->title }}</td>
            <td>{{ $sup->address }}</td>
            <td>{{ $sup->getUser->name }}</td>
            <td>
              <form action="{{ route('supplier.destroy',$sup->id) }}" method="POST">
                <button type="button" data-toggle="tooltip" data-placement="top" title='Edit' class=" btn btn-sm btn-success edit_link"
                value="{{ route('supplier.edit',$sup->id) }}" ><i class="fa fa-pencil"> </i></button>
                @csrf
                @method('DELETE')
                {{-- <button type="submit" data-toggle="tooltip" data-placement="top" title='Delete' class=" btn btn-sm btn-success" onclick="return confirm('Are you sure you want to Delete ?');" ><i class="fa fa-trash"> </i></button> --}}
              </form>
            </td>
          </tr>
          @empty
          <tr>
          <td colspan="12" class="text-center"><h2>No Supplier Here</h2></td>
        </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
