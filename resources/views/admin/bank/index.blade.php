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
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-suitcase"></i> &nbspBank</p>
        </div>
        <div class="col-md-2">
          <a style="font-size: 14px;" href="{{ route('bank.create') }}" class="btn btn-primary btn-sm"><i
              class="fa fa-plus"></i>&nbsp;Add New Bank</a>
        </div>
     </div>
   </div>
    <div class="panel-body">
      <table id="pattern-type-data" class="table table-bordered text-center">
        <thead>
        <tr>
          <th class="text-center">SL</th>
          <th class="text-center">Name</th>
          <th class="text-center">ID</th>
          <th class="text-center">Account</th>
          <th class="text-center">Balance</th>
          <th class="text-center">Currency</th>
          <th class="text-center">Email</th>
          <th class="text-center">Phone</th>
          <th class="text-center">Address</th>
          <th class="text-center">Created By</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          <?php $a=1; ?>
          @forelse ($banks as $bank)
          <tr>
            <td>{{ $a++ }}</td>
            <td>{{ $bank->bank_name }}</td>
            <td>{{ $bank->bank_id }}</td>
            <td>{{ $bank->acc_no }}</td>
            <td>{{ $bank->initial_amount }}</td>
            <td>{{ $bank->getCurrency->code }}</td>
            <td>{{ $bank->eamil }}</td>
            <td>{{ $bank->phone }}</td>
            <td>{{ $bank->address }}</td>
            <td>{{ $bank->getUser->name }}</td>
            <td>
              <form action="{{ route('bank.destroy',$bank->id) }}" method="POST">
                <button type="button" data-toggle="tooltip" data-placement="top" title='Edit' class=" btn btn-sm btn-success edit_link"
                value="{{ route('bank.edit',$bank->id) }}" ><i class="fa fa-pencil"> </i></button>
                @csrf
                @method('DELETE')
                {{-- <button type="submit" data-toggle="tooltip" data-placement="top" title='Delete' class=" btn btn-sm btn-success" onclick="return confirm('Are you sure you want to Delete ?');" ><i class="fa fa-trash"> </i></button> --}}
              </form>
            </td>
          </tr>
          @empty
          <tr>
          <td colspan="12" class="text-center"><h2>No Bank Account Here</h2></td>
        </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
