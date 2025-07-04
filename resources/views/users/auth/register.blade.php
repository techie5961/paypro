@extends('layout.users.auth')
@section('title')
    Register
@endsection 
@section('main')
    <section class="section1">
        <img class="logo" src="{{ asset('icons/favicon.svg') }}" alt="Logo">
        <h4 class="desc">Get Started</h4>
        <form action="{{ url('users/post/register/process') }}" method="POST" onsubmit="PostRequest(event,this,call_back)">
            <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
            <div class="cont required">
             <div class="icon">
                  <svg style="font-size:1rem;" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>
             </div>


                <input placeholder="Full Name" type="text" class="inp input" name="name">
            </div>
              <div class="cont required">
             <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" viewBox="0 0 256 256"><path d="M128,24a104,104,0,0,0,0,208c21.51,0,44.1-6.48,60.43-17.33a8,8,0,0,0-8.86-13.33C166,210.38,146.21,216,128,216a88,88,0,1,1,88-88c0,26.45-10.88,32-20,32s-20-5.55-20-32V88a8,8,0,0,0-16,0v4.26a48,48,0,1,0,5.93,65.1c6,12,16.35,18.64,30.07,18.64,22.54,0,36-17.94,36-48A104.11,104.11,0,0,0,128,24Zm0,136a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path></svg>
             </div>


                <input placeholder="Username" type="text" class="inp input" name="username">
            </div>
             <div class="cont required">
             <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-96,85.15L52.57,64H203.43ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z"></path></svg>
                   </div>
                   


                <input placeholder="Email Address" type="email" class="inp input" name="email">
            </div>
            @isset($ref)
              
                <input type="hidden" class="input" name="ref" value="{{ $ref }}">
            </div>
            @endisset
            <div class="cont required">
             <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm40-104a40,40,0,1,0-65.94,30.44L88.68,172.77A8,8,0,0,0,96,184h64a8,8,0,0,0,7.32-11.23l-13.38-30.33A40.14,40.14,0,0,0,168,112ZM136.68,143l11,25.05H108.27l11-25.05A8,8,0,0,0,116,132.79a24,24,0,1,1,24,0A8,8,0,0,0,136.68,143Z"></path></svg>
                   </div>
                   


                <input placeholder="Password" type="password" class="inp input" name="password">
            </div>
            <div class="cont required">
             <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary)" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm40-104a40,40,0,1,0-65.94,30.44L88.68,172.77A8,8,0,0,0,96,184h64a8,8,0,0,0,7.32-11.23l-13.38-30.33A40.14,40.14,0,0,0,168,112ZM136.68,143l11,25.05H108.27l11-25.05A8,8,0,0,0,116,132.79a24,24,0,1,1,24,0A8,8,0,0,0,136.68,143Z"></path></svg>
                   </div>
                   
 

                <input placeholder="Confirm Password" type="password" class="inp input" name="confirm">
            </div>
           <label class="agree"><input required type="checkbox"><span>I agree to the <a href="terms">Terms and Conditions</a></span></label>
        <button class="post"><div class="working"><div class="work"></div>working....</div><div class="content">Create Account</div></button>
        </form>
        <div class="or"><hr><span style="white-space: nowrap">OR</span><hr></div>
        <b class="alternative">
            <span>Already Have an Account? <a href="{{ url('login') }}">Login</a></span>
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