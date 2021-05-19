@extends('layout.effar')
@php
    $coverphoto = \App\CoverPhoto::where('name', 'blog')->get()->first();
@endphp

@section('hero_section')
<header class="pages-header bg-img valign parallaxie" data-background="{{ ($coverphoto->photo) ? $coverphoto->photo->getUrl() : '' }}" data-overlay-dark="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cont text-center">
                        <h1>Our Blog</h1>

                    </div>
                </div>
            </div>
        </div>
    </header>


<!-- ==================== End Slider ==================== -->
@endsection




@section('content')

<section class="blog-pg section-padding pt-0">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="posts">
                    @forelse($posts as $post)
                        <div class="item mb-80">
                            <div class="img">
                                <a href="{{ route('blog.post', [app()->getLocale(), $post->id]) }}">
                                    <img src="{{ ($post->photo) ? $post->photo->getUrl() : '' }}" alt="Photo" width="100%" height="auto">
                                </a>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-10">
                                        {{$post->published_at->format("D M d, Y")}}
                                        <div class="tags">
                                            @foreach($post->tags as $tag)
                                                <a class="#0" href="{{route('blog.tag', [app()->getLocale(), $tag->id])}}">{{$tag->name}}</a>
                                            @endforeach
                                        </div>
                                        <h4 class="title"><a href="{{route('blog.post', [app()->getLocale(), $post->id])}}">{{$post->title}}</a></h4>
                                        <p>
                                            {!! substr($post->content, 0, 100) !!}...
                                        </p>
                                        <a href="{{ route('blog.post', [app()->getLocale(), $post->id]) }}" class="simple-btn mt-30">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="item text-center">Sorry. No Articles</div>
                    @endforelse

                    {{ $posts->appends([ 'search' => request()->query('search') ])->links() }}

                </div>
            </div>
            <div class="col-md-3">


                <aside class="text-left">
                    <!-- Search Form-->
                    <h6 class="text-uppercase text-spacing-60">Search</h6>
                    <div class="text-right">
                                    <!-- RD Search Form-->
                                    <form class="form-search rd-search" action="#" method="GET">
                                        <div class="form-group">
                                        <input class="form-search-input input-sm form-control input-sm" id="blog-sidebar-3-form-search-widget" type="text" name="search" autocomplete="off">
                                        </div>
                                        <button class="btn btn-sm btn-dark" type="submit"><small>Search</small></button>
                                    </form>
                    </div>

                <div class="range offset-top-41">
                    <hr>
                    <!-- Category-->
                    <h6 class="text-uppercase">Categories</h6>

                    <ul class="list list-marked offset-top-30">
                        @foreach($categories as $category)
                        <li><a href="{{route('blog.category', [app()->getLocale(), $category->id])}}">{{$category->name}} <span class="text-dark">({{$category->posts->count()}})</span></a></li>
                        @endforeach
                    </ul>
                    </div>
                    <div class="cell-xs-6 cell-lg-12 offset-top-41 offset-xs-top-0 offset-lg-top-41">
                        <!-- Tags-->
                        <h6 class="offset-top-41 text-uppercase text-spacing-60">Tags</h6>
                        <div class="text-subline"></div>
                        <div class="offset-top-34">
                            <div class="group-xs">
                                @foreach($tags as $tag)
                                    <a class="badge badge-dark" href="{{route('blog.tag', [app()->getLocale(), $tag->id])}}">{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>


                </div>

                </aside>
            </div>
        </div>
    </div>
</section>

@endsection

