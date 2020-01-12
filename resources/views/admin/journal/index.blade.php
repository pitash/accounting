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
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-magnet"></i> &nbspJournal List</p>
        </div>
        <div class="col-md-2">
          <a style="font-size: 14px;" href="{{ route('journal.create') }}" class="btn btn-primary btn-sm"><i
              class="fa fa-plus"></i>&nbsp;Add New Journal</a>
        </div>
     </div>
   </div>
    <div class="panel-body">
      <table id="pattern-type-data" class="table table-bordered text-center">
        <thead>
        <tr>
          <th class="text-center">SL</th>
          <th class="text-center">Journal No</th>
          <th class="text-center">Under</th>
          <th class="text-center">Item</th>
          <th class="text-center">Depreciation</th>
          <th class="text-center">Amount</th>
          <th class="text-center">Date</th>
          <th class="text-center">Description</th>
          <th class="text-center">Created By</th>
          <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
          @forelse ($journals as $journal)
          <tr>
            <td>{{ $sl++ }}</td>
            <td>{{ $journal->journal_no }}</td>
            <td>{{ $journal->getUnder->title }}</td>
            <td>{{ $journal->item_name }}</td>
            <td>{{ $journal->depre_name }}</td>
            <td>{{ $journal->amount }}</td>
            <td>{{ $journal->date }}</td>
            <td>{{ $journal->desc }}</td>
            <td>{{ $journal->getUser->name }}</td>
            <td>
              <form action="{{ route('journal.destroy',$journal->id) }}" method="POST">
                <button type="button" data-toggle="tooltip" data-placement="top" title='Edit' class=" btn btn-sm btn-success edit_link"
                value="{{ route('journal.edit',$journal->id) }}" ><i class="fa fa-pencil"> </i></button>
                @csrf
                @method('DELETE')
                {{-- <button type="submit" data-toggle="tooltip" data-placement="top" title='Delete' class=" btn btn-sm btn-success" onclick="return confirm('Are you sure you want to Delete ?');" ><i class="fa fa-trash"> </i></button> --}}
              </form>
            </td>
          </tr>
          @empty
          <tr>
          <td colspan="12" class="text-center"><h2>No Journal Here</h2></td>
        </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
