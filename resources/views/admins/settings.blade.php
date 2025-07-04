@extends('layout.admins.app')
@section('title')
    Site Settings
@endsection
@section('css')
    
@endsection
@section('main')
    <section class="section1 section use">
        <form action="{{ url('admins/post/finance/settings/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="form use">
           <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
            <strong class="desc use"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000080" viewBox="0 0 256 256"><path d="M239.76,158.06,217.28,68.12A16,16,0,0,0,201.75,56H136V40a16,16,0,0,0-16-16H80A16,16,0,0,0,64,40V56H54.25A16,16,0,0,0,38.72,68.12L16.24,158.06A7.93,7.93,0,0,0,16,160v32a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V160A7.93,7.93,0,0,0,239.76,158.06ZM80,40h40V56H80ZM54.25,72h147.5l20,80H34.25ZM32,192V168H224v24ZM64,96a8,8,0,0,1,8-8H88a8,8,0,0,1,0,16H72A8,8,0,0,1,64,96Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H120A8,8,0,0,1,112,96Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H168A8,8,0,0,1,160,96ZM64,128a8,8,0,0,1,8-8H88a8,8,0,0,1,0,16H72A8,8,0,0,1,64,128Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H120A8,8,0,0,1,112,128Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H168A8,8,0,0,1,160,128Z"></path></svg>Finance Settings</strong>
            <label for="">Minimum Deposit</label>
            <div class="cont use required">
                <input value="{{ $Finance->MinDeposit ?? '' }}" name="MinDeposit" placeholder="E.g 1000" step="any" type="number" class="inp input">
            </div>
             <label for="">Maximum Deposit</label>
            <div class="cont use required">
                <input value="{{ $Finance->MaxDeposit ?? '' }}" name="MaxDeposit" placeholder="E.g 20000" step="any" type="number" class="inp input">
            </div>
             <label for="">Minimum Withdrawal</label>
            <div class="cont use required">
                <input value="{{ $Finance->MinWithdrawal ?? '' }}" name="MinWithdrawal" placeholder="E.g 1000" step="any" type="number" class="inp input">
            </div>
             <label for="">Maximum Withdrawal</label>
            <div class="cont use required">
                <input value="{{ $Finance->MaxWithdrawal ?? '' }}" name="MaxWithdrawal" placeholder="E.g 50000" step="any" type="number" class="inp input">
            </div>
            <button class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Update Settings</div></button>
        </form>

        <form action="{{ url('admins/post/withdrawal/settings/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="form use">
           <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
            <strong class="desc use"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000080" viewBox="0 0 256 256"><path d="M128,56H112V16a8,8,0,0,1,16,0Zm64,67.62V72a16,16,0,0,0-16-16H128v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32l-32,32a8,8,0,0,1-11.32,0l-32-32A8,8,0,0,1,93.66,98.34L112,116.69V56H64A16,16,0,0,0,48,72V200a8,8,0,0,0,8,8h74.7c.32.67.67,1.34,1.05,2l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62Z"></path></svg>
                Withdrawal Settings</strong>
            <label for="">Withdrawal Fee (%)</label>
            <div class="cont use required">
                <input value="{{ $Withdrawal->fee }}" name="fee" placeholder="E.g 10" step="any" type="number" class="inp input">
            </div>
            <input type="hidden" value="{{ $Withdrawal->status }}" name="status" class="input withdrawal-status">
            <div class="row g5 space-between">
                <div class="column">
                    <b>Withdrawal Portal</b>
                    <span class="light dim use">Toggle on or toggle off withdrawal portal to controle when to withdraw.</span>
                </div>
            
                <div class="toggle {{ $Withdrawal->status == 'active' ? 'active' : '' }}"><div onclick="Toggle(this,document.querySelector('.withdrawal-status'))" class="child"></div></div>
            </div>
             
            <button class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Update Withdrawal Settings</div></button>
        </form>
         <form action="{{ url('admins/post/referral/settings/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="form use">
           <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
            <strong class="desc use"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="navy" viewBox="0 0 256 256"><path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path></svg>
                Referral Settings</strong>
              <label for="">Referral Mode</label>
            <div class="cont use required">
             <select onchange="UpdateLabel(this)" style="font-family:poppins" class="inp input" name="method" id="">
                <option {{ $ref->method == 'fixed' ? 'selected' : '' }} value="fixed">Fixed Commision</option>
                 <option {{ $ref->method == 'percentage' ? 'selected' : '' }} value="percentage">Percentage Based</option>
            </select> 
            </div>
                <label class="ref-label" for="">Referral Commision ({!! $ref->method == 'fixed' ? '&#8358;' : '%' !!})</label>
            <div class="cont use required">
                <input value="{{ $ref->commission }}" name="commission" placeholder="E.g 10" step="any" type="number" class="inp input">
            </div>
           
             
            <button class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Update Referral Settings</div></button>
        </form>
        <form action="{{ url('admins/post/general/settings/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="form use">
           <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
            <strong class="desc use"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000080" viewBox="0 0 256 256"><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"></path></svg>
                General Settings</strong>
              <label for="">Group Link</label>
            <div class="cont use required">
           <input value="{{ $general->group ?? '' }}" type="url" name="group" placeholder="E.g https://your-group-link.extension" class="inp input">
            </div>
                <label class="ref-label" for="">Notification Message</label>
            <div style="height:200px;" class="cont use">
              <textarea class="inp input" style="resize: none;" placeholder="Enter notification...." name="notification" >{{ $general->notification ?? '' }}</textarea>  
            </div>
           
             
            <button class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Update General Settings</div></button>
        </form>
    </section>
@endsection
@section('js')
    <script>
        function call_back(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.reload();
            }
            
        }
        function UpdateLabel(element){
              
                if(element.value == 'fixed'){
                    document.querySelector('.ref-label').innerHTML=`Referral Commission (&#8358;)`;
                    document.querySelector('input[name=commission]').placeholder=`E.g 5000`;
                } else{
                     document.querySelector('.ref-label').innerHTML=`Referral Commission (%)`;
                      document.querySelector('input[name=commission]').placeholder=`E.g 10`;
                }
            }
    </script>
@endsection