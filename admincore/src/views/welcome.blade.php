@extends('admin::layout')
@section('content')
	<section class="no-padding-top">
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-lg-12">
              		<div class="alert alert-success">Welcome {{auth()->guard('admin')->user()->name}}</div>  	
                </div>
              </div>
        	</div>
        </div>
    </section>
@endsection