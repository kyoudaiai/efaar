@extends('layout.effar')
@php
    $coverphoto = \App\CoverPhoto::where('name', 'clients')->get()->first();
@endphp

@section('hero_section')
<header class="pages-header bg-img valign parallaxie" data-background="{{ ($coverphoto->photo) ? $coverphoto->photo->getUrl() : '' }}" data-overlay-dark="5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cont text-center">
                    <h1>{{ __('site.clients')}}</h1>

                </div>
            </div>
        </div>
    </div>
</header>

<!-- ==================== End Slider ==================== -->
@endsection

@section('content')



<!-- ==================== Start clients Brands ==================== -->
@include('page_partials.clients_section')
<!-- ==================== End clients Brands ==================== -->




<!-- ==================== Start call-to-action ==================== -->

    @include('page_partials.call_to_action')

<!-- ==================== End call-to-action ==================== -->



@endsection
