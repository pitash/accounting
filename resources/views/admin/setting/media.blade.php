
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
                <form class="bs-example form-horizontal" action="{{ route('media.update',$item->id) }}" method="post"
                enctype="multipart/form-data">

                {{ csrf_field() }}

                <input type="hidden" name="_method" value="PUT" />

                <div class="form-group">

                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Facebook ' }} <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" name="fb" value="{{$item->fb}}"  type="text"   required>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Twitter' }} <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" value="{{$item->tw}}"  name="tw"   type="text"   required>

                        </div>
                    </div>

                </div>


                <div class="form-group">

                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Linkedin' }} <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" name="linkedin" value="{{ $item->linkedin }}"  type="text"   required>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <label for="title" class="col-sm-4 col-form-label">{{ 'Gmail' }} <span style="color:red;">*</span></label>
                        <div class="col-sm-8">
                            <input class="form-control" value="{{$item->gmail}}"  name="gmail"   type="text"   required>

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

