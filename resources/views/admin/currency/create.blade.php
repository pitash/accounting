@extends('admin.pages.dashboard')
@section('content')
<div class="wrapper-md">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        <div class="row">
          <div class="col-md-10">
            <p class="m-n font-thin h3 text-primary"><i class="fa fa-folder-open"></i>&nbspCreate New Currency </p>
          </div>
          <div class="col-md-2">
            <a href="{{route('currency.index')}}" class="btn btn-info btn-sm">
                <i class="fa fa-list-ul"></i>&nbsp;&nbsp;All Currency</a>
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
          <form class="well form-horizontal" action="{{ route('currency.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-5">
                <legend></legend>
     
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Name' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                        <input name="name" placeholder="Currency Title" class="form-control" required="true" value="" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Code' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-book"></i></span>
                        <input name="code" placeholder="BDT/INR..." class="form-control" required="true" value="" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Symbol' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-comments"></i></span>
                        <input name="symbol" placeholder="$" class="form-control" required="true" value="" type="text">
                      </div>
                   </div>
                </div>
              </div>
              <div class="col-sm-5">
                <legend></legend>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Exchange Rate (BDT)' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-usd"></i></span>
                        <input name="rate" placeholder="100" class="form-control" required="true" value="" type="number"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Notes' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                        <input name="note" class="form-control" required="true" value="" type="text"></div>
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
