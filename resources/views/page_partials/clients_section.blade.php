<section class="clients section-padding">
    <div class="container">
        <div class="row" @if(app()->getLocale() == 'ar') style="letter-spacing: 0;" dir="rtl" @endif>
            <div class="col-lg-4 valign">
                <div class="sec-head custom-font mb-0">
                    <h6 @if(app()->getLocale() == 'ar') style="letter-spacing: 0;"  @endif>{{__('site.clients')}}</h6>
                    <h3 @if(app()->getLocale() == 'ar') style="letter-spacing: 0;"  @endif>{!!  __('site.our_clients_title') !!}</h3>
                </div>
            </div>
            <div class="col-lg-8">
                <div>
                    <div class="row bord">
                        @php
                            $clients = \App\Client::all();
                        @endphp
                        @forelse ($clients as $client)
                            <div class="col-md-3 col-6 brands">
                                <div class="item wow fadeIn" data-wow-delay=".3s">
                                    <div class="img">
                                        <img src="{{ ($client->photo) ? $client->photo->getUrl() : '' }}" alt="">
                                        <a href="{{ $client->url}}" class="link" data-splitting>{{ $client->name}}</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                {{ __('site.our_clients_title')}}
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
