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
          <p class="m-n font-thin h3 text-primary"><i class="fa fa-bar-chart"></i> &nbspManage Ledger</p>
        </div>

     </div>
   </div>
   <div class="panel-body">
    <form class="bs-example form-horizontal" action="{{route('ledger.store')}}" method="post"
    enctype="multipart/form-data">
  
    {{ csrf_field() }}
  
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-6">
              <div class="form-group">
                <select  class="form-control" name="role_id" id="role_id" required="">
                    <option value=" ">Select Ledger Type</option>
                    <option value="customer">Customer</option>
                    <option value="supplier">Supplier</option>
                    <option value="bank">Bank Account</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              {{-- <a type="submit" class="btn btn-success btn-lg" style="padding: 5px 70px;" >Submit</a> --}}
              <button type="submit" class="btn btn-primary center-block fa fa-paper-plane">&nbspSubmit</button>
            </div>
          </div>
        </div>
  
      </form>
    </div>
  </div>
</div>

@endsection
