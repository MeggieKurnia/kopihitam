<!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="{{asset($data->banner)}}" alt="">
           <div class="carousel-container">
            @if($data->banner_title)
            <h2>{{$data->banner_title}}</h2>
            @endif
            @if($data->banner_intro)
            <p>{!! $data->banner_intro !!}</p>
            @endif
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->