@extends('fe.layout')
@section('content')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="{{asset(\App\Helper::getSetting('home','images'))}}" alt="">
          <div class="carousel-container">
            @if(\App\Helper::getSetting('home','title'))
            <h2>{{\App\Helper::getSetting('home','title')}}</h2>
            @endif
            @if(\App\Helper::getSetting('home','intro'))
            <p>{!! \App\Helper::getSetting('home','intro') !!}</p>
            @endif
            @if(\App\Helper::getSetting('home','link') && \App\Helper::getSetting('home','text_link'))
            <a href="{{\App\Helper::getSetting('home','link')}}" class="btn-get-started">{{\App\Helper::getSetting('home','text_link')}}</a>
            @endif
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->
    @php $tf = []; @endphp
    @foreach($menu->get() as $m)
          @if($m->faq_show_home == '1')
            @php $tf[]=$m; @endphp
          @endif
          @include('fe.price',['data'=>$m->price()->get()->toArray(),'label'=>$m->label,'home'=>true,'start'=>$m->show_started])
    @endforeach

    @if($client->count())
    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
          @foreach($client->get() as $cl)
          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="{{asset($cl->image)}}" class="img-fluid" alt="">
          </div><!-- End Client Item -->
          @endforeach
        </div>

      </div>

    </section><!-- /Clients Section -->
    @endif

    @if($feature->count())
      <!-- Features Section -->
    <section id="features" class="features section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="abu-abu">Features</h2>
        <p class="ungu">Check Our Features<br></p>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              @php $tmpf = []; @endphp
              @foreach($feature->get() as $ft)
                @php $tmpf[] = $ft; @endphp
              <li class="nav-item">
                <a class="nav-link {{$loop->first ? 'active show' : ''}} ungu" data-bs-toggle="tab" href="#{{$ft->id}}">{{$ft->feature}}</a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              @foreach($tmpf as $tpf)
              <div class="tab-pane {{$loop->first ? 'active show' : ''}}" id="{{$tpf->id}}">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3 class="ungu">{{$tpf->title}}</h3>
                    <p class="fst-italic abu-abu">{!!$tpf->description!!}</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="{{asset($tpf->image)}}" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Features Section -->

    @if(\App\Helper::getSetting('about','active') == '1')
      <!-- About Section -->
    <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p class="ungu">About Us<br></p>
      </div><!-- End Section Title -->
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            {!! \App\Helper::getSetting('about','section_left') !!}
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <img src="{{asset(\App\Helper::getSetting('about','image'))}}" alt="" class="img-fluid">
          </div>

          <div class="col-lg-4 content" data-aos="fade-up" data-aos-delay="100">
            {!! \App\Helper::getSetting('about','section_right') !!}
          </div>
        </div>
      </div>
    </section><!-- /About Section -->
    @endif
    @endif

    @if($testi)
       <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">
      <div class="container section-title" data-aos="fade-up">
        <h2 class="abu-abu">Client</h2>
        <p class="ungu">Testimonials<br></p>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">
            
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2 class="ungu">{{$testi->title}}</h2>
              <p class="abu-abu">
                {{$testi->description}}
              </p>
            </div>
            <div class="portfolio-details-slider swiper init-swiper">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>
              @php
                $wd = widget('testimoni','testi',$testi->id);
              @endphp
              <div class="swiper-wrapper align-items-center">
                @foreach($wd as $ww)
                <div class="swiper-slide">
                  <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="ungu">Project information</h3>
                    <ul>
                      <li class="abu-abu"><strong>Category</strong>: {{$ww['category']}}</li>
                      <li class="abu-abu"><strong>Client</strong>: {{$ww['clinet']}}</li>
                      <li class="abu-abu"><strong>Project date</strong>: {{$ww['project_date']}}</li>
                      <li class="abu-abu"><strong>Project URL</strong>: <a href="{{$ww['project_url']}}">{{$ww['project_url']}}</a></li>
                    </ul>
                  </div>
                </div>
                @endforeach
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-6">
            <img src="{{asset($testi->image)}}" alt="" class="img-fluid">
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->
    @endif
    @foreach($tf as $ttf)
      @include('fe.faq',['data'=>$ttf])
    @endforeach
  </main>
@endsection