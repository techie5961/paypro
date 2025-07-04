@extends('layout.admins.auth')
@section('title')
    Login
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admins/auth.css?v=1.1') }}" class="css">
@endsection
@section('main')
    <section class="bubbles">
        <span></span>
         <span></span>
          <span></span>
           <span></span>
            <span></span>
             <span></span>
    </section>
    <section class="section1">
        <img style="width:150px;" src="{{ asset('icons/favicon.svg') }}" alt="Logo">
        <h4>Admin Login</h4>
        <form onsubmit="PostRequest(event,this,call_back)" action="{{ url('admins/post/login/process') }}" method="POST">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
            <div class="cont required">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M112,120a16,16,0,1,1-16-16A16,16,0,0,1,112,120ZM232,56V200a16,16,0,0,1-16,16H40a16,16,0,0,1-16-16V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56ZM135.75,166a39.76,39.76,0,0,0-17.19-23.34,32,32,0,1,0-45.12,0A39.84,39.84,0,0,0,56.25,166a8,8,0,0,0,15.5,4c2.64-10.25,13.06-18,24.25-18s21.62,7.73,24.25,18a8,8,0,1,0,15.5-4ZM200,144a8,8,0,0,0-8-8H152a8,8,0,0,0,0,16h40A8,8,0,0,0,200,144Zm0-32a8,8,0,0,0-8-8H152a8,8,0,0,0,0,16h40A8,8,0,0,0,200,112Z"></path></svg>
                <input placeholder="Admin Tag" type="text" name="tag" class="inp input">
            </div>
             <div class="cont required">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#800080" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm29.52,146.39a4,4,0,0,1-3.66,5.61H102.14a4,4,0,0,1-3.66-5.61L112,139.72a32,32,0,1,1,32,0Z"></path></svg>
                <input name="password" placeholder="Password" type="password" class="inp input">
            </div>
            <button class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Login Safely</div></button>
        </form>
    </section>
@endsection
@section('js')
    <script>
        function call_back(response){
            
        let data=JSON.parse(response);
        if(data.status == 'success'){
            window.location.href=data.url;
        }
        }
    </script>
@endsection