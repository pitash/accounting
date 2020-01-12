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
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-archive"></i> &nbspReceive Voucher List</p>
        </div>
        <div class="col-md-2">
          <a style="font-size: 14px;" href="{{ route('receive.create') }}" class="btn btn-primary btn-sm"><i
              class="fa fa-plus"></i>&nbsp;Add New Voucher</a>
        </div>
     </div>
   </div>
    <div class="panel-body">
      <table id="pattern-type-data" class="table table-bordered text-center">
        <thead>
        <tr>
          <th class="text-center">SL</th>
          <th class="text-center">Order No</th>
          <th class="text-center">From</th>
          <th class="text-center">To</th>
          <th class="text-center">Bill Date</th>
          <th class="text-center">Product</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Price(Single) </th>
          <th class="text-center">Total</th>
          <th class="text-center">Due Date</th>
          <th class="text-center">Created By</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          @forelse ($receives as $receive)
          <tr>
            <td>{{ $sl++ }}</td>
            <td>{{ $receive->order_number }}</td>
            <td>{{ $receive->getCust->customer }}</td>
            <td>{{ $receive->getSupp->supplier }}</td>
            <td>{{ $receive->bill_date }}</td>
            <td>{{ $receive->item_name }}</td>
            <td>{{ $receive->quantity }}</td>
            <td>{{ $receive->rate }}</td>
            <td>{{ $receive->quantity*$receive->rate }}</td>
            <td>{{ $receive->due_date }}</td>
            <td>{{ $receive->getUser->name }}</td>
            <td>
              <form action="{{ route('receive.destroy',$receive->id) }}" method="POST">
                <button type="button" data-toggle="tooltip" data-placement="top" title='Edit' class=" btn btn-sm btn-success edit_link"
                value="{{ route('receive.edit',$receive->id) }}" ><i class="fa fa-pencil"> </i></button>
                @csrf
                @method('DELETE')
                {{-- <button type="submit" data-toggle="tooltip" data-placement="top" title='Delete' class=" btn btn-sm btn-success" onclick="return confirm('Are you sure you want to Delete ?');" ><i class="fa fa-trash"> </i></button> --}}
              </form>
            </td>
          </tr>
          @empty
          <tr>
          <td colspan="12" class="text-center"><h2>No Purches Here</h2></td>
        </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
