<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('layout.partials.header')

    <body>
        @include('layout.partials.preloaders')

        @include('layout.partials.navbar')

        @yield('hero_section')



    <div class="main-content">
        @yield('content')
        <!-- ==================== Start Footer ==================== -->
        @include('layout.partials.footer')
        <!-- ==================== End Footer ==================== -->
    </div>

    <!-- jQuery -->
    <script src="{{ asset('effar/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('effar/js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('effar/js/plugins.js') }}"></script>
    <script src="{{ asset('effar/js/scripts.js') }}"></script>

    @stack('scripts')
</body>

</html>
