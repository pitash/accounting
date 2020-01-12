
@extends('admin.pages.dashboard')
@section('content')


<div class="wrapper-md">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading font-bold">
                <div class="row">
                    <div class="col-md-10">
                        <p class="m-n font-thin h3">Company Details</p>
                    </div>
                    <div class="col-md-2">


                    </div>
                </div>
            </div>

          <div class="panel-body">
            <div class="col-md-12 ">
                <form class="bs-example form-horizontal" action="{{ route('setting.update',$item->id) }}" method="post"
                enctype="multipart/form-data">

                {{ csrf_field() }}

                 <input type="hidden" name="_method" value="PUT" />

                <div class="form-group">

                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Company Name' }} <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" name="company_name" value="{{$item->company_name}}"  type="text"   required>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Header Title' }} <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" value="{{$item->header_title}}"  name="header_title"   type="text"   required>

                        </div>
                    </div>

                </div>


                <div class="form-group">

                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Company Address' }} <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" name="company_address" value="{{$item->company_address}}"  type="text"   required>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Company Phone' }} <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" value="{{$item->company_phone}}"  name="company_phone"   type="text"   required>

                        </div>
                    </div>

                </div>



                <div class="form-group">

                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Company Email' }} <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" name="company_email" value="{{$item->company_email}}"  type="text"   required>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Copyright' }} <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" value="{{$item->copyright}}"  name="copyright"   type="text"   required>

                        </div>
                    </div>

                </div>

                

                <div class="form-group">

                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Company Logo' }} <span style="color:red;">*</span></label>

                        <div class="col-sm-8">

                            <input class="form-control"   name="company_logo"   type="file"   >

                        </div>
                    </div>

                </div>






                <div class="col-md-12">
                    <hr>
                    <div class="form-group" style="float:right;">
                        <div class="text-center">
                            <input class="btn btn-primary" type="submit" value="Submit ">
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection

