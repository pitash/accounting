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
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-users"></i> &nbspCustomer</p>
        </div>
        <div class="col-md-2">
          <a style="font-size: 14px;" href="{{ route('customer.create') }}" class="btn btn-primary btn-sm"><i
              class="fa fa-plus"></i>&nbsp;Add New Customer</a>
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
          <th class="text-center">ID</th>
          <th class="text-center">Email</th>
          <th class="text-center">Phone</th>
          <th class="text-center">Company</th>
          <th class="text-center">Currency</th>
          <th class="text-center">Under</th>
          <th class="text-center">Website</th>
          {{-- <th class="text-center">Created By</th> --}}
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          <?php $a=1; ?>
          @forelse ($customers as $custo)
          <tr>
            <td>{{ $a++ }}</td>
            <td> <img class="img-profile rounded-circle" width="70" height="40" src="{{ asset('public/Customer/'. $custo->image ) }}" alt="Photo Not Found"> </td>
            <td>{{ $custo->customer }}</td>
            <td>{{ $custo->cust_id }}</td>
            <td>{{ $custo->eamil }}</td>
            <td>{{ $custo->phone }}</td>
            <td>{{ $custo->comp_name }}</td>
            <td>{{ $custo->getCurrency->code }}</td>
            <td>{{ $custo->getUnder->title }}</td>
            <td>{{ $custo->website }}</td>
            {{-- <td>{{ $custo->getUser->name }}</td> --}}
            <td>
              <form action="{{ route('customer.destroy',$custo->id) }}" method="POST">
                <button type="button" data-toggle="tooltip" data-placement="top" title='Edit' class=" btn btn-sm btn-success edit_link"
                value="{{ route('customer.edit',$custo->id) }}" ><i class="fa fa-pencil"> </i></button>
                @csrf
                @method('DELETE')
                {{-- <button type="submit" data-toggle="tooltip" data-placement="top" title='Delete' class=" btn btn-sm btn-success" onclick="return confirm('Are you sure you want to Delete ?');" ><i class="fa fa-trash"> </i></button> --}}
              </form>
            </td>
          </tr>
          @empty
          <tr>
          <td colspan="12" class="text-center"><h2>No Customer Here</h2></td>
        </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
