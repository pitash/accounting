<!DOCTYPE html>
<html lang="en" class="">
<head>
  <meta charset="utf-8" />
  <title>{{$item->header_title}}</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="" type="text/css" />
  <link rel="stylesheet" href=" {{asset ('public/admin/libs/assets/font-awesome/css/font-awesome.min.css')}}  " type="text/css" />
  <link rel="stylesheet" href="{{asset('public/admin/libs/assets/simple-line-icons/css/simple-line-icons.css')}}" type="text/css" />
  <link rel="stylesheet" href="{{asset('public/admin/libs/jquery/bootstrap/dist/css/bootstrap.css')}}" type="text/css" />

  <link rel="stylesheet" href="{{asset('public/admin/css/font.css')}}" type="text/css" />
  <link rel="stylesheet" href=" {{ asset('public/admin/css/app.css') }}  " type="text/css" />

</head>
<body>
  <div class="app app-header-fixed ">
<style type="text/css">
  .navbar-brand img {
    display: inline;
    max-height: 120px;
    max-width: 130px;
    margin-top: -4px;
    vertical-align: middle;
}
</style>

    <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
      <a href class="navbar-brand block m-t">
<img src="{{'logo/'.$item->company_logo}}" class="img-responsive">
      </a>
      <div class="m-b-lg">
        <div class="wrapper text-center">
          <strong>Sign in to get in touch</strong>
        </div>
        <form name="form" class="form-validation" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="text-danger wrapper text-center" ng-show="authError">

          </div>
          <div class="list-group list-group-sm">
            <div class="list-group-item">
              <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} no-border"name="email" value="{{ old('email') }}  " required autocomplete="email" autofocus>
              @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
            <div class="list-group-item">
             <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} no-border" name="password" required autocomplete="current-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

           </div>
         </div>
         <button type="submit" class="btn btn-lg btn-primary btn-block" > {{ __('Login') }}</button>
         <!-- <div class="text-center m-t m-b"><a ui-sref="access.forgotpwd">Forgot password?</a></div> -->
         <div class="line line-dashed"></div>

       </form>
     </div>
     <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
      <p>
        <small class="text-muted">{{$item->copyright}}</small>
      </p>
    </div>
  </div>


</div>

<script src="{{asset('public/admin/libs/jquery/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('public/admin/libs/jquery/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{asset('public/admin/js/ui-load.js')}}"></script>
<script src="{{asset('public/admin/js/ui-jp.config.js')}}"></script>
<script src="{{asset('public/admin/js/ui-jp.js')}}"></script>
<script src="{{asset('public/admin/js/ui-nav.js')}}"></script>
<script src="{{asset('public/admin/js/ui-toggle.js')}}"></script>
<script src="{{asset('public/admin/js/ui-client.js')}}"></script>

</body>
</html>
