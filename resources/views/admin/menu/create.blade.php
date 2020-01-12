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

                            <a href="{{route('menu.index')}}" class="btn btn-info btn-sm">
                                <i class="fa fa-list-ul"></i>&nbsp;&nbsp;All Menu</a>

                            </div>
                        </div>
                    </div>


                    <div class="panel-body">
                        <div class="col-md-10 col-md-offset-1">
                            <form class="bs-example form-horizontal" action="{{ route('menu.store') }}" method="post"
                            enctype="multipart/form-data">

                            {{ csrf_field() }}
                            

                            

                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label " >{{ 'Menu Title' }} <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="title"  placeholder="Provide Menu Title"  type="text"   required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Url' }} <span style="color:red;"></span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="url"  placeholder="Provide Url"  type="text"   >

                                    </div>

                                </div>

                            </div>





                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Parent' }} <span style="color:red;"></span></label>
                                    <div class="col-sm-9">


                                        <select class="form-control" name="parent_id" >
                                            <option value=" ">  select </option>

                                           @if(!empty($item))
                                            @foreach($item as $item)
                                            <option value="{{$item->id}}">{{$item->title}}</option>
                                            @endforeach
                                            @endif


                                        </select>



                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Icon' }} <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="icon"  placeholder="Ex. fa fa-user"  type="text"   required>

                                    </div>

                                </div>

                            </div>




                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Menu Type' }} <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">


                                        <select class="form-control" name="menu_type"  required="">
                                            <option value="0"> Select </option>
                                            <option value="1"> Single Menu  </option>
                                            <option value="2"> Dropdown Menu </option>
                                            <option value="3"> page Menu  </option>



                                        </select>



                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Menu Order' }} <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="menu_order"  placeholder="Provide Order"  type="text"   required>

                                    </div>

                                </div>

                            </div>




                           <div class="form-group">
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Status' }} <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">


                                        <select class="form-control" name="status" >
                                            <option value="1">  Active </option>
                                            <option value="0">  Inactive </option>



                                        </select>



                                    </div>
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

