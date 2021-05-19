@extends('layout.effar')
@php
    $coverphoto = \App\CoverPhoto::where('name', 'blog_details')->get()->first();
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

<section class="page-header blg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="cont text-center">
                    <h2>{{$post->title}}</h2>
                    <small>{{$post->published_at->format("D M d, Y")}}</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== Start Header ==================== -->



<!-- ==================== Start Blog ==================== -->

<section class="blog-pg single section-padding pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <div class="post">
                    <div class="img">
                        <img src="{{ ($post->photo) ? $post->photo->getUrl() : '' }}" alt="Photo" width="100%">
                    </div>
                    <div class="content pt-20">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">
                                <div class="cont">
                                    <div class="spacial">
                                        <p>{{$post->description}}</p>
                                    </div>
                                    <p>{!! $post->content !!}</p>
                                </div>
                                <div class="author">
                                    <div class="author-img">
                                        <img src="img/blog/01.jpg" alt="">
                                    </div>
                                    <div class="info">
                                        <h6><span>author :</span> {{ $post->user->name }}</h6>
                                        <div class="social">
                                            <a href="#0"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#0"><i class="fab fa-twitter"></i></a>
                                            <a href="#0"><i class="fab fa-behance"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                              <hr>

                              <div id="disqus_thread"></div>
                              <script>

                              /**
                              *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                              *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                              /*
                              */
                              var disqus_config = function () {
                              this.page.url = "{{ config('app.url') }}/post/{{ $post->id }}";  // Replace PAGE_URL with your page's canonical URL variable
                              this.page.identifier = "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                              };

                              (function() { // DON'T EDIT BELOW THIS LINE
                              var d = document, s = d.createElement('script');
                              s.src = 'https://laraapp-blog.disqus.com/embed.js';
                              s.setAttribute('data-timestamp', +new Date());
                              (d.head || d.body).appendChild(s);
                              })();
                              </script>
                              <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>



                        </div>
                      </div>



                </div>
            </div>
        </div>
    </div>
</section>

@endsection

