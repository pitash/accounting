    @extends('admin.pages.dashboard')
    @section('content')


    <div class="wrapper-md">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading font-bold">
                    <div class="row">
                        <div class="col-md-10">
                            <p class="m-n font-thin h3">Edit </p>
                        </div>
                        <div class="col-md-2">

                            <a href="{{route('menu.index')}}" class="btn btn-info btn-sm">
                                <i class="fa fa-list-ul"></i>&nbsp;&nbsp;All Menu</a>

                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-10 col-md-offset-1">
                            <form class="bs-example form-horizontal" action="{{ route('menu.update',$item->id) }}" method="post"
                            enctype="multipart/form-data">


                            {{ csrf_field() }}
                            

                            <input type="hidden" name="_method" value="PUT" />


                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label " >{{ 'Menu Title' }} <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="{{$item->title}}"  name="title"  placeholder="Provide Menu Title"  type="text"   required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Url' }} <span style="color:red;"></span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="{{$item->url}}" name="url"  placeholder="Provide Url"  type="text"   >

                                    </div>

                                </div>

                            </div>





                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Parent' }} <span style="color:red;"></span></label>
                                    <div class="col-sm-9">


                                        <select class="form-control" name="parent_id" >
                                            <option value="0">  select </option>

                                           @if(!empty($ite))
                                            @foreach($ite as $em)
                                            <option value="{{$em->id}}" <?php if($item->parent_id==$em->id){{echo "selected";}} ?> >{{$em->title}}</option>
                                            @endforeach
                                            @endif


                                        </select>



                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Icon' }} <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="icon" value="{{$item->icon}}" placeholder="Ex. fa fa-user"  type="text"   required>

                                    </div>

                                </div>

                            </div>




                            <div class="form-group">
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Menu Type' }} <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">


                                        <select class="form-control" name="menu_type"  required="">
                                            <option value=" "> Select </option>
                                            <option value="1"  <?php if($item->parent_id==1){{echo "selected";}} ?>> Single Menu  </option>
                                            <option value="2"  <?php if($item->parent_id==2){{echo "selected";}} ?>> Dropdown Menu </option>
                                            <option value="3"  <?php if($item->parent_id==3){{echo "selected";}} ?>> page Menu  </option>



                                        </select>



                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Menu Order' }} <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" name="menu_order" value="{{$item->menu_order}}"  placeholder="Provide Order"  type="text"   required>

                                    </div>

                                </div>

                            </div>




                           <div class="form-group">
                                <div class="col-md-6">
                                    <label for="title" class="col-sm-3 col-form-label">{{ 'Status' }} <span style="color:red;">*</span></label>
                                    <div class="col-sm-9">


                                        <select class="form-control" name="status" >
                                            <option value="1"  <?php if($item->parent_id==1){{echo "selected";}} ?>>  Active </option>
                                            <option value="0" >  Inactive </option>



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

