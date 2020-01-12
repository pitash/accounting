@extends('admin.pages.dashboard')
@section('content')
<div class="wrapper-md">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        <div class="row">
          <div class="col-md-10">
            <p class="m-n font-thin h3 text-primary"><i class="fa fa-folder-open"></i>&nbsp Create New Invoice </p>
          </div>
          <div class="col-md-2">
            <a href="{{route('invoice.index')}}" class="btn btn-info btn-sm">
                <i class="fa fa-list-ul"></i>&nbsp;&nbsp;All Invoice</a>
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
          <form class="well form-horizontal" action="{{ route('invoice.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-5">
                <legend></legend>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Invoice No' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                        <input name="invoice_no" placeholder="2345" class="form-control" required="true" value="{{ old('invoice_no') }}" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Client Name' }} <span style="color:red;">*</span></label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-user" aria-hidden="true"></i></span>
                        <select class="form-control" value="" required="true" name="client_name">
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

                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Invoice Due Date' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input name="due_date" placeholder="Customer ID" class="form-control" required="true" value="{{ old('due_date') }}" type="date"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Item Name' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-comment"></i></span>
                        <input name="item_name" placeholder="Me 10" class="form-control" required="true" value="{{ old('item_name') }}" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Quantity' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-reorder"></i></span>
                        <input name="quantity" placeholder="40" class="form-control" required="true" value="{{ old('quantity') }}" type="number">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Price(Single)' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-crop"></i></span>
                        <input name="price" placeholder="500" class="form-control" required="true" value="{{ old('price') }}" type="number">
                      </div>
                   </div>
                </div>
                {{-- <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Total' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-plus"></i></span>
                        <input name="total" placeholder="2000" class="form-control" required="true" value="{{ old('total') }}" type="number">
                      </div>
                   </div>
                </div> --}}
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
                  <label class="col-md-4 control-label">{{ 'Payment Method' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input name="pay_method"  class="form-control" required="true" value="{{ old('pay_method') }}" placeholder="Cash" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Status' }} <span style="color:red;">*</span></label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-shield" aria-hidden="true"></i></span>
                        <select class="form-control" value="" required="true" name="status">
                          <option value=" ">-- Select One--</option>
                          <option value="Paid">Paid</option>
                          <option value="UnPaid">UnPaid</option>
                          <option value="Canceled">Canceled</option>
                          <option value="Refunded">Refunded</option>
                        </select>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Attachment File' }}</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-file-picture-o"></i></span>
                        <input name="att_file" class="form-control" value="{{ old('att_file') }}" type="file">
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