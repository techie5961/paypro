@extends('layout.admins.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admins/user.css') }}" class="css">
     <style>
        .svg.use{
            background:rgba(0,255,0,0.3);
        }
        .dim.use{
            font-size:0.7rem;
        }
          .dim.use svg{
            font-size:0.7rem;
            height:0.7rem;
            width:0.7rem;
        }
    </style>
@endsection
@section('title')
    User Details
@endsection
@section('main')
    
    <section style="word-break: normal" class="section2 section use p10">
       
               <div class="card use">
            <div class="row g5 space-between">
                <div style="position:relative;" class="photo"><span style="background-image:url('{{ asset('images/users/'.$user->photo.'') }}')"></span></div>
                <div class="column right-auto g5">
                    <div class="row">
                  <b>{{ $user->username }}</b>
                     @if ($user->type == 'promoter')
                         <svg style="font-size:1rem;width:1rem;height:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="blue" viewBox="0 0 256 256"><path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                   
                    @endif
</div>
                    <span class="dim row g5 use">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z"></path></svg>
                        {{ $user->email }}
                    </span>
                        <div style="width:fit-content;" class="status use {{ $user->status == 'active' ? 'success' : 'rejected' }} active">{{ $user->status }}</div>
                </div>
               
                <div style="width:fit-content;" class="status bottom-auto use {{ $user->LastOnline <= 5 ? 'success' : 'rejected' }} active">{{ $user->LastOnline <= 5 ? 'online' : 'offline' }}</div>
                
                
            </div>
           <div style="margin:10px 0;" class="grid g10 col-2 use">
             <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M208,48H48A24,24,0,0,0,24,72V184a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V72A24,24,0,0,0,208,48Zm-56,72a24,24,0,0,1-48,0,8,8,0,0,0-8-8H40V96H216v16H160A8,8,0,0,0,152,120ZM48,64H208a8,8,0,0,1,8,8v8H40V72A8,8,0,0,1,48,64Z"></path></svg>
                Account Balance
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;{{ number_format($user->balance,2) }}
             </b>
                </div>

                 <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M226,88.08c-.4-1-.82-2-1.25-3a87.93,87.93,0,0,0-30.17-37H216a8,8,0,0,0,0-16H112a88.12,88.12,0,0,0-87.72,81A32,32,0,0,0,0,144a8,8,0,0,0,16,0,16,16,0,0,1,8.57-14.16A87.69,87.69,0,0,0,46,178.22l12.56,35.16A16,16,0,0,0,73.64,224H86.36a16,16,0,0,0,15.07-10.62l1.92-5.38h57.3l1.92,5.38A16,16,0,0,0,177.64,224h12.72a16,16,0,0,0,15.07-10.62L221.64,168H224a24,24,0,0,0,24-24V112A24,24,0,0,0,226,88.08ZM152,72H112a8,8,0,0,1,0-16h40a8,8,0,0,1,0,16Zm28,56a12,12,0,1,1,12-12A12,12,0,0,1,180,128Z"></path></svg>
                       Total Deposit
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;{{ number_format($user->TotalDeposit,2) }}
             </b>
                </div>
                 <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208ZM16.3,98.18a8,8,0,0,1,3.51-9l104-64a8,8,0,0,1,8.38,0l104,64A8,8,0,0,1,232,104H208v64h16a8,8,0,0,1,0,16H32a8,8,0,0,1,0-16H48V104H24A8,8,0,0,1,16.3,98.18ZM144,160a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Zm-48,0a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Z"></path></svg>
                       Total Withdrawals
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;{{ number_format($user->TotalWithdrawal,2) }}
             </b>
                </div>

                 <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m9 14.25 6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185ZM9.75 9h.008v.008H9.75V9Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm4.125 4.5h.008v.008h-.008V13.5Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
</svg>

Last Deposit
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;{{ number_format($user->LastDeposit,2) }}
             </b>
                </div>
           </div>

            <div style="background:rgba(112, 128, 144, 0.2);" class="card p10 use">
             <div class="row g10">
                <div class="dim use">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M235.24,84.38l-28.06,23.68,8.56,35.39a13.34,13.34,0,0,1-5.09,13.91,13.54,13.54,0,0,1-15,.69L164,139l-31.65,19.06a13.51,13.51,0,0,1-15-.69,13.32,13.32,0,0,1-5.1-13.91l8.56-35.39L92.76,84.38a13.39,13.39,0,0,1,7.66-23.58l36.94-2.92,14.21-33.66a13.51,13.51,0,0,1,24.86,0l14.21,33.66,36.94,2.92a13.39,13.39,0,0,1,7.66,23.58ZM88.11,111.89a8,8,0,0,0-11.32,0L18.34,170.34a8,8,0,0,0,11.32,11.32l58.45-58.45A8,8,0,0,0,88.11,111.89Zm-.5,61.19L34.34,226.34a8,8,0,0,0,11.32,11.32l53.26-53.27a8,8,0,0,0-11.31-11.31Zm73-1-54.29,54.28a8,8,0,0,0,11.32,11.32l54.28-54.28a8,8,0,0,0-11.31-11.32Z"></path></svg>
                    Referred By :
                </div>
               <b style="color:#4caf50;" class="desc use">
               {{ $user->ref->username ?? 'none' }}
             </b>
             </div>
              <div class="row g10">
                <div class="dim use">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM152,160H136v16a8,8,0,0,1-16,0V160H104a8,8,0,0,1,0-16h16V128a8,8,0,0,1,16,0v16h16a8,8,0,0,1,0,16ZM48,80V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80Z"></path></svg>
                 Registered :
                </div>
               <b style="color:#4caf50;" class="desc use">
                {{ $user->frame }}
             </b>
             </div>
             <div class="row g10">
                <div class="dim use">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M230.4,219.19A8,8,0,0,1,224,232H32a8,8,0,0,1-6.4-12.8A67.88,67.88,0,0,1,53,197.51a40,40,0,1,1,53.93,0,67.42,67.42,0,0,1,21,14.29,67.42,67.42,0,0,1,21-14.29,40,40,0,1,1,53.93,0A67.85,67.85,0,0,1,230.4,219.19ZM27.2,126.4a8,8,0,0,0,11.2-1.6,52,52,0,0,1,83.2,0,8,8,0,0,0,12.8,0,52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,93.51a40,40,0,1,0-53.93,0,67.42,67.42,0,0,0-21,14.29,67.42,67.42,0,0,0-21-14.29,40,40,0,1,0-53.93,0A67.88,67.88,0,0,0,25.6,115.2,8,8,0,0,0,27.2,126.4Z"></path></svg>
                 Total Referred :
                </div>
               <b style="color:#4caf50;" class="desc use">
              {{ number_format($user->TotalRef) }}
             </b>
             </div>
              <div class="row g10">
                <div class="dim use">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M230.4,219.19A8,8,0,0,1,224,232H32a8,8,0,0,1-6.4-12.8A67.88,67.88,0,0,1,53,197.51a40,40,0,1,1,53.93,0,67.42,67.42,0,0,1,21,14.29,67.42,67.42,0,0,1,21-14.29,40,40,0,1,1,53.93,0A67.85,67.85,0,0,1,230.4,219.19ZM27.2,126.4a8,8,0,0,0,11.2-1.6,52,52,0,0,1,83.2,0,8,8,0,0,0,12.8,0,52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,93.51a40,40,0,1,0-53.93,0,67.42,67.42,0,0,0-21,14.29,67.42,67.42,0,0,0-21-14.29,40,40,0,1,0-53.93,0A67.88,67.88,0,0,0,25.6,115.2,8,8,0,0,0,27.2,126.4Z"></path></svg>
                 Total Referral Commission :
                </div>
               <b style="color:#4caf50;" class="desc use">
              &#8358;{{ number_format($user->TotalReferralCommission) }}
             </b>
             </div>
             <div class="row g10">
                <div class="dim use">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M240,208h-8V72a8,8,0,0,0-8-8H184V40a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8V96H32a8,8,0,0,0-8,8V208H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM80,176H64a8,8,0,0,1,0-16H80a8,8,0,0,1,0,16Zm0-32H64a8,8,0,0,1,0-16H80a8,8,0,0,1,0,16Zm64,64H112V168h32Zm-8-64H120a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H120a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H120a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm56,96H176a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H176a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H176a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Z"></path></svg>
                  Total Banks Linked :
                </div>
               <b style="color:#4caf50;" class="desc use">
              {{ number_format($user->TotalBanks) }}
             </b>
             </div>
              <div class="row g10">
                <div class="dim use">
             <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M232,56H24A16,16,0,0,0,8,72V200a8,8,0,0,0,16,0V184H40v16a8,8,0,0,0,16,0V184H72v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V72A16,16,0,0,0,232,56ZM208,96v48H144V96Zm-96,0v48H48V96Z"></path></svg>
                 Total Packages Purchased :
                </div>
               <b style="color:#4caf50;" class="desc use">
              {{ $user->TotalPackages }}
             </b>
             </div>
               <div class="row space-between gap10">
                <a target="_blank" href="{{ url('admins/user/login?id='.$user->id.'') }}">Login as User</a>
                <a href="{{ url('admins/user/ban?id='.$user->id.'') }}">Ban User</a>
               </div>
              <button onclick="GetRequest(event,'{{ url('admins/get/mark/as/promoter?id='.$user->id.'') }}',this,call_back)" style="width:fit-content;height:fit-content;border-radius:10px;clip-path:inset(0 round 10px);padding:10px;background:blue" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content">{{ $user->type == 'user' ? 'Mark as Promoter' : 'UnMark as Promoter' }}</div></button>
            </div>
          
        </div> 
          
    </section>
    <section class="section2 section use">
      <div style="overflow: hidden" class="card use w100">
        <div class="row head">
          <div onclick="SwitchTabs(this,document.querySelector('.credit-form'))" class="credit-head action-head active"><b>Credit User</b></div>
           <div  onclick="SwitchTabs(this,document.querySelector('.debit-form'))" class="debit-head action-head"><b style="font-weight:900;">Debit User</b></div>
        </div>
        <form action="{{ url('admins/post/credit/user') }}" method="POST" onsubmit="PostRequest(event,this,call_back)" class="form g10 column credit-form active">
         <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
          <input type="hidden" value="{{ $user->id }}" name="user_id" class="input">
          <label for="">Enter Credit Amount</label>
          <div class="cont use required">
            <input name="amount" type="number" step="any" placeholder="e.g 3000" class="inp input">
          </div>
          <button style="background:#4caf50;" class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Credit User</div></button>
        </form>
        <form action="{{ url('admins/post/debit/user') }}" method="POST" onsubmit="PostRequest(event,this,call_back)" class="form g10 column debit-form ">
            <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
              <input type="hidden" value="{{ $user->id }}" name="user_id" class="input">
          <label for="">Enter Debit Amount</label>
          <div class="cont use required">
            <input name="amount" type="number" step="any" placeholder="e.g 3000" class="inp input">
          </div>
          <button style="background: red" class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Debit User</div></button>
        </form>
      </div>
    </section>
@endsection
@section('js')
   <script class="js">
    function SwitchTabs(element,form){
      document.querySelectorAll('.action-head').forEach((head)=>{
        head.classList.remove('active');
      });
      document.querySelectorAll('.section2 .form').forEach((body)=>{
       body.classList.remove('active');
      })
      element.classList.add('active');
      form.classList.add('active');
    }
    function call_back(response){
      if(JSON.parse(response).status == 'success'){
        window.location.reload();
      }
    }
    </script> 
@endsection