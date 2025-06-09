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
    <section id="portfolio-details" class="portfolio-details section">
      <div class="container section-title" data-aos="fade-up">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
              {!! $data->title_static !!}
          </div>
          <div class="col-md-3"></div>
        </div>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-12">
            {!! $data->content_static !!}
          </div>
        </div>

      </div>

    </section>

  </main>
@endsection