@extends('layout.effar')

@section('hero_section')
     <!-- ==================== Start Slider ==================== -->

     <header class="freelancer sub-bg valign bg-img parallaxie" data-background="{{ asset('effar/img/slid/freelancer.jpg') }}" data-overlay-dark="4">
        <div class="container">
                <video autoplay muted loop playbackRate="0.5" id="myVideo">
                    <source src="{{ asset('effar/img/front_movie.mp4') }}" type="video/mp4">
                </video>
        </div>
    </header>

<!-- ==================== End Slider ==================== -->
@endsection

@section('content')
   <!-- ==================== Start about ==================== -->
   <div class="about section-padding purpleColor">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="img-mons">

                                <img src="{{ asset('effar/img/slid/about_3.png') }}" alt="">


                </div>
            </div>
            <div class="col-lg-6 offset-lg-1 valign">
                <div class="content">
                    <div class="sub-title">
                        <h6 @if(app()->getLocale() == 'ar') style="letter-spacing: 0;" dir="rtl" @endif>{{ __('site.aboutus') }}</h6>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <h3 class="main-title wow" data-splitting>{!! __('site.who_we_are_title') !!}</h3>
                    <p class="wow txt" data-splitting>{!! __('site.who_we_are_text') !!}</p>
        <br>
        <a href="{{ route('about', app()->getLocale())}}" class="active">{{ __('site.more') }} ...</a>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ==================== End about ==================== -->

<!-- ==================== Start clients Brands ==================== -->
    @include('page_partials.clients_section')
<!-- ==================== End clients Brands ==================== -->

<!-- ==================== Start call-to-action ==================== -->
@include('page_partials.call_to_action')
<!-- ==================== End call-to-action ==================== -->


@endsection

@push('scripts')
<script>
    document.querySelector('video').playbackRate = 0.8;
</script>

@endpush
