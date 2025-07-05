@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/users/dashboard.css?v=2.0') }}" class="css">
@endsection
@section('main')
    <section class="section1">
        <b>My Balance</b>
        <strong class="balance">&#8358;{{ $balance }}</strong>
        <b class="desc">Quick Access</b>
        <div class="grid">
            <div onclick="spa(event,'{{ url('users/deposit') }}','initiate')" class="quick">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M232,198.65V240a8,8,0,0,1-16,0V198.65A74.84,74.84,0,0,0,192,144v58.35a8,8,0,0,1-14.69,4.38l-10.68-16.31c-.08-.12-.16-.25-.23-.38a12,12,0,0,0-20.89,11.83l22.13,33.79a8,8,0,0,1-13.39,8.76l-22.26-34-.24-.38c-.38-.66-.73-1.33-1.05-2H56a8,8,0,0,1-8-8V96A16,16,0,0,1,64,80h48v48a8,8,0,0,0,16,0V80h48a16,16,0,0,1,16,16v27.62A90.89,90.89,0,0,1,232,198.65ZM128,35.31l18.34,18.35a8,8,0,0,0,11.32-11.32l-32-32a8,8,0,0,0-11.32,0l-32,32A8,8,0,0,0,93.66,53.66L112,35.31V80h16Z"></path></svg>
                <b>Deposit</b>
            </div>
            <div  onclick="spa(event,'{{ url('users/withdraw') }}','initiate',document.querySelector('footer .withdraw'),'active')" class="quick">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M128,56H112V16a8,8,0,0,1,16,0Zm64,67.62V72a16,16,0,0,0-16-16H128v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32l-32,32a8,8,0,0,1-11.32,0l-32-32A8,8,0,0,1,93.66,98.34L112,116.69V56H64A16,16,0,0,0,48,72V200a8,8,0,0,0,8,8h74.7c.32.67.67,1.34,1.05,2l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62Z"></path></svg>
                <b>Withdraw</b>
            </div>
             <div  onclick="spa(event,'{{ url('users/packages') }}','package',document.querySelector('footer .package'),'active')" class="quick">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80v28a4,4,0,0,0,4,4H64V96.27A8.17,8.17,0,0,1,71.47,88,8,8,0,0,1,80,96v16h96V96.27A8.17,8.17,0,0,1,183.47,88,8,8,0,0,1,192,96v16h44a4,4,0,0,0,4-4V80A16,16,0,0,0,224,64Zm-64,0H96V56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Zm80,68v60a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V132a4,4,0,0,1,4-4H64v16a8,8,0,0,0,8.53,8A8.17,8.17,0,0,0,80,143.73V128h96v16a8,8,0,0,0,8.53,8,8.17,8.17,0,0,0,7.47-8.25V128h44A4,4,0,0,1,240,132Z"></path></svg>
                                <b>Packages</b>
            </div>
            <div  onclick="spa(event,'{{ url('users/bank') }}','package')" class="quick">
               <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208ZM16.3,98.18a8,8,0,0,1,3.51-9l104-64a8,8,0,0,1,8.38,0l104,64A8,8,0,0,1,232,104H208v64h16a8,8,0,0,1,0,16H32a8,8,0,0,1,0-16H48V104H24A8,8,0,0,1,16.3,98.18ZM144,160a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Zm-48,0a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Z"></path></svg>
                 <b>Bank</b>
            </div>
        </div>

    </section>
    <section class="section2">
    <section class="menu">
        <div  onclick="spa(event,'{{ url('users/transactions') }}','package',document.querySelector('footer .home'),'active')"  class="item">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M232,112v32a8,8,0,0,1-8,8H56v16h88a8,8,0,0,1,8,8v24a8,8,0,0,1-8,8H56v8a8,8,0,0,1-16,0V40a8,8,0,0,1,16,0v8H176a8,8,0,0,1,8,8V80a8,8,0,0,1-8,8H56v16H224A8,8,0,0,1,232,112Z"></path></svg>
            <b>Transactions</b>
        </div>
        <div  onclick="spa(event,'{{ url('users/refer') }}','refer',document.querySelector('footer .home'),'active')" class="item">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M64.12,147.8a4,4,0,0,1-4,4.2H16a8,8,0,0,1-7.8-6.17,8.35,8.35,0,0,1,1.62-6.93A67.79,67.79,0,0,1,37,117.51a40,40,0,1,1,66.46-35.8,3.94,3.94,0,0,1-2.27,4.18A64.08,64.08,0,0,0,64,144C64,145.28,64,146.54,64.12,147.8Zm182-8.91A67.76,67.76,0,0,0,219,117.51a40,40,0,1,0-66.46-35.8,3.94,3.94,0,0,0,2.27,4.18A64.08,64.08,0,0,1,192,144c0,1.28,0,2.54-.12,3.8a4,4,0,0,0,4,4.2H240a8,8,0,0,0,7.8-6.17A8.33,8.33,0,0,0,246.17,138.89Zm-89,43.18a48,48,0,1,0-58.37,0A72.13,72.13,0,0,0,65.07,212,8,8,0,0,0,72,224H184a8,8,0,0,0,6.93-12A72.15,72.15,0,0,0,157.19,182.07Z"></path></svg>
            <b>Invite</b>
        </div>
         <div onclick="spa(event,'{{ url('users/packages/active') }}','package',document.querySelector('footer .package'),'active')" class="item">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M223.68,66.15,135.68,18a15.88,15.88,0,0,0-15.36,0l-88,48.17a16,16,0,0,0-8.32,14v95.64a16,16,0,0,0,8.32,14l88,48.17a15.88,15.88,0,0,0,15.36,0l88-48.17a16,16,0,0,0,8.32-14V80.18A16,16,0,0,0,223.68,66.15ZM128,120,47.65,76,128,32l80.35,44Zm8,99.64V133.83l80-43.78v85.76Z"></path></svg>
            <b>My Packages</b>
        </div>
         <div  onclick="spa(event,'{{ url('users/referrals') }}','refer',document.querySelector('footer .home'),'active')" class="item">
             <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H128a8,8,0,0,1,0-16h88A8,8,0,0,1,224,128ZM128,72h88a8,8,0,0,0,0-16H128a8,8,0,0,0,0,16Zm88,112H128a8,8,0,0,0,0,16h88a8,8,0,0,0,0-16ZM82.34,42.34,56,68.69,45.66,58.34A8,8,0,0,0,34.34,69.66l16,16a8,8,0,0,0,11.32,0l32-32A8,8,0,0,0,82.34,42.34Zm0,64L56,132.69,45.66,122.34a8,8,0,0,0-11.32,11.32l16,16a8,8,0,0,0,11.32,0l32-32a8,8,0,0,0-11.32-11.32Zm0,64L56,196.69,45.66,186.34a8,8,0,0,0-11.32,11.32l16,16a8,8,0,0,0,11.32,0l32-32a8,8,0,0,0-11.32-11.32Z"></path></svg>
            <b>My Referrals</b>
        </div>
          <div onclick="window.open('{{ $general->group }}')" class="item">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#d4d4d4" viewBox="0 0 256 256"><path d="M187.58,144.84l-32-16a8,8,0,0,0-8,.5l-14.69,9.8a40.55,40.55,0,0,1-16-16l9.8-14.69a8,8,0,0,0,.5-8l-16-32A8,8,0,0,0,104,64a40,40,0,0,0-40,40,88.1,88.1,0,0,0,88,88,40,40,0,0,0,40-40A8,8,0,0,0,187.58,144.84ZM152,176a72.08,72.08,0,0,1-72-72A24,24,0,0,1,99.29,80.46l11.48,23L101,118a8,8,0,0,0-.73,7.51,56.47,56.47,0,0,0,30.15,30.15A8,8,0,0,0,138,155l14.61-9.74,23,11.48A24,24,0,0,1,152,176ZM128,24A104,104,0,0,0,36.18,176.88L24.83,210.93a16,16,0,0,0,20.24,20.24l34.05-11.35A104,104,0,1,0,128,24Zm0,192a87.87,87.87,0,0,1-44.06-11.81,8,8,0,0,0-6.54-.67L40,216,52.47,178.6a8,8,0,0,0-.66-6.54A88,88,0,1,1,128,216Z"></path></svg>
             <b>Group</b>
        </div>
        <div  onclick="spa(event,'{{ url('users/notifications') }}','package',document.querySelector('footer .home'),'active')" class="item">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M221.8,175.94C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H88.81a40,40,0,0,0,78.38,0H208a16,16,0,0,0,13.8-24.06ZM128,216a24,24,0,0,1-22.62-16h45.24A24,24,0,0,1,128,216Z"></path></svg>
            <b>Notifications</b>
        </div>
        <div  onclick="spa(event,'{{ url('users/tasks') }}','package')" class="item">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM169.66,133.66l-48,48a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L116,164.69l42.34-42.35a8,8,0,0,1,11.32,11.32ZM48,80V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80Z"></path></svg>
            <b>Tasks</b>
        </div>
         <div onclick="spa(event,'{{ url('users/profile') }}','profile',document.querySelector('footer .profile'),'active')" class="item">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M96.26,37A8,8,0,0,1,102,27.29a104.11,104.11,0,0,1,52,0,8,8,0,0,1-2,15.75,8.15,8.15,0,0,1-2-.26,88,88,0,0,0-44,0A8,8,0,0,1,96.26,37ZM33.35,110a8,8,0,0,0,9.85-5.57,88,88,0,0,1,22-38.09A8,8,0,0,0,53.79,55.14a104.05,104.05,0,0,0-26,45A8,8,0,0,0,33.35,110Zm179.44-5.56a8,8,0,0,0,15.42-4.28,104,104,0,0,0-26-45,8,8,0,1,0-11.41,11.22A88,88,0,0,1,212.79,104.45ZM222.66,146a8,8,0,0,0-9.85,5.58,87.61,87.61,0,0,1-19,34.83A79.75,79.75,0,0,0,172,165.11a4,4,0,0,0-4.83.31,59.81,59.81,0,0,1-78.27,0,4,4,0,0,0-4.84-.31,79.52,79.52,0,0,0-22,21.12,87.7,87.7,0,0,1-18.83-34.67,8,8,0,0,0-15.42,4.28,104.07,104.07,0,0,0,200.46,0A8,8,0,0,0,222.66,146ZM128,164a44,44,0,1,0-44-44A44.05,44.05,0,0,0,128,164Z"></path></svg>
            <b>Profile</b>
        </div>
    </section>
    <div class="ads">
        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c56e7" viewBox="0 0 256 256"><path d="M240,124v68a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V124a4,4,0,0,1,4-4H56v64a8,8,0,0,0,8.53,8A8.17,8.17,0,0,0,72,183.73V120h40v20a4,4,0,0,0,4,4h24a4,4,0,0,0,4-4V120h40v64a8,8,0,0,0,8.53,8,8.17,8.17,0,0,0,7.47-8.25V120h36A4,4,0,0,1,240,124ZM184,40H72A56,56,0,0,0,16,96v4a4,4,0,0,0,4,4H56V64.27A8.17,8.17,0,0,1,63.47,56,8,8,0,0,1,72,64v40h40V92a4,4,0,0,1,4-4h24a4,4,0,0,1,4,4v12h40V64.27A8.17,8.17,0,0,1,191.47,56,8,8,0,0,1,200,64v40h36a4,4,0,0,0,4-4V96A56,56,0,0,0,184,40Z"></path></svg></div>
        <span>
            Purchase Packages and Earn Daily interest which is paid out every 24 hours and can be withdrawn anytime.
        </span>
        <button  onclick="spa(event,'{{ url('users/packages') }}','package',document.querySelector('footer .package'),'active')" class="go">Go</button>
    </div>
     <div style="background:aqua;" class="ads">
        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c56e7" viewBox="0 0 256 256"><path d="M230.4,219.19A8,8,0,0,1,224,232H32a8,8,0,0,1-6.4-12.8A67.88,67.88,0,0,1,53,197.51a40,40,0,1,1,53.93,0,67.42,67.42,0,0,1,21,14.29,67.42,67.42,0,0,1,21-14.29,40,40,0,1,1,53.93,0A67.85,67.85,0,0,1,230.4,219.19ZM27.2,126.4a8,8,0,0,0,11.2-1.6,52,52,0,0,1,83.2,0,8,8,0,0,0,12.8,0,52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,93.51a40,40,0,1,0-53.93,0,67.42,67.42,0,0,0-21,14.29,67.42,67.42,0,0,0-21-14.29,40,40,0,1,0-53.93,0A67.88,67.88,0,0,0,25.6,115.2,8,8,0,0,0,27.2,126.4Z"></path></svg></div>
        <span>
            @if ($ref->method == 'fixed')
                Refer and Earn &#8358;{{ number_format($ref->commission,2) }} commission anytime your referred user purchase a new package.
            @else
                Refer and Earn {{ $ref->commission }}% commission anytime your referred user purchase a new package.
            @endif
        </span>
        <button  onclick="spa(event,'{{ url('users/refer') }}','refer',document.querySelector('footer .home'),'active')" class="go">Go</button>
    </div>
     <section class="grid2 use section">
        @if (!$trx->isEmpty())
           
     
             <div class="row grid-full w100 space-between">
                <h4 class="grid-full use right-auto c-primary desc">Recent Transactions</h4>
                <u style="user-select:none" onclick="spa(event,'{{ url('users/transactions') }}','package',document.querySelector('footer .home'),'active')" class="cgrey use"><b>View All</b></u>
             </div>
          
      
       @foreach ($trx as $data)
            <div style="padding:0;overflow:hidden;" class="card use">
        <div style="padding:10px;" class="row space-between g5">
            <div class="svg white use box-shadow">
                {!! $data->svg !!}
                </div>
       <div class="right-auto column g5">
        <b style="font-size:0.9rem;">{{ $data->head }}</b>
        <span style="font-weight:100">Submitted {{ $data->frame }}</span>
       </div>
       <div class="badge status {{ $data->status }} use">{{ $data->status }}</div>
        </div>
          <hr>
          
          <div style="padding:10px;" class="row space-between">
            <div class="column">
                <strong class="c-primary use desc">&#8358;{{ number_format($data->amount,2) }}</strong>
                <div class="row use g5 right-auto"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#05e2ff" viewBox="0 0 256 256"><path d="M184,89.57V84c0-25.08-37.83-44-88-44S8,58.92,8,84v40c0,20.89,26.25,37.49,64,42.46V172c0,25.08,37.83,44,88,44s88-18.92,88-44V132C248,111.3,222.58,94.68,184,89.57ZM232,132c0,13.22-30.79,28-72,28-3.73,0-7.43-.13-11.08-.37C170.49,151.77,184,139,184,124V105.74C213.87,110.19,232,122.27,232,132ZM72,150.25V126.46A183.74,183.74,0,0,0,96,128a183.74,183.74,0,0,0,24-1.54v23.79A163,163,0,0,1,96,152,163,163,0,0,1,72,150.25Zm96-40.32V124c0,8.39-12.41,17.4-32,22.87V123.5C148.91,120.37,159.84,115.71,168,109.93ZM96,56c41.21,0,72,14.78,72,28s-30.79,28-72,28S24,97.22,24,84,54.79,56,96,56ZM24,124V109.93c8.16,5.78,19.09,10.44,32,13.57v23.37C36.41,141.4,24,132.39,24,124Zm64,48v-4.17c2.63.1,5.29.17,8,.17,3.88,0,7.67-.13,11.39-.35A121.92,121.92,0,0,0,120,171.41v23.46C100.41,189.4,88,180.39,88,172Zm48,26.25V174.4a179.48,179.48,0,0,0,24,1.6,183.74,183.74,0,0,0,24-1.54v23.79a165.45,165.45,0,0,1-48,0Zm64-3.38V171.5c12.91-3.13,23.84-7.79,32-13.57V172C232,180.39,219.59,189.4,200,194.87Z"></path></svg>
                    Amount</div>
            </div>
            <div class="column">
                <strong class="c-primary use desc">
                    <button onclick="spa(event,'{{ url('users/receipt?id='.$data->id.'') }}','complete')" style="clip-path:inset(0 round 10px);border-radius:10px;width:fit-content;height:fit-content;padding:10px;background:rgb(108,92,230);color:white;font-weight:900;" class="get">View Receipt</button>
                </strong>
                   </div>
          </div>
           
         
        </div>
       @endforeach


        @endif
       
        
    </section>
    </section>
    @section('popup_child')
    <div style="border-radius:50%;background:var(--primary-transparent)" class="svg use">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="rgba(108,92,230)" viewBox="0 0 256 256"><path d="M24,184H232a8,8,0,0,0,0-16h-8V152a96.12,96.12,0,0,0-88-95.66V40h16a8,8,0,0,0,0-16H104a8,8,0,0,0,0,16h16V56.34A96.12,96.12,0,0,0,32,152v16H24a8,8,0,0,0,0,16Zm24-32a80,80,0,0,1,160,0v16H48Zm192,56a8,8,0,0,1-8,8H24a8,8,0,0,1,0-16H232A8,8,0,0,1,240,208Z"></path></svg>
    </div>
        <section style="width:100%;text-align:start;padding:10px;" class="column g5 section5">
            {!! trim(nl2br($general->notification)) !!}
            <button onclick="HidePopUp(document.querySelector('.popup'),understood)" class="frutiger-button">
  <div class="inner">
    <div class="top-white"></div>
    <span style="color:rgb(108,92,230)" class="text">Understood</span>
  </div>
</button>
        </section>
    @endsection

@endsection
@section('js')
   <script class="js">
   if(sessionStorage.getItem('notified') == null){
     PopUp();
   }
    window.MyFunc=function(){
        window.understood=function(){
          sessionStorage.setItem('notified','true');
        
        }
    }
    MyFunc();
   </script>
@endsection