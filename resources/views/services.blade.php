@extends('layout.effar')
@php
    $services = \App\Service::all();
    $coverphoto = \App\CoverPhoto::where('name', 'services')->get()->first();
    @endphp

@section('hero_section')
<header class="pages-header bg-img valign parallaxie" data-background="{{ ($coverphoto->photo) ? $coverphoto->photo->getUrl() : '' }}" data-overlay-dark="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cont text-center">
                    <h1>{{__('site.our_services')}}</h1>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- ==================== End Slider ==================== -->
@endsection

@section('content')

<header class="slider showcase-grid" data-carousel="swiper" data-items="4" data-loop="true" data-space="30" data-speed="1000" data-mousewheel="true">
    <div id="content-carousel-container-unq-1" class="swiper-container" data-swiper="container">
        <div class="swiper-wrapper">
            @forelse ($services as $service)
                <a class="swiper-slide">
                    <div class="bg-img" data-background="{{ ($service->photo) ? $service->photo->getUrl() : '' }}" data-tooltip-tit="{{ \App::isLocale('en') ? $service->name : $service->name_ar }}"
                        data-tooltip-sub="{{ \App::isLocale('en') ? $service->description : $service->description_ar }}"></div>
                </a>
            @empty

            @endforelse
        </div>

    </div>
    <!-- slider setting -->
    <div class="txt-botm">
        <div id="next" class="swiper-button-next swiper-nav-ctrl cursor-pointer">
            <div>
                <span class=" custom-font">Next Slide</span>
            </div>
            <div><i class="fas fa-chevron-right"></i></div>
        </div>
        <div id="prev" class="swiper-button-prev swiper-nav-ctrl cursor-pointer">
            <div><i class="fas fa-chevron-left"></i></div>
            <div>
                <span class=" custom-font">Prev Slide</span>
            </div>
        </div>
    </div>

</header>

@endsection
