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
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-credit-card"></i> &nbspPurchase Order List</p>
        </div>
        <div class="col-md-2">
          <a style="font-size: 14px;" href="{{ route('purchase.create') }}" class="btn btn-primary btn-sm"><i
              class="fa fa-plus"></i>&nbsp;Add New Voucher</a>
        </div>
     </div>
   </div>
    <div class="panel-body">
      <table id="pattern-type-data" class="table table-bordered text-center">
        <thead>
        <tr>
          {{-- <th class="text-center">SL</th> --}}
          <th class="text-center">Pur No</th>
          <th class="text-center">Refer No</th>
          <th class="text-center">Party Acc</th>
          <th class="text-center">Bank Ac</th>
          <th class="text-center">Name</th>
          <th class="text-center">Under</th>
          <th class="text-center">Quantity</th>
          <th class="text-center">Price(Single) </th>
          <th class="text-center">Total</th>
          <th class="text-center">Voucher</th>
          <th class="text-center">Created By</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          <?php $a=1; ?>
          @forelse ($purches as $purch)
          <tr>
            {{-- <td>{{ $a++ }}</td> --}}
            <td>{{ $purch->purchase_no }}</td>
            <td>{{ $purch->reference_no }}</td>
            <td>{{ $purch->getParty->supplier }}</td>
            <td>{{ $purch->getBank->bank_name }}</td>
            <td>{{ $purch->item_name }}</td>
            <td>{{ $purch->getUnder->title }}</td>
            <td>{{ $purch->quantity }}</td>
            <td>{{ $purch->rate }}</td>
            <td>{{ $purch->quantity*$purch->rate }}</td>
            <td><button type="button" data-toggle="tooltip" data-placement="top" title='Voucher Image' class=" btn btn-sm btn-info" value="{{ route('purchase.edit',$purch->id) }}" ><i class="fa fa-file-image-o"> </i></button></td>
            {{-- <td><img class="img-profile rounded-circle" width="70" height="40" src="{{ asset('public/Purchase/'. $purch->file ) }}" alt="Photo Not Found" target="_blank" ></td> --}}
            <td>{{ $purch->getUser->name }}</td>
            <td>
              <form action="{{ route('purchase.destroy',$purch->id) }}" method="POST">
                <button type="button" data-toggle="tooltip" data-placement="top" title='Edit' class=" btn btn-sm btn-success edit_link"
                value="{{ route('purchase.edit',$purch->id) }}" ><i class="fa fa-pencil"> </i></button>
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
