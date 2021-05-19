@extends('layout.effar')

@php
    $aboutPage = \App\AboutPage::first();
    $coverphoto = \App\CoverPhoto::where('name', 'about')->get()->first();
    @endphp

@section('hero_section')
<header class="pages-header bg-img valign parallaxie" data-background="{{ ($coverphoto->photo) ? $coverphoto->photo->getUrl() : '' }}" data-overlay-dark="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cont text-center">
                    <h1>{{__('site.aboutus')}}</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ==================== End Slider ==================== -->
@endsection

@section('content')

<!-- ==================== who we are ==================== -->
    <section class="intro-section p-2 pb-0 yellowColor" dir="{{ (\App::isLocale('en') ? 'LTR' : 'RTL') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 text-center">
                    <div class="htit sm-mb30">
                        <h4 class="align-middle">{{__('site.who_we_are')}}</h4>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1 col-md-8">
                    <div class="text">
                        @if(\App::isLocale('en'))
                            {!! $aboutPage->who_we_are !!}
                        @endif
                        @if(\App::isLocale('ar'))
                            {!! $aboutPage->who_we_are_ar !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ==================== End who we are ==================== -->



<!-- ==================== Start what we do ==================== -->
    <section class="intro-section  pb-0 blue1Color">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-4">
                    <div class="img">
                        <img class="thumparallax-down" src="{{ asset('effar/img/about_3.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 valign">
                    <div class="content">

                        @if(\App::isLocale('en'))
                            {!! $aboutPage->what_we_do !!}
                        @endif
                        @if(\App::isLocale('ar'))
                            {!! $aboutPage->what_we_do_ar !!}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- ==================== End Mwhat we do ==================== -->



<!-- ==================== Start clients Brands ==================== -->
    @include('page_partials.clients_section')
<!-- ==================== End clients Brands ==================== -->



<!-- ==================== Start call-to-action ==================== -->
    @include('page_partials.call_to_action')
<!-- ==================== End call-to-action ==================== -->


@endsection
