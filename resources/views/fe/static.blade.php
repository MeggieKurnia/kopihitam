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
    <section id="about-2" class="about-2 section">
  <div class="container" data-aos="fade-up">
    <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">
      <div class="col-lg-12">
        <h3 class="pt-0 pt-lg-5">{{$data->title_static}}</h3>
        <ul class="nav nav-pills mb-3 garis-batas"></ul>
        <div class="tab-content">
          <div class="tab-pane fade show active" id="about-2-tab1">
            {!! $data->content_static !!}

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  </main>
@endsection