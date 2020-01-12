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
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-laptop"></i> &nbspPayment Voucher List</p>
        </div>
        <div class="col-md-2">
          <a style="font-size: 14px;" href="{{ route('payment.create') }}" class="btn btn-primary btn-sm"><i
              class="fa fa-plus"></i>&nbsp;Add New Payment</a>
        </div>
     </div>
   </div>
    <div class="panel-body">
      <table id="pattern-type-data" class="table table-bordered text-center">
        <thead>
        <tr>
          <th class="text-center">SL</th>
          <th class="text-center">Vou No</th>
          <th class="text-center">From</th>
          <th class="text-center">To</th>
          <th class="text-center">Date</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Description</th>
          <th class="text-center">Created By</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          @forelse ($pays as $pay)
          <tr>
            <td>{{ $sl++ }}</td>
            <td>{{ $pay->voucher_no }}</td>
            <td>{{ $pay->getCust->customer }}</td>
            <td>{{ $pay->getSupp->supplier }}</td>
            <td>{{ $pay->date }}</td>
            <td>{{ $pay->amount }}</td>
            <td>{{ $pay->desc }}</td>
            <td>{{ $pay->getUser->name }}</td>
            <td>
              <form action="{{ route('payment.destroy',$pay->id) }}" method="POST">
                <button type="button" data-toggle="tooltip" data-placement="top" title='Edit' class=" btn btn-sm btn-success edit_link"
                value="{{ route('payment.edit',$pay->id) }}" ><i class="fa fa-pencil"> </i></button>
                @csrf
                @method('DELETE')
                {{-- <button type="submit" data-toggle="tooltip" data-placement="top" title='Delete' class=" btn btn-sm btn-success" onclick="return confirm('Are you sure you want to Delete ?');" ><i class="fa fa-trash"> </i></button> --}}
              </form>
            </td>
          </tr>
          @empty
          <tr>
          <td colspan="12" class="text-center"><h2>No Payment Here</h2></td>
        </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
