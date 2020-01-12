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

                            <a href="{{route('role.index')}}" class="btn btn-info btn-sm">
                                <i class="fa fa-list-ul"></i>&nbsp;&nbsp;All Role</a>

                            </div>
                        </div>
                    </div>



                    
                    <div class="panel-body">
                        <div class="col-md-8 col-md-offset-2">
                            <form class="bs-example form-horizontal" action="{{ route('role.store') }}" method="post"
                            enctype="multipart/form-data">

                            {{ csrf_field() }}
                            

                            

                            <div class="form-group">
                                <label for="title" class="col-sm-2 col-form-label">{{ 'Role Name' }} <span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="role_name"  placeholder="Provide Role Name"  type="text"   required>

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

