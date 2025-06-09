@if(count($data))
<section id="pricing" class="pricing section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <p class="judul-section ungu">Paket {{$label}}</p>
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-3 justify-content-center">
      @foreach($data as $p)
        @php $p = (object)$p; @endphp
      <div class="col-xl-3 col-lg-6" data-aos="fade-up" data-aos-delay="100">
        <div class="pricing-item @if($p->is_unggulan) featured @endif">
          @if($p->is_advance)
            <span class="advanced">Advanced</span>
          @endif
          <h3>{{$p->title}}</h3>
          @if($p->harga_coret)
          <h6 class="price-strike">
            {!! $p->harga_coret !!}
          </h6>
          @endif
          <h4>{!! $p->harga !!}</h4>
          @php
            $w = widget('price','item',$p->id);
            if(count($w)){
          @endphp
          <ul>
            @foreach($w as $l)
                <li class="abu-abu">{!!$l['items']!!}</li>
            @endforeach
          </ul>
          @php } @endphp
          <div class="btn-wrap">
            <a href="{{$p->link_buy}}" target="_blank" class="btn-buy">{{\App\Helper::getSetting('localization','buy_now')}}</a>
          </div>
        </div>
      </div><!-- End Pricing Item -->
      @endforeach

    </div>

  </div>

</section>
@endif
@if(isset($home))
  @if($start)
    @include('fe.started')
  @endif
@endif