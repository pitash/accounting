@extends('admin.pages.dashboard')
@section('content')
<div class="wrapper-md">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        <div class="row">
          <div class="col-md-10">
            <p class="m-n font-thin h3 text-primary"><i class="fa fa-folder-open"></i>&nbsp Create New Journal </p>
          </div>
          <div class="col-md-2">
            <a href="{{route('journal.index')}}" class="btn btn-info btn-sm">
                <i class="fa fa-list-ul"></i>&nbsp;&nbsp;All Journal</a>
          </div>
        </div>
      </div>

      <div class="panel-body">
        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form class="well form-horizontal" action="{{ route('journal.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-5">
                <legend></legend>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Journal No' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                        <input name="journal_no" placeholder="2345" class="form-control" required="true" value="{{ old('journal_no') }}" type="text">
                      </div>
                   </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Item Name' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-unsorted"></i></span>
                        <input name="item_name" placeholder="Computer" class="form-control" required="true" value="{{ old('item_name') }}" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Depreciation Name' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                        <input name="depre_name" placeholder="Computer Dep (10%)" class="form-control" required="true" value="{{ old('depre_name') }}" type="text"></div>
                   </div>
                </div>
              
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Amount' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-reorder"></i></span>
                        <input name="amount" placeholder="500" class="form-control" required="true" value="{{ old('amount') }}" type="number"></div>
                   </div>
                </div>
              </div>
              <div class="col-sm-5">
                <legend></legend>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Date' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input name="date" placeholder="Customer ID" class="form-control" required="true" value="{{ old('date') }}" type="date"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Under' }} <span style="color:red;">*</span></label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-shield" aria-hidden="true"></i></span>
                        <select class="form-control under" value="{{ old('under') }}" required="true" id="under" name="under">
                          <option value="">Select One</option>
                          @if(!empty($ledgers))
                          @foreach($ledgers as $item)
                          <option data-tokens="{{ $item->title }}" value="{{ $item->id }}">{{ $item->title }}</option>
                          <?php $sub=DB::table('categories')->where('parent_id',$item->id)->get(); ?>
                          @foreach($sub as $it)
                          <option value="{{$it->id}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$it->title}} </option>
                          <?php $child=DB::table('categories')->where('parent_id',$it->id)->get(); ?>
                          @foreach($child as $child)
                          <option value="{{$child->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$child->title}} </option>
                          @endforeach
                          @endforeach
                          @endforeach
                          @endif
                        </select>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Description' }}</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <textarea rows="4" cols="40" name="desc"></textarea>
                      </div>
                   </div>
                </div>

              </div>
            </div>
           <br>
            <button type="submit" class="btn btn-primary center-block fa fa-paper-plane">&nbspSubmit</button>
          </form>
      </div>
    </div>
  </div>
</div>

  @endsection