@extends('admin.pages.dashboard')
@section('content')
<div class="wrapper-md">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
        <div class="row">
          <div class="col-md-10">
            <p class="m-n font-thin h3 text-primary"><i class="fa fa-pencil-square-o"></i>&nbsp Edit purchase Order </p>
          </div>
          <div class="col-md-2">
            <a href="{{route('purchase.index')}}" class="btn btn-info btn-sm">
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
          <form class="well form-horizontal" action="{{ route('purchase.update', $purch->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT" />
            <div class="row">
              <div class="col-sm-5">
                <legend></legend>
                {{-- <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Purchase No' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-plus-square"></i></span>
                        <input name="purchase_no" placeholder="2345" class="form-control" required="true" value="{{ $purch->purchase_no }}" type="text">
                      </div>
                   </div>
                </div> --}}
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Reference No' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-reorder"></i></span>
                        <input name="reference_no" placeholder="ZSD500" class="form-control" required="true" value="{{  $purch->reference_no }}" type="text"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Date' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input name="date" value="{{ $purch->date }}" placeholder="Customer ID" class="form-control" required="true" type="date"></div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Party A/C Name' }} <span style="color:red;">*</span></label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-shield" aria-hidden="true"></i></span>
                        <select class="form-control" value="" required="true" name="party_name">
                          <option value=" ">-- Select One--</option>
                          @if(!empty($supp))
                          @foreach($supp as $sup)
                          <option value="{{ $sup->id }}" <?php if($sup->id == $purch->party_name) {echo"selected";} ?> >{{ $sup->supplier }}-{{ $sup->sup_id }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Bank Acc' }}</label>
                  <div class="col-md-8 inputGroupContainer">
                      <div class="input-group">
                        <span class="input-group-addon" style="max-width: 100%;"><i class="fa fa-money" aria-hidden="true"></i></span>
                        <select class="form-control" value="" required="true" name="bank_acc">
                          <option value=" ">-- Select One--</option>
                          @if(!empty($bank))
                          @foreach($bank as $ban)
                          <option value="{{ $ban->id }}" <?php if($ban->id == $purch->bank_acc) {echo"selected";} ?> >{{ $ban->bank_name }}</option>
                          @endforeach
                          @endif
                        </select>
                      </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Note' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-globe"></i></span>
                        <input name="note"  class="form-control" required="true" value="{{ $purch->note }}" placeholder="Your Opinion" type="text">
                      </div>
                   </div>
                </div>
              </div>
              <div class="col-sm-5">
                <legend></legend>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'File' }}</label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-file-photo-o"></i></span>
                        <input name="att_file" placeholder="500" class="form-control"value="{{ old('att_file') }}" type="file"></div>
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
                          <option data-tokens="{{ $item->title }}" value="{{ $item->id }}" <?php if($item->id == $purch->under) {echo"selected";} ?>>{{ $item->title }}</option>
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
                  <label class="col-md-4 control-label">{{ 'Item Name' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-cubes"></i></span>
                        <input name="item_name" value="{{ $purch->item_name }}" placeholder="Product Name" class="form-control" required="true" type="text"></div>
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
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Quantity' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-unsorted"></i></span>
                        <input name="quantity" value="{{ $purch->quantity }}" placeholder="10" class="form-control" required="true" type="number">
                      </div>
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4 control-label">{{ 'Rate(Per)' }} <span style="color:red;">*</span></label>
                   <div class="col-md-8 inputGroupContainer">
                      <div class="input-group"><span class="input-group-addon"><i class="fa fa-reorder"></i></span>
                        <input name="rate" value="{{ $purch->rate }}" placeholder="500" class="form-control" required="true" type="number"></div>
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