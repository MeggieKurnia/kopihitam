<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Admin Login</title>

    <link rel="stylesheet" href="{{asset('admin_assets/login/css/style.css')}}" media="screen" type="text/css" />
   <style type="text/css">
    .g-recaptcha{
        transform:scale(0.93);
        -webkit-transform:scale(0.93);
        transform-origin:0 0;
        -webkit-transform-origin:0 0;
    }
</style>


</head>

<body>

  <html lang="en-US">
  <head>

    <meta charset="utf-8">

    <title>Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">

    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

  </head>

  <body>

    <div class="container">
      <div class="logocms">
          <center>
            @if(\App\Helper::getSetting('setting','logo'))
            <img src="{{asset(\App\Helper::getSetting('setting','logo'))}}" class="img-thumbnail" />
            @endif
          </center>
        </div>
      <div id="login">
        @if(session()->has('errData'))
            <center>
              <div class="alert alert-error" style="color:red; margin: 0 0 8px;">{{session()->get('errData')}}</div></center>
        @endif
        @if(count($errors))
            @foreach($errors->all() as $err)
              <div class="alert alert-error" style="color:red; margin: 0 0 8px;">{{$err}}</div>
            @endforeach
        @endif
        
        
        <form method="post" autocomplete="off" action="{{url(admin.'/postLogin')}}">
          {!! csrf_field() !!}
          <fieldset class="clearfix">
            <p><span class="fontawesome-user"></span><input type="text" name="loginUsername" placeholder="username" required></p>
            <p><span class="fontawesome-lock"></span><input type="password" name="loginPassword" placeholder="password" required></p>
            @if(env('USE_CAPTCHA',false) == true)
              <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_SITE')}}"></div>
            @endif
            <p><input type="submit" value="Sign In"></p>
          </fieldset>
        </form>
        <div class="copyrights text-center">
        <p>CMS © Copyright {{date('Y')}}.<a href="#" class="external"></a></p>

      <img style="width: 95px; text-align: center;" src="{{asset('admin_assets/logo-webzoic-qanelas-white.png')}}">
        </div>

      </div> <!-- end login -->
    </div>

  </body>
</html>

</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</html>