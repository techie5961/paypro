@extends('layout.users.auth')
@section('title')
    Forgot Password
@endsection
@section('css')
    <style class="css">
       main{
        justify-content:center;
       }
    </style>
@endsection
@section('main')
    <section class="section1">
        <img class="logo" src="{{ asset('icons/favicon.svg') }}" alt="Logo">
        <h4 class="desc">Reset Password</h4>
        <form action="{{ url('users/post/forgot/reset/password/process') }}" method="POST" onsubmit="PostRequest(event,this,call_back)">
            <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
            <input type="hidden" name="email" value="{{ $email }}" class="input">
              <input type="hidden" name="otp" value="{{ $otp }}" class="input">
            <div class="cont required">
             <div class="icon">
                 
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm40-104a40,40,0,1,0-65.94,30.44L88.68,172.77A8,8,0,0,0,96,184h64a8,8,0,0,0,7.32-11.23l-13.38-30.33A40.14,40.14,0,0,0,168,112ZM136.68,143l11,25.05H108.27l11-25.05A8,8,0,0,0,116,132.79a24,24,0,1,1,24,0A8,8,0,0,0,136.68,143Z"></path></svg>
             </div>
          <input placeholder="New Password" type="password" class="inp input" name="new">
            </div>
            <div class="cont required">
             <div class="icon">
                 
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm40-104a40,40,0,1,0-65.94,30.44L88.68,172.77A8,8,0,0,0,96,184h64a8,8,0,0,0,7.32-11.23l-13.38-30.33A40.14,40.14,0,0,0,168,112ZM136.68,143l11,25.05H108.27l11-25.05A8,8,0,0,0,116,132.79a24,24,0,1,1,24,0A8,8,0,0,0,136.68,143Z"></path></svg>
             </div>
          <input placeholder="Re-Type New Password" type="password" class="inp input" name="confirm">
            </div>
             
            
           
           
           
        <button class="post"><div class="working"><div class="work"></div>working....</div><div class="content">Change Password</div></button>
        </form>
        <div class="or"><hr><span style="white-space: nowrap">OR</span><hr></div>
        <b class="alternative">
            <span>Remember Password? <a href="{{ url('login') }}">Login</a></span>
        </b>
    </section>
@endsection
@section('js')
    <script class="js">
        function call_back(response,event){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href=data.url;
            }
        }
    </script>
@endsection