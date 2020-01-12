    @extends('admin.pages.dashboard')
    @section('content')


    <div class="wrapper-md">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading font-bold">
                    <div class="row">
                        <div class="col-md-10">
                            <p class="m-n font-thin h3">Create New  </p>
                        </div>
                        <div class="col-md-2">

                            <a href="{{route('category')}}" class="btn btn-info btn-sm">
                                <i class="fa fa-list-ul"></i>&nbsp;&nbsp;All Categories</a>

                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-8 col-md-offset-2">
                            <form class="bs-example form-horizontal" action="{{ route('save-category') }}" method="post"
                            enctype="multipart/form-data">

                            {{ csrf_field() }}
                            

                            

                            <div class="form-group">
                                <label for="title" class="col-sm-2 col-form-label">{{ 'Name' }} <span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name"  placeholder="Provide Name"  type="text"   required>

                                </div>
                            </div>


                           @if(!empty($category))

                            <div class="form-group">
                                <label for="status" class="col-sm-2 col-form-label">{{ 'Parent Category' }}</label>
                                <div class="col-sm-10">
                                 
                                    <select  class="form-control" name="parent_id">
                                      
                                        <option value="0">----------- </option>
                                        @foreach($category as $item)
                                        <option value="{{$item->id}}">{{$item->name}} </option>
                                        @endforeach
                                        
                                        
                                    </select>

                                </div>
                            </div>
                            @endif








                            <div class="form-group">
                                <label for="status" class="col-sm-2 col-form-label">{{ 'Status' }}</label>
                                <div class="col-sm-10">

                                    <select  class="form-control" name="status" >

                                        <option value="1">Active </option>
                                        <option value="0">Inactive</option>


                                    </select>

                                </div>
                            </div>




                            <div class="col-md-12">
                                <hr>
                                <div class="form-group" style="float:right;">
                                    <div class="text-center">
                                        <input class="btn btn-primary" type="submit" value="Create ">
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

