<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head {!!   $og ?? '' !!}>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{config('app.url')}}">
    <title>@yield('title')</title>
@yield('meta')
    <link rel="stylesheet" type="text/css" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/icon-font.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/helper.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.min.css') }}?v={{ Config::get('app.media_files_version') }}">
    @yield('css')
    <script>
        var distanceFromBottomToStartLoad = {!! setting('site.scrollDistance', 200) !!},
            AjaxDuration = {!! setting('site.AjaxDuration', 500) !!},
            mediaVersion = '{{ Config::get('app.media_files_version') }}';
    </script>
{!! setting('site.headerSctipts') !!}
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Rubik:300,400&display=swap" rel="stylesheet">
</head>
<body class="{{ $class ?? '' }}  page-{{ str_replace('.', '_', Route::currentRouteName()) }}">
<div class="main-wrapper">
@yield('header')
@yield('content')
@yield('footer')
</div>
<!-- JS-->
<script src="{{ asset('/jquery/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('/js/magazin_js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('/bootstrap/js/popper.min.js') }}"></script>
<script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/magazin_js/vendor/modernizr-2.8.3.min.js') }}"></script>
<script src="{{ asset('/js/plugins.js') }}"></script>
<script src="{{ asset('/js/magazin_js/ajax-mail.js') }}"></script>
<script src="{{ asset('/js/magazin_js/main.js')}}"></script>
@yield('js')
{{--<script src="{{ asset('/js/main.min.js') }}?v={{ Config::get('app.media_files_version') }}"></script>--}}
{{--<!-- JS-->--}}
{{--<link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome-4.7.0/css/font-awesome.min.css') }}">--}}
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
{!! setting('site.footerSctipts') !!}
{!! setting('site.footerCSS') !!}
</body>
</html>
