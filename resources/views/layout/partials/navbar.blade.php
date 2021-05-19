<nav class="navbar navbar-expand-lg">
    <div class="container">

        <!-- Logo -->
        <a class="logo" href="#">
            <img id="sitelogo" src="{{ asset('effar/img/logo-purple.png') }}" alt="logo">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"><i class="fas fa-bars"></i></span>
        </button>

        <!-- navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto" dir="{{ (\App::isLocale('en') ? 'LTR' : 'RTL') }}">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home', app()->getLocale())}}">{{__('site.home')}}</a>

                </li>
        <li class="nav-item">
                    <a class="nav-link" href="{{ route('about', app()->getLocale()) }}">{{ __('site.about') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('services', app()->getLocale()) }}">{{ __('site.services') }}</a>
                </li>
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('portfolio', app()->getLocale()) }}">{{ __('site.portfolio') }}</a>
                </li>
        <li class="nav-item">
                    <a class="nav-link" href="{{ route('clients', app()->getLocale()) }}">{{ __('site.clients') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.index', app()->getLocale())}}">{{ __('site.blog') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact', app()->getLocale()) }}">{{ __('site.contact') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ (\App::isLocale('en')) ? '/ar' : '/en'  }}">{{ (\App::isLocale('en')) ? 'العربيه' : 'English'  }}</a>
                </li>
            </ul>
            <div class="search">
                <span class="icon pe-7s-search cursor-pointer"></span>
                <div class="search-form text-center custom-font">
                    <form>
                        <input type="text" name="search" placeholder="Search">
                    </form>
                    <span class="close pe-7s-close cursor-pointer"></span>
                </div>
            </div>
        </div>
    </div>
</nav>
