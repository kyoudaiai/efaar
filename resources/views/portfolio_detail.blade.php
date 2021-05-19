@extends('layout.effar')
@php
    $coverphoto = \App\CoverPhoto::where('name', 'project_details')->get()->first();
@endphp

@section('hero_section')
<header class="pages-header bg-img valign parallaxie" data-background="{{ ($coverphoto->photo) ? $coverphoto->photo->getUrl() : '' }}" data-overlay-dark="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cont text-center">
                    <h1>{{ $portfolio->name }}</h1>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- ==================== End Slider ==================== -->
@endsection

@section('content')

  <!-- ==================== Start Intro ==================== -->

  <section class="intro-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="htit">
                    <h4><span>01 </span> {{  __('site.introduction') }}</h4>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1 col-md-8 mb-30">
                <div class="text">
                    <p class="extra-text">{!! $portfolio->introduction !!}</p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="item mt-30">
                    <h6>{{__('site.project')}}</h6>
                    <p><a href="#0">{{ $portfolio->name }}</a></p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==================== End Intro ==================== -->




<!-- ==================== Start projdtal ==================== -->

<section class="projdtal">
    <div class="justified-gallery">
        @foreach ($portfolio->photos as $photo)
            <img alt="{{ $photo->name }}" src="{{$photo->photo->getUrl()}}" />
        @endforeach


    </div>
</section>

<!-- ==================== End projdtal ==================== -->



<!-- ==================== Start Intro ==================== -->

<section class="intro-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="htit">
                    <h4><span>02 </span> {{__('site.description')}}</h4>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1 col-md-8 mb-30">
                <div class="text">
                    <p class="extra-text">{!! $portfolio->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== End Intro ==================== -->




<!-- ==================== Start Video-wrapper ==================== -->
@if(!empty($portfolio->video_url))
<section>
    <div class="container-fluid">
        <div class="video-wrapper section-padding bg-img parallaxie valign"
            data-background="{{ $portfolio->photo->getUrl()}}" data-overlay-dark="4">
            <div class="full-width text-center">
                <a class="vid" href="{{$portfolio->video_url}}">
                    <div class="vid-butn">
                        <span class="icon">
                            <i class="fas fa-play"></i>
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- ==================== End Video-wrapper ==================== -->



@endsection
