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

  </main>
@endsection