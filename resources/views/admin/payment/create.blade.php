@extends('admin.pages.dashboard')
@section('content')
<div class="wrapper-md">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        <div class="row">
          <div class="col-md-10">
            <p class="m-n font-thin h3 text-primary"><i class="fa fa-folder-open"></i>&nbsp Create New Payment Voucher </p>
          </div>
          <div class="col-md-2">
            <a href="{{route('payment.index')}}" class="btn btn-info btn-sm">
                <i class="fa fa-list-ul"></i>&nbsp;&nbsp;All Voucher</a>
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
          <form class="well form-horizontal" action="{{ route('payment.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-5">
                <legend></legend>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Voucher No' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                        <input name="voucher_no" placeholder="2345" class="form-control" required="true" value="{{ old('voucher_no') }}" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'From Account' }} <span style="color:red;">*</span></label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-shield" aria-hidden="true"></i></span>
                        <select class="form-control" value="" required="true" name="from_account">
                          <option value=" ">-- Select One--</option>
                          @if(!empty($custo))
                          @foreach($custo as $cust)
                          <option value="{{ $cust->id }}">{{ $cust->customer }}-{{ $cust->cust_id }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                  </div>
                </div>

                {{-- <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Bank Acc' }}</label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-money" aria-hidden="true"></i></span>
                        <select class="form-control" value="" required="true" name="bank_acc">
                          <option value=" ">-- Select One--</option>
                          @if(!empty($bank))
                          @foreach($bank as $ban)
                          <option value="{{ $ban->id }}">{{ $ban->bank_name }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                  </div>
                </div> --}}
               
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Payment Method' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input name="pay_method"  class="form-control" required="true" value="{{ old('pay_method') }}" placeholder="DBBL" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Reference' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-unsorted"></i></span>
                        <input name="reference" placeholder="Me 10" class="form-control" required="true" value="{{ old('reference') }}" type="text">
                      </div>
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
                  <label class="col-md-4 control-label">{{ 'To Account' }} <span style="color:red;">*</span></label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-shield" aria-hidden="true"></i></span>
                        <select class="form-control" value="" required="true" name="to_account">
                          <option value=" ">-- Select One--</option>
                          @if(!empty($supp))
                          @foreach($supp as $sup)
                          <option value="{{ $sup->id }}">{{ $sup->supplier }}-{{ $sup->sup_id }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Amount' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                        <input name="amount" placeholder="500" class="form-control" required="true" value="{{ old('amount') }}" type="number"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Description' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <textarea rows="5" cols="40" name="desc"></textarea>
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