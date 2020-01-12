@extends('admin.pages.dashboard')
@section('content')
<div class="wrapper-md">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        <div class="row">
          <div class="col-md-10">
            <p class="m-n font-thin h3 text-primary"><i class="fa fa-folder-open"></i>&nbspCreate Bank Account </p>
          </div>
          <div class="col-md-2">
            <a href="{{route('bank.index')}}" class="btn btn-info btn-sm">
                <i class="fa fa-list-ul"></i>&nbsp;&nbsp;All Bank List</a>
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
          <form class="well form-horizontal" action="{{ route('bank.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-sm-5">
                <legend></legend>
     
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Name' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                        <input name="bank_name" placeholder="Bank Name" class="form-control" required="true" value="{{ old('bank_name') }}" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Initial Amount' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-usd"></i></span>
                        <input name="initial_amount" placeholder="10000" class="form-control" required="true" value="{{ old('initial_amount') }}" type="number">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Address' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <input name="address" placeholder="74/C, Road No: 14" class="form-control" required="true" value="{{ old('address') }}" type="text">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Email' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input  name="eamil" placeholder="name@gmail.com" class="form-control" required="true" value="{{ old('eamil') }}" type="email">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Website' }}</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-bars"></i></span>
                        <input name="website" placeholder="www.bank.com" class="form-control" required="true" value="{{ old('website') }}" type="text">
                      </div>
                   </div>
                </div>
              </div>
              <div class="col-sm-5">
                <legend></legend>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Bank ID' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input name="bank_id" placeholder="AB001" class="form-control" required="true" value="{{ old('bank_id') }}" type="text"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Under' }}</label>
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
                  <label class="col-md-4 control-label">{{ 'Account No' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                        <input name="acc_no" placeholder="6565" class="form-control" required="true" value="{{ old('acc_no') }}" type="text"></div>
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
                          <option value="{{ $curren->id }}">{{ $curren->code }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Phone' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input name="phone" placeholder="01521470000" class="form-control" required="true" value="{{ old('phone') }}" type="number"></div>
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
