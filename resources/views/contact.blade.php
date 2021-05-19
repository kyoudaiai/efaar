@extends('layout.effar')

@section('hero_section')
<header class="pages-header bg-img valign parallaxie" data-background="{{ asset('effar/img/slid/contact_1.jpg') }}" data-overlay-dark="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cont text-center">
                    <h1>{{ __('site.get_intouch') }}</h1>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- ==================== End Slider ==================== -->
@endsection

@section('content')

 <!-- ==================== Start main-content ==================== -->

 <div class="main-content">

    <!-- ==================== Start Contact ==================== -->

    @if (session()->has('success'))
        <div class="container my-2">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success .alert-dismissible fade show" role="alert">
                        <span class="text-dark"> {{ session('success') }}<span>
                        <button type="button" class="close text-right" data-dismiss="alert" aria-label="Close">×</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($errors->any())
    <div class="container my-2">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-danger .alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-dark"> {{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif

    <section class="contact section-padding">
        <div class="container">
            <div class="row" dir="{{ (\App::isLocale('en') ? 'LTR' : 'RTL') }}">
                <div class="col-lg-6">
                    <div class="form md-mb50">

                        <h4 class="extra-title mb-50">{{ __('site.get_intouch') }}</h4>

                        <form id="contact-form" method="post" action="{{ route('contactsend', app()->getLocale()) }}">
                        @csrf

                            <div class="messages"></div>

                            <div class="controls">

                                <div class="form-group">
                                    <input id="form_name" type="text" name="name" placeholder="{{__('site.name')}}"
                                        required="required">
                                </div>

                                <div class="form-group">
                                    <input id="form_email" type="email" name="email" placeholder="{{__('site.email')}}"
                                        required="required">
                                </div>

                                <div class="form-group">
                                    <textarea id="form_message" name="message" placeholder="{{__('site.message')}}" rows="4"
                                        required="required"></textarea>
                                </div>

                                <button type="submit" class="btn btn-light"><span>{{ __('site.send_message')}}</span></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="cont-info">
                        <h4 class="extra-title mb-50" @if(app()->getLocale() == 'ar') style="letter-spacing: 0;" dir="rtl" @endif>{{ __('site.contact_info')}}</h4>
                        <h3 class="custom-font wow" @if(app()->getLocale() == 'ar') style="letter-spacing: 0;" dir="rtl" @endif>{{__('site.lets_talk')}}
                        </h3>
                        <div class="item mb-40">
                            <h5><a href="#0">info@efaar.com</a></h5>
                            <h5>0599544775</h5>
                        </div>
                        <h3 class="custom-font wow" @if(app()->getLocale() == 'ar') style="letter-spacing: 0;" dir="rtl" @endif>{{ __('site.visit_us') }}
                        </h3>
                        <div class="item">
                            <h6>{{__('site.jeddah')}},
                                <br>{{__('site.riyadh')}}</h6>
                        </div>
                        <div class="social mt-50">

                            <a href="https://twitter.com/e_faar" target="_blank" class="icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://linkedin.com/efaar" target="_blank" class="icon">
                                <i class="fab fa-linkedin"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== End Contact ==================== -->


    <!-- ==================== Start Map ==================== -->

    <div class="map" id="ieatmaps"></div>

    <!-- ==================== End Map ==================== -->




</div>

<!-- ==================== End main-content ==================== -->



@endsection

@push('scripts')
 <!-- Map -->
 <script src="{{ asset('effar/js/map.js') }}"></script>

 <!-- google map api -->
 <script async defer
     src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5bpEs3xlB8vhxNFErwoo3MXR64uavf6Y&callback=initMap">
     </script>

@endpush
