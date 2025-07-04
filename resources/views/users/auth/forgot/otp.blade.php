@extends('layout.users.auth')
@section('title')
    Forgot Password
@endsection
@section('css')
    <style class="css">
       main{
        justify-content:center;
       }
       .cont{
        aspect-ratio:1;
        height:auto;
       }
       .cont .inp{
        text-align:center;
       }
    </style>
@endsection
@section('main')
    <section class="section1">
        <img class="logo" src="{{ asset('icons/favicon.svg') }}" alt="Logo">
        <h4 class="desc">Forgot Password</h4>
        <form action="{{ url('users/post/forgot/validate/otp/process') }}" method="POST" onsubmit="PostRequest(event,this,call_back)">
            <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
           <input type="hidden" name="email" value="{{ $email }}" class="input">
            <div class="row w100 g10">
             <div class="cont required">
                <input maxlength="1" inputmode="numeric" placeholder="-" type="text" class="inp input" name="otp1">
            </div>
             <div class="cont required">
                <input maxlength="1" inputmode="numeric" placeholder="-" type="text" class="inp input" name="otp2">
            </div>
             <div class="cont required">
                <input maxlength="1" inputmode="numeric" placeholder="-" type="text" class="inp input" name="otp3">
            </div>
             <div class="cont required">
                <input maxlength="1" inputmode="numeric" placeholder="-" type="text" class="inp input" name="otp4">
            </div>
           </div>
             
            
           
           
           
        <button class="post"><div class="working"><div class="work"></div>working....</div><div class="content">Verify OTP</div></button>
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
      function AutoFocus() {
  try {
    let inputs = document.querySelectorAll('.cont .inp');

    inputs.forEach((input, index) => {
      input.addEventListener('input', () => {
        if (input.value !== '') {
          let nextInput = inputs[index + 1];
          if (nextInput) nextInput.focus();
        }
      });

      input.addEventListener('keydown', function(event) {
        if (event.key === 'Backspace' && input.value === '') {
          let prevInput = inputs[index - 1];
          if (prevInput) prevInput.focus();
        }
      });
    });

  } catch (error) {
    alert(error.stack);
  }
}


        AutoFocus();
    </script>
@endsection