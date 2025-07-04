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
  
  
    <link rel="icon" type="image/png" href="{{ asset('icons/favicon-96x96.png') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('icons/favicon.svg') }}" />
<link rel="shortcut icon" href="{{ asset('icons/favicon.ico') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('icons/apple-touch-icon.png') }}" />
<meta name="apple-mobile-web-app-title" content="PayPro" />
<link rel="manifest" href="{{ asset('icons/site.webmanifest') }}" />
<link rel="stylesheet" href="{{ asset('css/var.css?v=').config('versions.var_version') }}">
<link rel="stylesheet" href="{{ asset('css/styles.css?v=').config('versions.styles_version') }}">
<link rel="stylesheet" id="mode" href="{{ asset('css/users/light.css?v=10000') }}">
<link rel="stylesheet" href="{{ asset('css/users/app.css?v=3.3') }}">
{{-- LAYOUT HEAD --}}
<link rel="stylesheet" href="{{ asset('css/users/skeletons.css?v=1.1') }}">

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
     @include('components.skeletons')
    <header>
        <div class="photo">
            <span style="background-image:url('{{ asset('images/users/'.Auth::guard('users')->user()->photo.'') }}')"></span>
        </div>
        
              <div onclick="ToggleMode(this,'{{ asset('css/users') }}','{{ config('versions.mode_version') }}')" class="pointer mode left-auto">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M120,40V32a8,8,0,0,1,16,0v8a8,8,0,0,1-16,0Zm8,24a64,64,0,1,0,64,64A64.07,64.07,0,0,0,128,64ZM58.34,69.66A8,8,0,0,0,69.66,58.34l-8-8A8,8,0,0,0,50.34,61.66Zm0,116.68-8,8a8,8,0,0,0,11.32,11.32l8-8a8,8,0,0,0-11.32-11.32ZM192,72a8,8,0,0,0,5.66-2.34l8-8a8,8,0,0,0-11.32-11.32l-8,8A8,8,0,0,0,192,72Zm5.66,114.34a8,8,0,0,0-11.32,11.32l8,8a8,8,0,0,0,11.32-11.32ZM40,120H32a8,8,0,0,0,0,16h8a8,8,0,0,0,0-16Zm88,88a8,8,0,0,0-8,8v8a8,8,0,0,0,16,0v-8A8,8,0,0,0,128,208Zm96-88h-8a8,8,0,0,0,0,16h8a8,8,0,0,0,0-16Z"></path></svg>
        </div>
        <div  onclick="spa(event,'{{ url('users/notifications') }}','package',document.querySelector('footer .home'),'active')" class="notifications pointer">
          <div class="total"> {!! UserNotifications() !!}</div>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M221.8,175.94C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H88.81a40,40,0,0,0,78.38,0H208a16,16,0,0,0,13.8-24.06ZM128,216a24,24,0,0,1-22.62-16h45.24A24,24,0,0,1,128,216Z"></path></svg>
        </div>
    </header>
   
    <main>
       
        @yield('main')
        <section onclick="HidePopUp(this)" class="popup">
            <div onclick="StopProp(event)" class="child">
               @yield('popup_child') 
            </div>
        </section>

        <section class="slideup" onclick="HideSlideUp(this)">
        <div onclick="StopProp(event)" class="child">
            <div class="head"><div class="bar"></div></div>
            <div class="body">
                @yield('slideup_body')
            </div>
            @yield('slideup_footer')
        </div>
    </section>
    </main>
    
    <footer>
        <div onclick="spa(event,'{{ url('users/dashboard') }}','home',this,'active')" class="column home center pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M240,208H224V136l2.34,2.34A8,8,0,0,0,237.66,127L139.31,28.68a16,16,0,0,0-22.62,0L18.34,127a8,8,0,0,0,11.32,11.31L32,136v72H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16Zm-88,0H104V160a4,4,0,0,1,4-4h40a4,4,0,0,1,4,4Z"></path></svg>
           Home
        </div>
          <div onclick="spa(event,'{{ url('users/withdraw') }}','initiate',this,'active')"  class="column withdraw center pointer">
         <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M128,56H112V16a8,8,0,0,1,16,0Zm64,67.62V72a16,16,0,0,0-16-16H128v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32l-32,32a8,8,0,0,1-11.32,0l-32-32A8,8,0,0,1,93.66,98.34L112,116.69V56H64A16,16,0,0,0,48,72V200a8,8,0,0,0,8,8h74.7c.32.67.67,1.34,1.05,2l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62Z"></path></svg>
                Withdraw
        </div>
          <div onclick="spa(event,'{{ url('users/deposit') }}','initiate',this,'active')" class="column center pointer">
           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M232,198.65V240a8,8,0,0,1-16,0V198.65A74.84,74.84,0,0,0,192,144v58.35a8,8,0,0,1-14.69,4.38l-10.68-16.31c-.08-.12-.16-.25-.23-.38a12,12,0,0,0-20.89,11.83l22.13,33.79a8,8,0,0,1-13.39,8.76l-22.26-34-.24-.38c-.38-.66-.73-1.33-1.05-2H56a8,8,0,0,1-8-8V96A16,16,0,0,1,64,80h48v48a8,8,0,0,0,16,0V80h48a16,16,0,0,1,16,16v27.62A90.89,90.89,0,0,1,232,198.65ZM128,35.31l18.34,18.35a8,8,0,0,0,11.32-11.32l-32-32a8,8,0,0,0-11.32,0l-32,32A8,8,0,0,0,93.66,53.66L112,35.31V80h16Z"></path></svg>
                 Deposit
        </div>
          <div onclick="spa(event,'{{ url('users/packages') }}','package',this,'active')" class="package column center pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80v28a4,4,0,0,0,4,4H64V96.27A8.17,8.17,0,0,1,71.47,88,8,8,0,0,1,80,96v16h96V96.27A8.17,8.17,0,0,1,183.47,88,8,8,0,0,1,192,96v16h44a4,4,0,0,0,4-4V80A16,16,0,0,0,224,64Zm-64,0H96V56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Zm80,68v60a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V132a4,4,0,0,1,4-4H64v16a8,8,0,0,0,8.53,8A8.17,8.17,0,0,0,80,143.73V128h96v16a8,8,0,0,0,8.53,8,8.17,8.17,0,0,0,7.47-8.25V128h44A4,4,0,0,1,240,132Z"></path></svg>
              Packages
        </div>
          <div onclick="spa(event,'{{ url('users/profile') }}','profile',this,'active')" class="column profile center pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M96.26,37A8,8,0,0,1,102,27.29a104.11,104.11,0,0,1,52,0,8,8,0,0,1-2,15.75,8.15,8.15,0,0,1-2-.26,88,88,0,0,0-44,0A8,8,0,0,1,96.26,37ZM33.35,110a8,8,0,0,0,9.85-5.57,88,88,0,0,1,22-38.09A8,8,0,0,0,53.79,55.14a104.05,104.05,0,0,0-26,45A8,8,0,0,0,33.35,110Zm179.44-5.56a8,8,0,0,0,15.42-4.28,104,104,0,0,0-26-45,8,8,0,1,0-11.41,11.22A88,88,0,0,1,212.79,104.45ZM222.66,146a8,8,0,0,0-9.85,5.58,87.61,87.61,0,0,1-19,34.83A79.75,79.75,0,0,0,172,165.11a4,4,0,0,0-4.83.31,59.81,59.81,0,0,1-78.27,0,4,4,0,0,0-4.84-.31,79.52,79.52,0,0,0-22,21.12,87.7,87.7,0,0,1-18.83-34.67,8,8,0,0,0-15.42,4.28,104.07,104.07,0,0,0,200.46,0A8,8,0,0,0,222.66,146ZM128,164a44,44,0,1,0-44-44A44.05,44.05,0,0,0,128,164Z"></path></svg>
             Profile
        </div>
    </footer>
<script>
    let fixImg= '{{ asset('images/fix.svg') }}';
</script>
    <script src="{{ asset('js/script.js?').config('versions.script_version') }}"></script>
    <script src="{{ asset('js/users/app.js?v=3.3') }}"></script>
    <script>
        OnlineStatus(event,'{{ url('users/get/online') }}');
       
        LoadMode('{{ asset('css/users') }}','{{ config('versions.mode_version') }}')
    </script>
    @yield('js')
</body>
</html>