<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administrator</title>
    @if(null !== \App\Helper::getSetting('website-setting','favicon') )
    <link rel="icon" href="{{asset(\App\Helper::getSetting('website-setting','favicon'))}}">
    @endif
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/datatables/css/dataTables.bootstrap4.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="{{asset('admin_assets/css/font.css')}}">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('admin_assets/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('admin_assets/css/custom.css')}}">
    <!-- Favicon-->
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{asset('admin_assets/vendor/ckeditor/contents.css')}}">
    <link rel="shortcut icon" href="{{asset('admin_assets/vendor/ckeditor/contents.css')}}">
    <link rel="shortcut icon" href="{{asset('admin_assets/vendor/datepicker/datepicker3.css')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <script src="{{asset('admin_assets/vendor/jquery/jquery.min.js')}}"></script>
    <script type="text/javascript">
      var clsAct=null;
    </script>
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="{{url(admin)}}" class="navbar-brand">
                <div class="brand-text brand-big visible text-uppercase">
                  @if(!is_null(\App\Helper::getSetting('setting','logo')))
                    <img src="{{asset(\App\Helper::getSetting('setting','logo'))}}"/>
                  @endif
              </div>
              <div class="brand-text brand-sm">
                @if(!is_null(\App\Helper::getSetting('setting','logo')))
                  <img src="{{asset(\App\Helper::getSetting('setting','logo'))}}"/>
                @endif
              </div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">
            <div class="list-inline-item logout"><a id="logout" href="{{url(admin.'/logout')}}" class="nav-link"> <span class="d-none d-sm-inline">Logout </span><i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="{{asset('admin_assets/download.png')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">{{auth()->guard('admin')->user()->name}}</h1>
          </div>
        </div>
        @php 
          $route = \Config::get('coreadmin');
            if(!empty($route)){
        @endphp
        @if(!empty($route['setting']))
          <span class="heading">Setting</span>
            <ul class="list-unstyled">
              @foreach($route['setting'] as $s=>$r)
                @if(isset($r['is_parent']))
                  @if(\App\Helper::cekChild($route['setting'],$s))
                    <li><a href="#{{$s}}" aria-expanded="false" data-toggle="collapse"> <i class="{{isset($r['fa']) ? $r['fa'] : 'fa fa-bars'}}"></i>{{$r['label']}}</a>
                      <ul id="{{$s}}" class="collapse list-unstyled ">
                        @foreach($route['setting'] as $mv2=>$ev2)
                          @if(@$ev2['parent'] == $s)
                            @if(request()->segment(2) == $mv2)
                            <script type="text/javascript">
                              clsAct = "{{$s}}";
                            </script>
                            @endif
                            @php
                              $ro = in_array($ev2['route'][0],['setting','privillage']) ? $ev2['route'][0] : 'index';
                            @endphp
                            @if(\App\Helper::getPriv(auth()->guard('admin')->user()->id,$mv2,$ro))
                            <li class="{{request()->segment(2) == $mv2 ? 'active' : ''}}"><a href="{{url(admin.'/'.$mv2.'/'.$ro)}}">@if(isset($ev2['fa'])) <i class="{{$ev2['fa']}}"></i> @else <i class="fa fa-bars"></i>  @endif {{$ev2['label']}} </a></li>
                            @endif
                          @endif
                        @endforeach
                      </ul>
                     </li>
                  @endif
                @else
                  @if(isset($r['parent']))
                    @continue
                  @endif
                  @php
                    
                    $ro = in_array($r['route'][0],['setting','privillage']) ? $r['route'][0] : 'index';
                  @endphp
                  @if(\App\Helper::getPriv(auth()->guard('admin')->user()->id,$s,$ro))
                  <li class="{{request()->segment(2) == $s ? 'active' : ''}}"><a href="{{url(admin.'/'.$s.'/'.$ro)}}"> <i class="{{isset($r['fa']) ? $r['fa'] : 'fa fa-bars'}}"></i>{{$r['label']}} </a></li>
                  @endif
                @endif
              @endforeach
            </ul>
          @endif
          @php } @endphp
        <span class="heading">Main</span>
        <ul class="list-unstyled">
            @php
              if(isset($route['content'])){
                if(!empty($route['content'])){
                foreach($route['content'] as $m=>$e){
              @endphp
                @if(@$e['is_parent'])
                  @if(\App\Helper::cekChild($route['content'],$m))
                    <li><a href="#{{$m}}" aria-expanded="false" data-toggle="collapse"> <i class="{{isset($e['fa']) ? $e['fa'] : 'fa fa-bars'}}"></i>{{$e['label']}}</a>
                      <ul id="{{$m}}" class="collapse list-unstyled ">
                        @foreach($route['content'] as $mv=>$ev)
                          @if(@$ev['parent'] == $m)
                            @if(request()->segment(2) == $mv)
                            <script type="text/javascript">
                              clsAct = "{{$m}}";
                            </script>
                            @endif
                            @php
                              $ro = in_array($ev['route'][0],['setting','privillage']) ? $ev['route'][0] : 'index';
                            @endphp
                            @if(\App\Helper::getPriv(auth()->guard('admin')->user()->id,$mv,$ro))
                            <li class="{{request()->segment(2) == $mv ? 'active' : ''}}"><a href="{{url(admin.'/'.$mv.'/'.$ro)}}">@if(isset($ev['fa'])) <i class="{{$ev['fa']}}"></i> @else <i class="fa fa-bars"></i> @endif {{$ev['label']}} </a></li>
                            @endif
                          @endif
                        @endforeach
                      </ul>
                    </li>
                  @endif
                @else
                  @if(isset($e['parent']))
                    @continue
                  @endif
                  @php
                    $ro = in_array($e['route'][0],['setting','privillage']) ? $e['route'][0] : 'index';
                  @endphp
                  @if(\App\Helper::getPriv(auth()->guard('admin')->user()->id,$m,$ro))
                  <li class="{{request()->segment(2) == $m ? 'active' : ''}}"><a href="{{url(admin.'/'.$m.'/'.$ro)}}"> <i class="{{isset($e['fa']) ? $e['fa'] : 'fa fa-bars'}}"></i>{{$e['label']}} </a></li>
                  @endif
                @endif
            @php } } } @endphp
            <li><a href="{{url('/')}}" target="_blank"> <i class="fa fa-globe"></i>Go to web </a></li>
          </ul>
          <ul class="list-unstyled">

          </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">
              @if(request()->segment(2) == 'expience_home') 
                Experience
              @elseif(request()->segment(2) == 'annualreport') 
                Annual Report
              @else
              {{ucfirst(str_replace("-"," ",str_replace("_"," ",request()->segment(2) == 'subsupraco' ? 'Subsidiaries' : request()->segment(2) )))}}
              @endif

            </h2>
          </div>
        </div>
        @yield('content')
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <p>CMS © Copyright {{date('Y')}}. &nbsp;<a href="#" class="external"></a>
              <img style="width: 95px; text-align: center;" src="{{asset('admin_assets/logo-webzoic-qanelas-white.png')}}"></p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admin_assets/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/ckeditor/adapters/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('admin_assets/vendor/datepicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('admin_assets/vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admin_assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin_assets/js/front.js')}}"></script>
    <script type="text/javascript">
      CKEDITOR.config.contentEditable = true;
      CKEDITOR.config.templates_files= ['{{asset("admin_assets/vendor/ckeditor/plugins/templates/templates/default.js?v=".date('YmdHis'))}}','{{asset("admin_assets/vendor/ckeditor/plugins/templates/templates/tes.js?v=".date('YmdHis'))}}'];
      CKEDITOR.config.templates= "default";
      CKEDITOR.config.templates_replaceContent = false;
      CKEDITOR.config.allowedContent = true;
      CKEDITOR.config.extraAllowedContent = 'h2 class';
      CKEDITOR.config.protectedSource.push(/<span[^>]*><\/span>/g);
      CKEDITOR.config.protectedSource.push(/<i[^>]*><\/i>/g);
      CKEDITOR.config.filebrowserBrowseUrl="{{ URL::to('elfinder/ckeditor') }}";
      CKEDITOR.config.image_previewText = CKEDITOR.tools.repeat( ' ', 100 );
      CKEDITOR.dtd.a.div = 1;
      $(document).ready(function(){
        if(clsAct != null){
          $('.list-unstyled > li > a').each(function(){
            if($(this).attr('href') == '#'+clsAct){
              var p = $(this).parent('li').addClass('active');
              $(this).click();
            }
          });
        }
      });
    </script>
  </body>
</html>