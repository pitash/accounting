@extends('admin.pages.dashboard')
@section('content')
<div class="wrapper-md">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">
          <div class="row">
              <div class="col-md-10">
                  <p class="m-n font-thin h3 text-primary"><i class="fa fa-pencil-square-o"></i>&nbspEdit New Tree </p>
              </div>
              <div class="col-md-2">
                  <a href="{{ url('list') }}" class="btn btn-info btn-sm">
                      <i class="fa fa-mail-reply-all"></i>&nbsp;&nbsp;Back</a>

                  </div>
              </div>
          </div><br>

          <div class="panel-body">
              <div class="col-md-10 col-md-offset-1">
                  <form class="bs-example form-horizontal" action="{{ route('tree.update', $tr->id )}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="_method" value="PUT" />
                  <div class="form-group">
                      <div class="col-md-6">
                        <label for="title" class="col-sm-3 col-form-label">{{ 'Parent' }} <span style="color:red;"></span></label>
                        <div class="col-sm-9">
                          <select class="form-control" name="parent_id" >
                            <option value=" ">  select </option>
                            @if(!empty($trees))
                            @foreach($trees as $tree)
                            <option value="{{ $tree->id }}" <?php if($tree->id == $tr->parent_id) {echo"selected";} ?> >{{ $tree->title }}</option>
                            @endforeach
                            @endif
                          </select>
                        </div>
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-md-6">
                          <label for="title" class="col-sm-3 col-form-label " >{{ 'Name' }} <span style="color:red;">*</span></label>
                          <div class="col-sm-9">
                              <input class="form-control" name="title" value="{{ $tr->title }}" placeholder="Provide Title"  type="text" required>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-12">
                      <hr>
                      <div class="form-group" style="float:right;">
                          <div class="text-center">
                              <input class="btn btn-primary" type="submit" value="Update">
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

