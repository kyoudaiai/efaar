@extends('layout.effar')
@php
    $portfolios =\App\ Portfolio::all();
    $coverphoto = \App\CoverPhoto::where('name', 'portfolio')->get()->first();
    @endphp

@section('hero_section')
<header class="pages-header bg-img valign parallaxie" data-background="{{ ($coverphoto->photo) ? $coverphoto->photo->getUrl() : '' }}" data-overlay-dark="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cont text-center">
                    <h1>{{__('site.our_amazing_works')}}</h1>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- ==================== End Slider ==================== -->
@endsection

@section('content')

 <!-- ==================== Start works ==================== -->

 <section class="portfolio section-padding pb-70">
    <div class="container">
        <div class="row">



            <!-- gallery -->
            <div class="gallery full-width">

                @forelse ( $portfolios as $portfolio)
                <div class="col-lg-4 col-md-6 items graphic lg-mr">
                    <div class="item-img wow fadeInUp" data-wow-delay=".4s">
                        <a href="{{route('portfolio.detail', [app()->getLocale(), $portfolio->id])}}">
                            <img src="{{ ($portfolio->photo) ? $portfolio->photo->getUrl() : '' }}" alt="image">

                        </a>
                    </div>
                    <div class="cont">
                        <h6>{{ $portfolio->name}}</h6>
                        <span>{{ $portfolio->description }}</span>
                    </div>
                </div>
                @empty
                    Our Portfolio Projects
                @endforelse



            </div>

        </div>
    </div>
</section>

<!-- ==================== End works ==================== -->


@endsection
