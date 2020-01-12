<!DOCTYPE html>
<html lang="en" class="">
<head>
  <?php $item=DB::table('settings')->where('id',1)->first();  ?>
  <meta charset="utf-8">
  <title>{{$item->header_title}}</title>
  <meta name="description" content=" " />
  <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="{{ asset('public/admin/libs/assets/animate.css/animate.css') }} " type="text/css" />
  <link rel="stylesheet" href="{{ asset('public/admin/libs/assets/font-awesome/css/font-awesome.min.css') }} " type="text/css" />
  <link rel="stylesheet" href="{{ asset('public/admin/libs/assets/simple-line-icons/css/simple-line-icons.css') }} " type="text/css" />
  <link rel="stylesheet" href="{{ asset('public/admin/libs/jquery/bootstrap/dist/css/bootstrap.css') }} " type="text/css" />
  <link rel="stylesheet" href="{{ asset('public/admin/css/font.css') }} " type="text/css" />
  <link rel="stylesheet" href="{{ asset('public/admin/css/app.css') }} " type="text/css" />
  <link rel="stylesheet" href="{{ asset('public/admin/css/scolor.css') }} " type="text/css" />
  <link rel="stylesheet" href="{{ asset('public/admin/css/select2.css') }} " type="text/css" />
  
</head>
<body>
<div class="app app-header-fixed ">
  

    <!-- header -->

@include('admin/pages/header')
  <!-- / header -->


    <!-- aside -->

@include('admin/pages/aside')
  <!-- / aside -->


  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
	    

<div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
    app.settings.asideFolded = false; 
    app.settings.asideDock = false;
  ">
  <!-- main -->
  <div class="col">
    <!-- main header -->

@include('admin/pages/m_header')
    <!-- / main header --> 

    <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">

            @if(Session::has('success'))

            <div class="alert alert-success" role="alert" style="background:#004d40;color:#fff;text-align:center;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Success ! </strong>{{ Session::get('success') }}!
          </div>
          @elseif(Session::has('error'))
          <div class="alert alert-success" role="alert" style="background:#f44336;color:#fff;text-align:center;">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong>{{ Session::get('error') }}!
          </div>   

          @endif
      
@yield('content')
</div>
  </div>
  <!-- / main -->
  <!-- right col -->
 
  <!-- / right col -->
</div>



	</div>
  </div>
  <!-- /content -->
  
  <!-- footer -->

@include('admin/pages/footer')
  <!-- / footer -->



</div>

{{-- <script src="{{ asset('public/admin/js/select2.min.js') }} "></script> --}}
{{-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{ asset('public/admin/libs/jquery/jquery/dist/jquery.js') }} "></script>
<script src="{{ asset('public/admin/libs/jquery/bootstrap/dist/js/bootstrap.js') }} "></script>
<script src="{{ asset('public/admin/js/ui-load.js') }} "></script>
<script src="{{ asset('public/admin/js/ui-jp.config.js') }} "></script>
<script src="{{ asset('public/admin/js/ui-jp.js') }} "></script>
<script src="{{ asset('public/admin/js/ui-nav.js') }} "></script>
<script src="{{ asset('public/admin/js/ui-toggle.js') }} "></script>
<script src="{{ asset('public/admin/js/ui-client.js') }} "></script>
<script src="{{ asset('public/admin/js/sweetalert2.all.min.js') }} "></script>
 
<script>
  $(document).ready(function (){
    $('.edit_link').click(function(){
      var redirect_link = $(this).val();
      Swal.fire({
        title: 'Are you sure?',
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Edit it!'
      }).then((result) => {
        if (result.value) {
          window.location.href =""+ redirect_link;
        }
      });
    });
  });
</script>

<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
</script>

{{-- <script>
  $(document).ready(function() {
      $('.under').select2({
        tags: "true",
      placeholder: "",
      allowClear: true,
      tokenSeparators: [',', ' ']
      });
  });
</script> --}}

{{-- <script>
  CKEDITOR.replace('desc');
</script> --}}

</body>
</html>
