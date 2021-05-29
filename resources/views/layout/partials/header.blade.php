<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="Effar" />
    <meta name="description" content="Effar - home page" />
    <meta name="author" content="" />

    <!-- Title  -->
    <title>{{ config('app.name') }} - @yield('page_title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('effar/img/favicon.png') }}" />

    <!-- Google Fonts -->
    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('effar/css/font-ar.css')}}" rel="stylesheet">
    @else
        <link href="{{ asset('effar/css/font-en.css')}}" rel="stylesheet">
    @endif

    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('effar/css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('effar/css/style.css') }}" />

</head>


