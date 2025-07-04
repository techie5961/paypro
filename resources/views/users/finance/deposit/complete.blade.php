@extends('layout.users.app')
@section('title')
    Complete Deposit
@endsection 
@section('css')
    <link rel="stylesheet" href="{{ asset('css/users/finance.css?v=').config('versions.finance_css_v') }}" class="css">
@endsection
@section('main')
   <section class="section1 fixed use">
    <section class="head use">
        <svg class="pointer" onclick="spa(event,'{{ url('users/dashboard') }}','home')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M85.66,146.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,61.66L43.31,104ZM136,96.3V56a8,8,0,0,0-13.66-5.66l-48,48a8,8,0,0,0,0,11.32l48,48A8,8,0,0,0,136,152V112.37A88.11,88.11,0,0,1,216,200a8,8,0,0,0,16,0A104.15,104.15,0,0,0,136,96.3Z"></path></svg>
        <b>Complete Deposit</b>
       <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M238.76,51.73A8,8,0,0,0,232,48H40a8,8,0,0,0-5.66,13.66L76.69,104,34.34,146.34A8,8,0,0,0,40,160H173.62l-28.84,60.56a8,8,0,1,0,14.44,6.88l80-168A8,8,0,0,0,238.76,51.73ZM181.23,144H59.31l34.35-34.34a8,8,0,0,0,0-11.32L59.31,64h160Z"></path></svg>
         </section>

         <section class="body use">
           <div class="group">
          <div class="house">
            <img src="{{ asset('images/bank.svg') }}" alt="Bank Logo">
            <span style="color:purple" class="light">Amount to Send</span>
            <b style="font-size:1.4rem;">&#8358;{{ $amount }}</b>
            <span style="color:purple" class="light">Pay into</span>
            <div style="width:100%;" class="row space-between">
                <span>Bank Name:</span>
                <b>{{ $BankDetails->BankName }}</b>
            </div>
             <div style="width:100%;" class="row space-between">
                <span>Account Name:</span>
                <b>{{ $BankDetails->AccountName }}</b>
            </div>
            <div style="width:100%;" class="row space-between">
                <span>Account Number:</span>
                <b style="display:flex;gap:4px;">{{ $BankDetails->AccountNumber }}<svg onclick="copy({{ $BankDetails->AccountNumber }})" class="bottom-auto;pointer" style="height:1.2rem;width:1.2rem;font-size:1.2rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="pointer">
  <path d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h.375a3.75 3.75 0 0 1 3.75 3.75v1.875C13.5 8.161 14.34 9 15.375 9h1.875A3.75 3.75 0 0 1 21 12.75v3.375C21 17.16 20.16 18 19.125 18h-9.75A1.875 1.875 0 0 1 7.5 16.125V3.375Z" />
  <path d="M15 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 17.25 7.5h-1.875A.375.375 0 0 1 15 7.125V5.25ZM4.875 6H6v10.125A3.375 3.375 0 0 0 9.375 19.5H16.5v1.125c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V7.875C3 6.839 3.84 6 4.875 6Z" />
</svg>


</b>
            </div>
            <div style="width:100%;" class="row space-between">
                <span>Reference/ID:</span>
                <b>{{ $uniqid }}</b>
            </div>
          </div>
          <div class="house" style="word-break: normal;">
            <strong>Deposit Instructions</strong>
           <div class="row">
            - Make a transfer into the above account and ensure the amount matches the exact amount above (&#8358;{{ $amount }}).
           </div>
            <div class="row">
            - Click the button below to complete your deposit.
           </div>
            <div class="row">
            - Your deposit would be comfirmed and your wallet would get creditted with the amount sent.
           </div>
            <div class="row">
            - Note that bank transfer might delay at times depending on the bank your sent from.
           </div>
          </div>
          
          
           </div>
           
          </section>
          <section class="footer use">
            <button onclick="SlideUp()" class="get" style="max-width:500px;"><div class="working"><div class="work"></div>Working....</div><div class="content">I Have Paid</div></button>
   
          </section>
   </section>
  
@endsection 
@section('slideup_body')
    <form action="{{ url('users/post/deposit/confirm/'.$uniqid.'') }}" method="POST" onsubmit="PostRequest(event,this,Confirmed)" class="form use">
        <strong>Confirm Deposit</strong>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
        <label for="">Account Name</label>
          <div class="cont required">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(13,92,230)" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,80H168V56h48ZM40,56H152V200H40ZM216,200H168V136h48v64ZM180,88a12,12,0,1,1,12,12A12,12,0,0,1,180,88Zm24,80a12,12,0,1,1-12-12A12,12,0,0,1,204,168Zm-68.25-2a39.76,39.76,0,0,0-17.19-23.34,32,32,0,1,0-45.12,0A39.84,39.84,0,0,0,56.25,166a8,8,0,0,0,15.5,4c2.64-10.25,13.06-18,24.25-18s21.62,7.73,24.25,18a8,8,0,1,0,15.5-4ZM80,120a16,16,0,1,1,16,16A16,16,0,0,1,80,120Z"></path></svg>
            <input name="AccountName" placeholder="Name on account sent from" type="text" class="inp input">
        </div>
        <label for="">Bank Name</label>
         <div class="cont required">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="rgb(13,92,230)" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>
            <input name="BankName" placeholder="Name of bank sent from" type="text" class="inp input">
        </div>
        <button style="background:var(--primary-light);color:white;" class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Confirm Deposit</div></button>
    </form>
@endsection
@section('js')
   <script class="js">
   window.MyFunc = function(){
     window.Confirmed=function(response,event){
        let data=JSON.parse(response);
        if(data.status == 'success'){
            spa(event,data.url,'complete');
        }
    }
   }
   MyFunc();
   </script>
@endsection