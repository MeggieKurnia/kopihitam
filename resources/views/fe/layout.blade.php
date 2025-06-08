<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{$meta['meta_title']}}</title>
  <meta name="description" content="{{$meta['meta_desc']}}">
  <meta name="keywords" content="{{$meta['meta_keyword']}}">

  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="{{$meta['meta_title']}}">
  <meta name="twitter:description" content="{{$meta['meta_desc']}}">
  <meta name="twitter:image" content="{{$meta['meta_img']}}">
  <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
  <link rel='canonical' href="{{request()->fullUrl()}}" />

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="{{asset(\App\Helper::getSetting('setting','favicon'))}}"/>
  <link href="{{asset(\App\Helper::getSetting('setting','favicon'))}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/kopihitam.css')}}" rel="stylesheet">
  <style>
  .strike {
    text-decoration: line-through;
  }

  .no-strike {
    text-decoration: none;
  }
</style>
</head>

<body class="index-page">
	<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="{{url('/')}}" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{\App\Helper::getSetting('setting','logo')}}" alt="">
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{url('/')}}" class="{{in_array(request()->segment(1),['','/'])  ? 'active' : ''}}">Beranda</a></li>
          @php
            $tmp = [];
            $tmp2 = [];
          @endphp
          @foreach($menuMain as $m)
            @if($m->template == 'service')
              @php $tmp[$m->id] = $m; @endphp
            @else
              @php $tmp2[$m->id] = $m; @endphp
            @endif
            @if($m->is_parent == null)
              @php $child = \App\Helper::getChildMenus($m->id); @endphp
              <li class="{{ count($child) ? 'dropdown' : '' }}">
                  <a href="{{ count($child) ? 'javascript:void(0)' : url($m->permalink) }}" class="{{$m->permalink == request()->segment(1) && $m->permalink != null ? 'active' : ''}}">
                    @if(count($child))
                      <span>{{$m->label}}</span> <i class="bi bi-chevron-down toggle-dropdown"></i>
                    @else
                      {{$m->label}}
                    @endif
                  </a>
                  @if(count($child))
                    <ul>
                        @foreach($child as $c)
                          @if($c->template == 'service')
                            @php $tmp[$c->id] = $c; @endphp
                          @else
                            @php $tmp2[$c->id] = $c; @endphp
                          @endif
                          <li>
                            <a href="{{$c->permalink}}" class="{{$c->permalink == request()->segment(1) ? 'active' : ''}}">{{$c->label}}</a>
                          </li>
                        @endforeach
                    </ul>
                  @endif
              </li>
            @endif
          @endforeach
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ \App\Helper::getSetting('setting','link_getstart') }}" target="_blank">{!! \App\Helper::getSetting('localization','get_start') !!}</a>

    </div>
  </header>
  @yield('content')
  <footer id="footer" class="footer dark-background footer-color">

    <div class="container footer-top">
      <div class="row gx-6">
        <div class="col-lg-4 col-md- footer-about">
          <a href="{{url('/')}}" class="logo d-flex align-items-center">
            <img src="{{asset(\App\Helper::getSetting('setting','logo'))}}">
          </a>
          <div class="footer-contact pt-3">
            <p>{!!\App\Helper::getSetting('contact','address')!!}</p>
            <p class="mt-3"><strong>Phone:</strong> <span>{{\App\Helper::getSetting('contact','phone')}}</span></p>
            <p><strong>Email:</strong> <span>{{\App\Helper::getSetting('contact','email')}}</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            @if(\App\Helper::getSetting('setting','sosmed_tw'))
            <a href="{{\App\Helper::getSetting('setting','sosmed_tw')}}" target="_blank"><i class="bi bi-twitter-x"></i></a>
            @endif
            @if(\App\Helper::getSetting('setting','sosmed_fb'))
            <a href="{{\App\Helper::getSetting('setting','sosmed_fb')}}" target="_blank"><i class="bi bi-facebook"></i></a>
            @endif
            @if(\App\Helper::getSetting('setting','sosmed_ig'))
            <a href="{{\App\Helper::getSetting('setting','sosmed_ig')}}" target="_blank"><i class="bi bi-instagram"></i></a>
            @endif
            @if(\App\Helper::getSetting('setting','sosmed_in'))
            <a href="{{\App\Helper::getSetting('setting','sosmed_in')}}" target="_blank"><i class="bi bi-linkedin"></i></a>
            @endif
          </div>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="{{url('/')}}">Beranda</a></li>
            @foreach($tmp2 as $t2)
              @if($t2->permalink)
                <li><a href="{{url($t2->permalink)}}">{{$t2->label}}</a></li>
              @endif
            @endforeach
          </ul>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            @foreach($tmp as $t)
              <li><a href="{{url($t->permalink)}}">{{$t->label}}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>
    @if(\App\Helper::getSetting('setting','copyright'))
    <div class="container copyright text-center mt-4">
      <p>
        {!! \App\Helper::getSetting('setting','copyright') !!}
      </p>
    </div>
    @endif
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>