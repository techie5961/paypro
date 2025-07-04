@extends('layout.users.app')
@section('title')
    Withdraw
@endsection 
@section('css')
    <link rel="stylesheet" href="{{ asset('css/users/finance.css?v=').config('versions.finance_css_v') }}" class="css">
@endsection
@section('main')
   <section class="section1 fixed use">
    <section class="head use">
        <svg class="pointer" onclick="spa(event,'{{ url('users/dashboard') }}','home')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M85.66,146.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,61.66L43.31,104ZM136,96.3V56a8,8,0,0,0-13.66-5.66l-48,48a8,8,0,0,0,0,11.32l48,48A8,8,0,0,0,136,152V112.37A88.11,88.11,0,0,1,216,200a8,8,0,0,0,16,0A104.15,104.15,0,0,0,136,96.3Z"></path></svg>
        <b>Withdraw</b>
       <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M128,56H112V16a8,8,0,0,1,16,0Zm64,67.62V72a16,16,0,0,0-16-16H128v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32l-32,32a8,8,0,0,1-11.32,0l-32-32A8,8,0,0,1,93.66,98.34L112,116.69V56H64A16,16,0,0,0,48,72V200a8,8,0,0,0,8,8h74.7c.32.67.67,1.34,1.05,2l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62Z"></path></svg>
       </section>

         <section class="body use">
            <h1 style="text-align:center;padding:10px;" class="initiate-amount">&#8358;0.00</h1>
            <span class="light">&asymp; Enter Amount(MIN={{ number_format($Limits->MinWithdrawal,2) }},MAX={{ number_format($Limits->MaxWithdrawal,2) }})</span>
            <input type="hidden" class="amount-inp" name="amount">
            <input type="hidden" name="bank">
           <section class="column top-auto" style="width:100%;gap:10px;max-width:500px;">
             <button onclick="Api(this)" style="width:calc(100% - 20px);margin:0 10px" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content">Proceed</div></button>
            <section class="keyboard">
                <p><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M208,40H48A16,16,0,0,0,32,56v56c0,52.72,25.52,84.67,46.93,102.19,23.06,18.86,46,25.26,47,25.53a8,8,0,0,0,4.2,0c1-.27,23.91-6.67,47-25.53C198.48,196.67,224,164.72,224,112V56A16,16,0,0,0,208,40Zm-34.32,69.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>PayPro secure numeric keyboard</p>
                <button onclick="Keyboard(1,document.querySelector('.amount-inp'),value_written)" class="keys">1</button>
                <button onclick="Keyboard(2,document.querySelector('.amount-inp'),value_written)" class="keys">2</button>
                <button onclick="Keyboard(3,document.querySelector('.amount-inp'),value_written)" class="keys">3</button>
                <button onclick="Keyboard(4,document.querySelector('.amount-inp'),value_written)" class="keys">4</button>
                <button onclick="Keyboard(5,document.querySelector('.amount-inp'),value_written)" class="keys">5</button>
                <button onclick="Keyboard(6,document.querySelector('.amount-inp'),value_written)" class="keys">6</button>
                <button onclick="Keyboard(7,document.querySelector('.amount-inp'),value_written)" class="keys">7</button>
                <button onclick="Keyboard(8,document.querySelector('.amount-inp'),value_written)" class="keys">8</button>
                <button onclick="Keyboard(9,document.querySelector('.amount-inp'),value_written)" class="keys">9</button>
                <button onclick="Keyboard(0,document.querySelector('.amount-inp'),value_written)" class="keys">0</button>
                <button onclick="Keyboard('x',document.querySelector('.amount-inp'),value_written)" style="grid-column: span 2" class="keys"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M216,40H68.53a16.12,16.12,0,0,0-13.72,7.77L9.14,123.88a8,8,0,0,0,0,8.24l45.67,76.11h0A16.11,16.11,0,0,0,68.53,216H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM165.66,146.34a8,8,0,0,1-11.32,11.32L136,139.31l-18.35,18.35a8,8,0,0,1-11.31-11.32L124.69,128l-18.35-18.34a8,8,0,1,1,11.31-11.32L136,116.69l18.34-18.35a8,8,0,0,1,11.32,11.32L147.31,128Z"></path></svg></button>
            </section>
           </section>
         </section>
   </section>
@endsection 
@section('slideup_body')
    <section class="section use">
        <strong class="right-auto row g5"><svg style="height:1.5rem;width:1.5rem;font-size:1.5rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="rgb(108,92,230)" viewBox="0 0 256 256"><path d="M248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208ZM16.3,98.18a8,8,0,0,1,3.51-9l104-64a8,8,0,0,1,8.38,0l104,64A8,8,0,0,1,232,104H208v64h16a8,8,0,0,1,0,16H32a8,8,0,0,1,0-16H48V104H24A8,8,0,0,1,16.3,98.18ZM144,160a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Zm-48,0a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Z"></path></svg>Select Withdrawal Bank</strong>
        @foreach ($banks as $data)
             <div onclick="ChooseBank(this,{{ $data->id }})" style="border:1px solid silver" class="card banks use">
           <div class="row g5 space-between">
             <div class="photo use"><span style="background-image:url('{{ asset('banks/'.$data->bank->icon.'') }}')"></span></div>
             <div class="column right-auto">
                   <b>{{  $data->bank->name  }}</b>
               <span> {{ $data->json->AccountName }}</span>
             
             </div>
             <b class="c-primary use desc">{{ $data->json->AccountNumber }}</b>
            
           </div>
        </div>
        @endforeach
       
    </section>
     @section('slideup_footer')
         <section style="position:sticky;bottom:0;left:0;right:0;padding:10px;background:inherit">
            <button onclick="Withdraw(event,this)" style="background:rgb(108,92,230);color:white;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content">Withdraw Funds</div></button>
         </section>
     @endsection
@endsection
@section('js')
    <script class="js">
         window.MyFunc=function(){
  
 let min={{ $Limits->MinWithdrawal }} ?? '';
        let max={{ $Limits->MaxWithdrawal }} ?? '';
        
    window.Api=function(element){
        let inp=document.querySelector('.amount-inp');
        if(inp.value == ''){
               CreateNotify('error',`Please enter a valid amount`);
               return;
        }
        if(parseFloat(inp.value) < parseFloat(min)){
            CreateNotify('error',`Minimum Withdrawal is &#8358;${parseFloat(min).toLocaleString()}`);
            return;
        }
        if(parseFloat(inp.value) > parseFloat(max)){
            CreateNotify('error',`Maximum Withdrawal is &#8358;${parseFloat(max).toLocaleString()}`);
            return;
        }
        SlideUp();
      
        
    }

// initiated
window.initiated=function(response){
 let data=JSON.parse(response);
 CreateNotify(data.status,data.message);
 if(data.status == 'success'){
let div=document.createElement('button');
 div.onclick=function(){
 spa(event,data.url,'package',);
 }
 div.click();
 
 }
 
}
// value written
       window.value_written=function(value){
        try{
      
        if(value == ''){
 document.querySelector('.initiate-amount').innerHTML=`&#8358;0.00`;
          
        }
         else{
 document.querySelector('.initiate-amount').innerHTML=`&#8358;${parseFloat(value).toLocaleString()}.00`;
  
         }
        } catch(error){
            alert(error)
        }
        
           }
        //    choose bank
       window.ChooseBank=function(element,bank_id){
            let banks=document.querySelectorAll(".banks");
            banks.forEach((bank)=>{
                bank.style.borderColor='silver';
                bank.style.background='var(--bg-light)';
            });
            element.style.borderColor='#4caf50';
            element.style.background='rgba(0,255,0,0.1)';
            document.querySelector('input[name=bank]').value=bank_id;
        }
        //  withdraw
        window.Withdraw= function(event,element){
           try{
             let bank=document.querySelector('input[name=bank]').value;
            let amount=document.querySelector('input[name=amount]').value;
            if(bank == ''){
                CreateNotify('error','Please select withdrawal bank');
            }
             else{
                GetRequest(event,`{{ url('users/get/Withdrawal/process?amount=') }}${amount}&bank_id=${bank}`,element,initiated);
             }
           }
            catch(error){
                alert(error.stack)
            }
        }
  

       
    }
    MyFunc();
    </script>
@endsection 