@extends('layout.users.app')
@section('title')
    Refer and Earn
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/users/refer.css?v=1.2') }}" class="css">
@endsection
@section('main')
    <section class="section 1 fixed use">
 <section style="z-index: 100" class="head use">
        <svg class="pointer" onclick="spa(event,'{{ url('users/dashboard') }}','home')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M85.66,146.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,61.66L43.31,104ZM136,96.3V56a8,8,0,0,0-13.66-5.66l-48,48a8,8,0,0,0,0,11.32l48,48A8,8,0,0,0,136,152V112.37A88.11,88.11,0,0,1,216,200a8,8,0,0,0,16,0A104.15,104.15,0,0,0,136,96.3Z"></path></svg>
        <b class="right-auto">Refer and Earn</b>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M64.12,147.8a4,4,0,0,1-4,4.2H16a8,8,0,0,1-7.8-6.17,8.35,8.35,0,0,1,1.62-6.93A67.79,67.79,0,0,1,37,117.51a40,40,0,1,1,66.46-35.8,3.94,3.94,0,0,1-2.27,4.18A64.08,64.08,0,0,0,64,144C64,145.28,64,146.54,64.12,147.8Zm182-8.91A67.76,67.76,0,0,0,219,117.51a40,40,0,1,0-66.46-35.8,3.94,3.94,0,0,0,2.27,4.18A64.08,64.08,0,0,1,192,144c0,1.28,0,2.54-.12,3.8a4,4,0,0,0,4,4.2H240a8,8,0,0,0,7.8-6.17A8.33,8.33,0,0,0,246.17,138.89Zm-89,43.18a48,48,0,1,0-58.37,0A72.13,72.13,0,0,0,65.07,212,8,8,0,0,0,72,224H184a8,8,0,0,0,6.93-12A72.15,72.15,0,0,0,157.19,182.07Z"></path></svg>
      </section>

         <section class="body use">
           <section class="hero">
            <div class="before" style="background-image:url('{{ asset('images/ref.svg') }}')"></div>
            <strong>Invite Friends and Earn Rewards.</strong>
            <span style="color:#ffd700;">
                @if ($ref->method == 'fixed')
                    Get &#8358;{{ number_format($ref->commission,2) }} for each successsful referral.
                @else
                   Get {{ number_format($ref->commission) }}% each time your referred user purchases a new package.
                @endif
            </span>
           </section>
        
         <div class="house w100 g10 column p10">
              <div class="container">
                   <a onclick="spa(event,'{{ url('users/referrals') }}','refer',document.querySelector('footer .home'),'active')" class="left-auto row" style="color:#ffd700;" href="mm">View My Referrals &raquo;</a>
            <div class="row g5">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M117.18,188.74a12,12,0,0,1,0,17l-5.12,5.12A58.26,58.26,0,0,1,70.6,228h0A58.62,58.62,0,0,1,29.14,127.92L63.89,93.17a58.64,58.64,0,0,1,98.56,28.11,12,12,0,1,1-23.37,5.44,34.65,34.65,0,0,0-58.22-16.58L46.11,144.89A34.62,34.62,0,0,0,70.57,204h0a34.41,34.41,0,0,0,24.49-10.14l5.11-5.12A12,12,0,0,1,117.18,188.74ZM226.83,45.17a58.65,58.65,0,0,0-82.93,0l-5.11,5.11a12,12,0,0,0,17,17l5.12-5.12a34.63,34.63,0,1,1,49,49L175.1,145.86A34.39,34.39,0,0,1,150.61,156h0a34.63,34.63,0,0,1-33.69-26.72,12,12,0,0,0-23.38,5.44A58.64,58.64,0,0,0,150.56,180h.05a58.28,58.28,0,0,0,41.47-17.17l34.75-34.75a58.62,58.62,0,0,0,0-82.91Z"></path></svg>
                <strong class="desc use">Your Referral Link</strong>
            </div>
            <div class="row ref-link">
                <span>{{ url('register?ref='.Auth::guard('users')->user()->username.'') }}</span>
                <div onclick="copy('{{ url('register?ref='.Auth::guard('users')->user()->username.'') }}')" class="copy-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" className="size-6">
  <path d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h.375a3.75 3.75 0 0 1 3.75 3.75v1.875C13.5 8.161 14.34 9 15.375 9h1.875A3.75 3.75 0 0 1 21 12.75v3.375C21 17.16 20.16 18 19.125 18h-9.75A1.875 1.875 0 0 1 7.5 16.125V3.375Z" />
  <path d="M15 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 17.25 7.5h-1.875A.375.375 0 0 1 15 7.125V5.25ZM4.875 6H6v10.125A3.375 3.375 0 0 0 9.375 19.5H16.5v1.125c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V7.875C3 6.839 3.84 6 4.875 6Z" />
</svg>
</div>
            </div>
            <div class="row g10 space-between">
                <button onclick="ShareToWhatsapp('{{ url('register?ref='.Auth::guard('users')->user()->username.'') }}')" class="btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M187.58,144.84l-32-16a8,8,0,0,0-8,.5l-14.69,9.8a40.55,40.55,0,0,1-16-16l9.8-14.69a8,8,0,0,0,.5-8l-16-32A8,8,0,0,0,104,64a40,40,0,0,0-40,40,88.1,88.1,0,0,0,88,88,40,40,0,0,0,40-40A8,8,0,0,0,187.58,144.84ZM152,176a72.08,72.08,0,0,1-72-72A24,24,0,0,1,99.29,80.46l11.48,23L101,118a8,8,0,0,0-.73,7.51,56.47,56.47,0,0,0,30.15,30.15A8,8,0,0,0,138,155l14.61-9.74,23,11.48A24,24,0,0,1,152,176ZM128,24A104,104,0,0,0,36.18,176.88L24.83,210.93a16,16,0,0,0,20.24,20.24l34.05-11.35A104,104,0,1,0,128,24Zm0,192a87.87,87.87,0,0,1-44.06-11.81,8,8,0,0,0-6.54-.67L40,216,52.47,178.6a8,8,0,0,0-.66-6.54A88,88,0,1,1,128,216Z"></path></svg>
                    Whatsapp
                </button>
                  <button onclick="ShareToTelegram('{{ url('register?ref='.Auth::guard('users')->user()->username.'') }}')" style="background: rgb(21, 21, 56)" class="btn">
                   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M228.88,26.19a9,9,0,0,0-9.16-1.57L17.06,103.93a14.22,14.22,0,0,0,2.43,27.21L72,141.45V200a15.92,15.92,0,0,0,10,14.83,15.91,15.91,0,0,0,17.51-3.73l25.32-26.26L165,220a15.88,15.88,0,0,0,10.51,4,16.3,16.3,0,0,0,5-.79,15.85,15.85,0,0,0,10.67-11.63L231.77,35A9,9,0,0,0,228.88,26.19Zm-61.14,36L78.15,126.35l-49.6-9.73ZM88,200V152.52l24.79,21.74Zm87.53,8L92.85,135.5l119-85.29Z"></path></svg>
                   Telegram
                </button>
            </div>
           </div>
           
           <div style="word-break: normal" class="container">
            <div class="row g10 space-between">
                <svg style="width:1.2rem;width:1.2rem;font-size:1.2rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z"></path></svg>
                <strong class="desc use">How It Works</strong>
            </div>
            <div class="row g10">
                <div class="num">1</div>
                <div class="column">
                    <strong>Share Your Link</strong>
                    <span>Send your referral link to your friends and families via social media,email or messaging apps.</span>
                </div>
            </div>
            <div class="row g10">
                <div class="num">2</div>
                <div class="column">
                    <strong>Friend Signs Up</strong>
                    <span>You frends and families registers using your link.</span>
                </div>
            </div>
            <div class="row g10">
                <div class="num">3</div>
                <div class="column">
                    <strong>Friend Purchase Package</strong>
                    <span>Your referred friends and families makes a deposit and purchase package.</span>
                </div>
            </div>
            <div class="row g10 bottom-auto">
                <div class="num">4</div>
                <div class="column">
                    <strong>You get Rewarded</strong>
                    @if ($ref->method == 'fixed')
                     <span>You instantly receive &#8358;{{ number_format($ref->commission,2) }} each time they purchase a package regardless of the package cost.</span>   
                    @else
                        <span>You instantly receive {{ $ref->commission }}% of their purchase amount each time they purchase a package i.e your referred user purchases package of &#8358;50,000.00,you instantly earn &#8358;{{ number_format((($ref->commission*50000)/100),2) }}.</span>
                    @endif
                </div>
            </div>
           </div>
         </div>
         </section>

    </section>
@endsection
@section('js')
    <script class="js">
    window.MyFunc=function(){
        window.ShareToWhatsapp=function(url){
            let wa_link=`https://wa.me/?text=${encodeURIComponent('Join me and Earn millions on this paying platform ' + url)}`;
            window.open(wa_link,'_blank');
        }
         window.ShareToTelegram=function(url){
            let wa_link=`https://t.me/share/url?url=${encodeURIComponent('Join me and Earn millions on this paying platform ' + url)}`;
            window.open(wa_link,'_blank');
        }
    }
    MyFunc();
    </script>
@endsection