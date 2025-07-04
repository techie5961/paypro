@extends('layout.users.app')
@section('title')
    Live Chat
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/users/chat/message.css?v=1.4') }}">
@endsection
@section('main')
    <section class="section1">
 <section class="header g10">
        <svg class="pointer" onclick="spa(event,'{{ url('users/dashboard') }}','home')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M85.66,146.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,61.66L43.31,104ZM136,96.3V56a8,8,0,0,0-13.66-5.66l-48,48a8,8,0,0,0,0,11.32l48,48A8,8,0,0,0,136,152V112.37A88.11,88.11,0,0,1,216,200a8,8,0,0,0,16,0A104.15,104.15,0,0,0,136,96.3Z"></path></svg>
       <div class="row admin right-auto"> {!! isset($head) ? $head : '<b>New Chat</b>' !!}</div>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M128,24A104,104,0,0,0,36.18,176.88L24.83,210.93a16,16,0,0,0,20.24,20.24l34.05-11.35A104,104,0,1,0,128,24Zm32,128H96a8,8,0,0,1,0-16h64a8,8,0,0,1,0,16Zm0-32H96a8,8,0,0,1,0-16h64a8,8,0,0,1,0,16Z"></path></svg>
       </section>
  <section class="body">
    @isset($messages)
       
    @foreach ($messages as $data)
        <div id="{{ $loop->last ? 'last' : '' }}" class="messages {{ $data->sender_type == 'user'  ? 'receiver' : 'sender' }}">
       <span>{{ $data->message }}</span>
       <span class="frame">{{ $data->frame }}</span>
    </div>
    @endforeach
@endisset
   
   
    
       </section>

       <section class="footer">
        
          <input oninput="UpdateSend(this)" type="text" placeholder="Message...." class="inp message input">
       <svg onclick="SendMessage(this,'{{ url('users/post/send/message') }}','{{ csrf_token() }}'{{ isset($chat_id) ? ",'$chat_id'" : '' }})" class="send active" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M231.4,44.34s0,.1,0,.15l-58.2,191.94a15.88,15.88,0,0,1-14,11.51q-.69.06-1.38.06a15.86,15.86,0,0,1-14.42-9.15L107,164.15a4,4,0,0,1,.77-4.58l57.92-57.92a8,8,0,0,0-11.31-11.31L96.43,148.26a4,4,0,0,1-4.58.77L17.08,112.64a16,16,0,0,1,2.49-29.8l191.94-58.2.15,0A16,16,0,0,1,231.4,44.34Z"></path></svg>
       </section>


    </section>
  
@endsection
@section('js')
    <script src="{{ asset('js/users/chat/message.js?v=1.6') }}" class="js"></script>
@endsection