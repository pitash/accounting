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
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-bar-chart"></i> &nbspCompanay</p>
        </div>
        <div class="col-md-2">
          <a style="font-size: 14px;" href="{{ route('company.create') }}" class="btn btn-primary btn-sm"><i
              class="fa fa-plus"></i>&nbsp;Add New Companay</a>
        </div>
     </div>
   </div>
    <div class="panel-body">
      <table id="pattern-type-data" class="table table-bordered text-center">
        <thead>
        <tr>
          <th class="text-center">SL</th>
          <th class="text-center">Logo</th>
          <th class="text-center">Name</th>
          <th class="text-center">ID</th>
          <th class="text-center">Start</th>
          <th class="text-center">End</th>
          <th class="text-center">Email</th>
          <th class="text-center">Phone</th>
          <th class="text-center">Currency</th>
          <th class="text-center">Address</th>
          <th class="text-center">Created By</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          <?php $a=1; ?>
          @forelse ($compns as $comp)
          <tr>
            <td>{{ $a++ }}</td>
            <td> <img class="img-profile rounded-circle" width="70" height="40" src="{{ asset('public/CompLogo/'. $comp->comp_logo ) }}" alt="Photo Not Found"> </td>
            <td>{{ $comp->company }}</td>
            <td>{{ $comp->comp_id }}</td>
            <td>{{ $comp->start_date }}</td>
            <td>{{ $comp->end_date }}</td>
            <td>{{ $comp->eamil }}</td>
            <td>{{ $comp->phone }}</td>
            <td>{{ $comp->getCurrency->code }}</td>
            <td>{{ $comp->address }}</td>
            <td>{{ $comp->getUser->name }}</td>
            <td>
              <form action="{{ route('company.destroy',$comp->id) }}" method="POST">
                <button type="button" data-toggle="tooltip" data-placement="top" title='Edit' class=" btn btn-sm btn-success edit_link"
                value="{{ route('company.edit',$comp->id) }}" ><i class="fa fa-pencil"> Edit</i></button>
                @csrf
                @method('DELETE')
                {{-- <button type="submit" data-toggle="tooltip" data-placement="top" title='Delete' class=" btn btn-sm btn-success" onclick="return confirm('Are you sure you want to Delete ?');" ><i class="fa fa-trash"> </i></button> --}}
              </form>
            </td>
          </tr>
          @empty
          <tr>
          <td colspan="12" class="text-center"><h2>No Company Here</h2></td>
        </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
