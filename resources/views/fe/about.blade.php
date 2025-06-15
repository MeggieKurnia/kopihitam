@extends('fe.layout')
@section('content')
<main class="main">
	
    @include('fe.banner')
    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">{{$data->label}}</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{url('/')}}">Beranda</a></li>
            <li class="current">{{$data->label}}</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About 2 Section -->
    <section id="about-2" class="about-2 section">

      <div class="container" data-aos="fade-up">

        <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-5">
            <div class="about-img">
              <img src="{{asset($data->about_image)}}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-7">
            <h3 class="pt-0 pt-lg-5">{{$data->about_title}}</h3>
            @php
              $wa = widget('menus','content_about',$data->id);
            @endphp
            <!-- Tabs -->
            @if(count($wa))
            <ul class="nav nav-pills mb-3">
              @php $tmpx=[];@endphp
              @foreach($wa as $wwa)
                @php $tmpx[$loop->index] = $wwa; @endphp
              <li><a class="nav-link {{ $loop->index == 0 ? 'active' : ''}}" data-bs-toggle="pill" href="#about-{{$loop->index}}">{{$wwa['tab_title']}}</a></li>
              @endforeach
            </ul><!-- End Tabs -->

            <!-- Tab Content -->
            <div class="tab-content">
              @foreach($tmpx as $k=>$tx)
              <div class="tab-pane fade {{$k == 0 ? 'show active' : ''}}" id="about-{{$k}}">
                {!! $tx['tab_content'] !!}
              </div><!-- End Tab 1 Content -->
              @endforeach
            </div>
            @endif

          </div>

        </div>

      </div>

    </section><!-- /About 2 Section -->

  </main>
@endsection