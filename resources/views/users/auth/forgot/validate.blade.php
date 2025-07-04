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
        <h4 class="desc">Forgot Password</h4>
        <form action="{{ url('users/post/forgot/validate/mail/process') }}" method="POST" onsubmit="PostRequest(event,this,call_back)">
            <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
            <div class="cont required">
             <div class="icon">
                  <svg style="font-size:1rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
             </div>


                <input placeholder="username or email" type="text" class="inp input" name="id">
            </div>
             
            
           
           
           
        <button class="post"><div class="working"><div class="work"></div>working....</div><div class="content">Send OTP</div></button>
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