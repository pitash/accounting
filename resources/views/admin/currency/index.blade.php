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
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-money"></i> &nbspCurrency</p>
        </div>
        <div class="col-md-2">
          <a style="font-size: 14px;" href="{{ route('currency.create') }}" class="btn btn-primary btn-sm"><i
              class="fa fa-plus"></i>&nbsp;Add New Currency</a>
        </div>
     </div>
   </div>
    <div class="panel-body">
      <table id="pattern-type-data" class="table table-bordered text-center">
        <thead>
        <tr>
          <th class="text-center">SL</th>
          <th class="text-center">Name</th>
          <th class="text-center">Code</th>
          <th class="text-center">Exchange Rate (BDT)</th>
          <th class="text-center">Symbol</th>
          <th class="text-center">Notes</th>
          <th class="text-center">Created By</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          <?php $a=1; ?>
          @forelse ($curs as $cur)
          <tr>
            <td>{{ $a++ }}</td>
            <td>{{ $cur->name }}</td>
            <td>{{ $cur->code }}</td>
            <td>{{ $cur->rate }}</td>
            <td>{{ $cur->symbol }}</td>
            <td>{{ $cur->note }}</td>
            <td>{{ $cur->getUser->name }}</td>
            <td>
              <form action="{{ route('currency.destroy',$cur->id) }}" method="POST">
                <button type="button" data-toggle="tooltip" data-placement="top" title='Edit' class=" btn btn-sm btn-info edit_link"
                value="{{ route('currency.edit',$cur->id) }}" ><i class="fa fa-pencil"> </i></button>
                @csrf
                @method('DELETE')
                {{-- <button type="submit" data-toggle="tooltip" data-placement="top" title='Delete' class=" btn btn-sm btn-success" onclick="return confirm('Are you sure you want to Delete ?');" ><i class="fa fa-trash"> </i></button> --}}
              </form>
            </td>
          </tr>
          @empty
          <tr>
          <td colspan="10" class="text-center"><h2>No Currency Here</h2></td>
        </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
