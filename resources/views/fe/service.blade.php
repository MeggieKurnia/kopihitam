@extends('fe.layout')
@section('content')
<main class="main">

	<!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="{{asset($data->banner)}}" alt="">
         
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Services</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->
   	@include('fe.price',['data'=>$price->get()->toArray(),'label'=>$price->first()->menu()->first()->label])

  </main>
@endsection