@extends('admin.pages.dashboard')
@section('content')
<div class="wrapper-md">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        <div class="row">
          <div class="col-md-10">
            <p class="m-n font-thin h3 text-primary"><i class="fa fa-pencil-square-o"></i>&nbsp Edit New Customer </p>
          </div>
          <div class="col-md-2">
            <a href="{{route('customer.index')}}" class="btn btn-info btn-sm">
                <i class="fa fa-list-ul"></i>&nbsp;&nbsp;All Customer</a>
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
          <form class="well form-horizontal" action="{{ route('customer.update',$customers->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="row">
              <div class="col-sm-5">
                <legend></legend>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Customer Name' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input name="customer" placeholder="Customer Name" class="form-control" required="true" value="{{ $customers->customer }}" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Under' }}</label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-shield" aria-hidden="true"></i></span>
                        <select class="form-control" required="true" name="under">
                          <option value=" ">-- Select One--</option>
                          @if(!empty($ledgers))
                          @foreach($ledgers as $ledger)
                          <option value="{{ $ledger->id }}" <?php if($ledger->id == $customers->under) { echo"selected"; }?> >{{ $ledger->title }}- { {{ $ledger->id }} }</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Address' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <input name="address"  class="form-control" required="true" value="{{ $customers->address }}" placeholder="74/C, Road No : 14" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Phone' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input name="phone" placeholder="01521473700" class="form-control" required="true" value="{{ $customers->phone }}" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Website' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input name="website" placeholder="www.somthing.com" class="form-control" value="{{ $customers->website }}" type="text">
                      </div>
                   </div>
                </div>
                
              </div>
              <div class="col-sm-5">
                <legend></legend>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Image' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                        <input name="image" placeholder="Customer ID" class="form-control" value="{{ $customers->image }}" type="file"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">Currency</label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-money" aria-hidden="true"></i></span>
                        <select class="form-control" value="{{ old('currency') }}" required="true" name="currency">
                          <option value=" ">-- Select One--</option>
                          @if(!empty($currens))
                          @foreach($currens as $curren)
                          <option value="{{ $curren->id }}" <?php if($curren->id == $customers->currency) {echo"selected";} ?> >{{ $curren->code }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Email' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input name="eamil" placeholder="name@gmail.com" class="form-control" required="true" value="{{ $customers->eamil }}" type="email">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Company Name' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-reorder"></i></span>
                        <input name="comp_name" placeholder="Company Name" class="form-control" required="true" value="{{ $customers->comp_name }}" type="text"></div>
                   </div>
                </div>
                
              </div>
            </div>
           <br>
            <button type="submit" class="btn btn-primary center-block fa fa-paper-plane">&nbspUpdate</button>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection
