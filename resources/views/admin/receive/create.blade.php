@extends('admin.pages.dashboard')
@section('content')
<div class="wrapper-md">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        <div class="row">
          <div class="col-md-10">
            <p class="m-n font-thin h3 text-primary"><i class="fa fa-folder-open"></i>&nbsp Create New Receive Voucher </p>
          </div>
          <div class="col-md-2">
            <a href="{{route('receive.index')}}" class="btn btn-info btn-sm">
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
          <form class="well form-horizontal" action="{{ route('receive.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-5">
                <legend></legend>
                
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Party A/C Name' }} <span style="color:red;">*</span></label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-shield" aria-hidden="true"></i></span>
                        <select class="form-control" value="" required="true" name="party_name">
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
                  <label class="col-md-4 control-label">{{ 'Bill Date' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input name="bill_date" placeholder="Customer ID" class="form-control" required="true" value="{{ old('bill_date') }}" type="date"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Order Number' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                        <input name="order_number" placeholder="2345" class="form-control" required="true" value="{{ old('order_number') }}" type="text">
                      </div>
                   </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Quantity' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-unsorted"></i></span>
                        <input name="quantity" placeholder="10" class="form-control" required="true" value="{{ old('quantity') }}" type="number">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Rate(Per)' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-reorder"></i></span>
                        <input name="rate" placeholder="500" class="form-control" required="true" value="{{ old('rate') }}" type="number"></div>
                   </div>
                </div>

              </div>
              <div class="col-sm-5">
                <legend></legend>
                {{-- <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Date' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input name="date" placeholder="Customer ID" class="form-control" required="true" value="{{ old('date') }}" type="date"></div>
                   </div>
                </div> --}}
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
                  <label class="col-md-4 control-label">{{ 'Due Date' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                        <input name="due_date" class="form-control" required="true" value="{{ old('due_date') }}" type="date"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Item Name' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-bookmark"></i></span>
                        <input name="item_name" placeholder="Product Name" class="form-control" required="true" value="{{ old('item_name') }}" type="text"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Description' }}</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <textarea rows="4" cols="40" name="desc">{{ old('item_name') }}</textarea>
                      </div>
                   </div>
                </div>
                {{-- <div class="form-group">
                  <label class="col-md-4 control-label">Currency</label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-money" aria-hidden="true"></i></span>
                        <select class="form-control" value="{{ old('currency') }}" required="true" name="currency">
                          <option value=" ">-- Select One--</option>
                          @if(!empty($currens))
                          @foreach($currens as $curren)
                          <option value="{{ $curren->id }}">{{ $curren->code }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                  </div>
                </div> --}}
                
                
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