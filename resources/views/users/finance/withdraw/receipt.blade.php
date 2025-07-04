@extends('layout.users.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/users/finance/receipt.css?v=1.0') }}" class="css">
@endsection
@section('title')
    Transaction Receipt
@endsection
@section('main')
<style>
   
   
</style>
    <section class="section1">
        <section class="receipt">
            <strong style="font-size:1rem;">PAYPRO</strong>
            <span class="dark">Digital Earning Platform</span>
            <span class="dark">{{ $date }}</span>
            <span class="dark">Receipt #: {{ $uniqid }}</span>
            <b style="color:#ffd700;">STATUS : PENDING</b>
            <div class="line"></div>
            <div class="row"><span>Transaction Type</span><span>Withdrawal</span></div> 
            <div class="row"><span>Gateway</span><span>Bank Withdrawal</span></div>
            <div class="row"><span>Bank Name</span><span>{{ $BankName }}</span></div>
            <div class="row"><span>Account Name</span><span>{{ $AccountName }}</span></div>
              <div class="row"><span>Account Number</span><span>{{ $AccountNumber }}</span></div>

            <div class="row"><span>Referrence</span><span>{{ $uniqid }}</span></div>
            <div class="line"></div>
            <hr> 
            <div class="row"><b>Total</b><b>&#8358;{{ number_format($amount+$fee,2) }}</b></div>
           
            <div class="row"><span>Fee</span><span>&#8358;{{ number_format($fee,2) }} </span></div>
            <hr>
             <div class="row"><b>To Receive</b><b>&#8358;{{ number_format($amount,2) }}</b></div>
            <div class="barcode">{{ $uniqid }}</div>
            <span class="dark" style="text-align:center;padding:20px;">Pending withdrawals are expected to complete within 1-3 hours.</span>
            <span style="font-size:0.6rem;">{{ url('/') }}</span>
           
        </section>
         <button style="background:rgb(108,92,230);color:white;" onclick="download()" class="post download">Download Receipt</button>
         <button style="background:#000080;color:white;" onclick="spa(event,'{{ url('users/dashboard') }}','home')" class="post return">Return To Dashboard</button>
    </section>
@endsection
@section('js')
<script class="js" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script class="js">
  window.MyFunc=function(){
      window.download=async function(){
  try{
      let canvas=await html2canvas(document.querySelector(".receipt"));
    let link=document.createElement("a");
    link.href=canvas.toDataURL('image/png');
    link.download='web3mastersreceipt.png';
    link.click();
  }
   catch(error){
    alert(error)
   }
}
  }
  MyFunc()


    </script>  
@endsection