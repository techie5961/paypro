<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- SEO -->
<meta name="description" content="Buy packages on PayPro, earn daily returns, and withdraw your earnings easily. Start your journey to passive income today.">
<meta name="keywords" content="PayPro, earn daily returns, buy packages, passive income, withdraw earnings, investment, online income">
<meta name="author" content="Techie Innovations">

<!-- Open Graph -->
<meta property="og:title" content="PayPro - Earn Daily Returns on Your Investments">
<meta property="og:description" content="Join PayPro to buy packages, earn daily returns, and withdraw your profits hassle-free.">
<meta property="og:image" content="{{ asset('icons/favicon.svg') }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="PayPro - Earn Daily Returns">
<meta name="twitter:description" content="Buy packages and earn daily returns with PayPro. Withdraw your earnings anytime.">
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
<link rel="stylesheet" href="{{ asset('css/users/auth.css?v=1.6') }}">
    @yield('css')
    <title>PayPro | Users | @yield('title')</title>
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