<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Open Graph -->
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:image" content="{{ asset('icons/favicon.svg') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:image" content="{{ asset('icons/favicon.svg') }}">

    <link rel="stylesheet" href="{{ asset('fonts/fonts.css?v=').config('versions.fonts_version') }}">
   <link rel="icon" type="image/png" href="{{ url('icons/favicon-96x96.png') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ url('icons/favicon.svg') }}" />
<link rel="shortcut icon" href="{{ url('icons/favicon.ico') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ url('icons/apple-touch-icon.png') }}" />
<meta name="apple-mobile-web-app-title" content="PayPro" />
<link rel="manifest" href="{{ url('icons/site.webmanifest') }}" />
<link rel="stylesheet" href="{{ asset('css/var.css?v=').config('versions.var_version') }}">
<link rel="stylesheet" href="{{ asset('css/styles.css?v=').config('versions.styles_version') }}">
{{-- LAYOUT HEAD --}}
<link rel="stylesheet" href="{{ asset('css/admins/auth.css?v=1.6') }}">
    @yield('css')
    <title>PayPro | Admins | @yield('title')</title>
</head>
<div class="pulse-container">
        <div class="pulse-loader">
            <div class="pulse-dot"></div>
            <div class="pulse-dot"></div>
            <div class="pulse-dot"></div>
        </div>
       
    </div>
<body>
    <header></header>
   
    <main>
        @yield('main')
    </main>
    <footer></footer>

    <script src="{{ asset('js/script.js?v=').config('versions.script_version') }}"></script>
    @yield('js')
</body>
</html>