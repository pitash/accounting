@extends('admin.pages.dashboard')
 @section('content')
<!DOCTYPE html>
<html>
<head>
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
	
	<style>
	.tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative;
    cursor: pointer;
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}
	</style>
	
</head>
<body>
  <div class="wrapper-md">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-md-10">
            <p class="m-n font-thin h3 text-primary"><i class="fa fa-code-fork"></i> &nbspCategory List</p>
          </div>
          <div class="col-md-2">
            <!-- Button to Open the Modal -->
            <button style="float: right;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
              Add Category
            </button>
            <!-- The Modal -->
            <div class="modal fade" id="myModal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                    
                    {!! Form::open(['route'=>'add.category']) !!}
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                          <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{{ $message }}</strong>
                        </div>
                      @endif
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        {!! Form::label('Title:') !!}
                        {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                      </div>


                      <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                        {!! Form::label('Category:') !!}
                        {!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']) !!}
                        <span class="text-danger">{{ $errors->first('parent_id') }}</span>
                      </div>


                      {{-- <div class="form-group">
                        <button class="btn btn-success">Add New</button>
                      </div> --}}
                

                  </div>
                  
                  <!-- Modal footer -->

                  {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div> --}}
                  <div class="modal-footer">
                    <button class="btn btn-success">Add New</button>
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>


          </div>
       </div>
     </div>
      <div class="panel-body">
        <div class="col-md-5">
            {{-- <h3>Category List</h3> --}}
              <ul id="tree1" class="tree">
                  @foreach($categories as $category)
                      <li class="branch">
                          <i class="indicator glyphicon glyphicon-plus-sign"> {{ $category->title }}</i>
                          {{-- <a href="#">{{ $category->title }}</a> --}}
                          @if(count($category->childs))
                              @include('admin.tree.manageChild',['childs' => $category->childs])
                          @endif
                      </li>
                  @endforeach
              </ul>
          </div>
          
        
      </div>
    </div>
  </div>

	<script>
	$.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this);
            branch.prepend("");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
/* Initialization of treeviews */
$('#tree1').treed();

</script>
	
 
</body>
</html>

@endsection