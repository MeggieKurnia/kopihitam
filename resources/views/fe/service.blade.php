@extends('fe.layout')
@section('content')
<main class="main">

    @include('fe.banner')
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
    @include('fe.faq',['data'=>$data])
  </main>
@endsection