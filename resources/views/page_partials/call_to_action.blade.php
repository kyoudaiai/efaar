<section class="call-action section-padding purpleColor">
    <div class="container">
        <div class="row" @if(app()->getLocale() == 'ar') style="letter-spacing: 0;" dir="rtl" @endif>
            <div class="col-md-8 col-lg-9">
                <div class="content sm-mb30">
                    <h6 class="wow" data-splitting>{{ __('site.letstalk') }}</h6>
                    <h2 class="text-white" >{!! __('site.about_your_next_project_text') !!}</h2>
                </div>
            </div>

            <div class="col-md-4 col-lg-3 valign">
                <a href="{{route('contact', app()->getLocale())}}" class="btn-curve btn-lit wow fadeInUp" data-wow-delay=".5s"><span @if(app()->getLocale() == 'ar') style="letter-spacing: 0;" dir="rtl" @endif>{{ __('site.get_in_touch') }}</span></a>
            </div>

        </div>
    </div>
</section>
