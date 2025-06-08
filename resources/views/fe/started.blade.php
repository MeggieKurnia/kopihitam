<section id="clients" class="clients section light-background">
  <div class="container" data-aos="fade-up">
    <div class="row gy-4">
      <div class="col-xl-6 col-md-3 col-6 client-logo heading-title">
        <p class="ungu" style="margin-bottom: 0 !important;">{!! \App\Helper::getSetting('localization','wujudkan_impian') !!}</p>
      </div>
      @php
      	$c = \App\Models\Menus::where('template','contact')->whereIsActive(1)->first();
      @endphp
      @if($c)
      <div class="col-xl-3 col-md-3 col-6 client-logo">
        <a href="{{url($c->permalink)}}" class="btn-orange-kopihitam">{{$c->label}}</a>
      </div>
      @endif
      <div class="col-xl-3 col-md-3 col-6 client-logo">
        <a href="{{ \App\Helper::getSetting('setting','link_getstart') }}" target="_blank" class="btn-orange-kopihitam">{!! \App\Helper::getSetting('localization','get_start') !!}</a>
      </div>
    </div>
  </div>
</section>