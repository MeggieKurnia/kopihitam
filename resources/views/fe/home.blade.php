@extends('fe.layout')
@section('content')
<style type="text/css">
  .client-slider img {
  max-height: 60px;
  object-fit: contain;
  margin: auto;
  filter: grayscale(100%);
  opacity: 0.7;
  transition: 0.3s;
}

.client-slider img:hover {
  filter: none;
  opacity: 1;
}

</style>
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
    <section class="client-section py-5 light-background">
  <div class="container">
    <div class="swiper client-slider">
      <div class="swiper-wrapper">
        @foreach($client->get() as $cl)
        <div class="swiper-slide"><img src="{{asset($cl->image)}}" alt="Client 1" class="img-fluid"></div>
        @endforeach
      </div>
    </div>
  </div>
</section>
    @endif

    @if($feature->count())
      <!-- Features Section -->
    <section id="features" class="features section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 class="abu-abu">{{\App\Helper::getSetting('localization','feture')}}</h2>
        <p class="ungu">{{\App\Helper::getSetting('localization','check_feature')}}<br></p>
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
    @endif
    @if(\App\Helper::getSetting('about','active') == '1')
      <!-- About Section -->
    <section id="about" class="about section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>{{\App\Helper::getSetting('localization','why_we')}}</h2>
        <p class="ungu">{{\App\Helper::getSetting('localization','why_we_title')}}<br></p>
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

    @if($srv->count())
    <!-- Services Section -->
    <section id="services" class="services section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="container section-title" data-aos="fade-up">
              <center><h2 class="abu-abu">{{$srv->first()->title}}</h2></center>
              <p class="ungu" style="margin-left: 145px;">{!! $srv->first()->subtitle !!}</p>
            </div>
            <div>
              <center><p class="description abu-abu">{{$srv->first()->intro}}</p></center>
            </div>
          </div>
          @php
            $ws = widget('pembuatan_pt','feat',$srv->first()->id);
          @endphp
          @if(count($ws))
            @foreach($ws as $wws)
              @if($loop->index == 2)
                <div class="row gy-4">
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100"></div>
              @endif
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                      <div class="service-item d-flex position-relative h-100" style="border: none !important;">
                        <i class="{{$wws['icon']}} icon flex-shrink-0"></i>
                        <div>
                          <h4 class="title"><a href="javascript:void(0)" class="stretched-link ungu">{{$wws['title']}}</a></h4>
                          <p class="description abu-abu">{!! $wws['desc'] !!}</p>
                        </div>
                      </div>
                    </div>
              @if($loop->index == 3)
                </div>
              @endif
            @endforeach
          @endif
        </div>
      </div>
    </section>
    <!-- /Services Section -->

    @endif
    @if($testi)
       <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">
      <div class="container section-title" data-aos="fade-up">
        <h2 class="abu-abu">{{\App\Helper::getSetting('localization','client')}}</h2>
        <p class="ungu">{{\App\Helper::getSetting('localization','testimonial')}}<br></p>
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
                    <h3 class="ungu">{{\App\Helper::getSetting('localization','project_info')}}</h3>
                    <ul>
                      <li class="abu-abu"><strong>{{\App\Helper::getSetting('localization','project_cat')}}</strong>: {{$ww['category']}}</li>
                      <li class="abu-abu"><strong>{{\App\Helper::getSetting('localization','project_cln')}}</strong>: {{$ww['clinet']}}</li>
                      <li class="abu-abu"><strong>{{\App\Helper::getSetting('localization','project_date')}}</strong>: {{$ww['project_date']}}</li>
                      <li class="abu-abu"><strong>{{\App\Helper::getSetting('localization','project_url')}}</strong>: <a href="{{$ww['project_url']}}">{{$ww['project_url']}}</a></li>
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
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  new Swiper(".client-slider", {
    slidesPerView: 2,
    spaceBetween: 10,
    loop: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false
    },
    breakpoints: {
      576: { slidesPerView: 3 },
      768: { slidesPerView: 4 },
      992: { slidesPerView: 5 }
    }
  });
</script>
@endsection