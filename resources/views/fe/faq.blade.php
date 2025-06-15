@php $wg = widget('menus','faq',$data->id); @endphp
@if(count($wg))
<section id="about-{{$data->id}}" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2 class="judul-section">{{\App\Helper::getSetting('localization','faq')}}</h2>
                <p class="ungu">{{$data->faq_title}}</p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div><!-- End Section Title -->
    
    <div class="container">
        <div class="row gy-4">
            <div class="accordion" id="faqAccordion">
            	@foreach($wg as $wwg)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne-{{$loop->index.'-'.str_replace(" ","",$wwg['que'])}}">
                        <button class="accordion-button accordion-bg-color ungu" type="button" data-bs-toggle="collapse" data-bs-target="#{{$loop->index.'-'.str_replace(" ","",$wwg['que'])}}" aria-expanded="true" aria-controls="collapseOne">
                            <strong>{{$wwg['que']}}</strong>
                        </button>
                    </h2>
                    <div id="{{$loop->index.'-'.str_replace(" ","",$wwg['que'])}}" class="accordion-collapse collapse" aria-labelledby="headingOne-{{$loop->index.'-'.$wwg['que']}}" data-bs-parent="#faqAccordion">
                        <div class="accordion-body abu-abu">
                            {{$wwg['ans']}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif