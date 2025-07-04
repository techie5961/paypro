@extends('layout.users.app')
@section('title')
    Live Chat
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/users/chat/support.css?v=1.6') }}">
@endsection
@section('main')
    <section class="section1 section">
        <section class="header g10">
        <svg class="pointer" onclick="spa(event,'{{ url('users/dashboard') }}','home')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M85.66,146.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,61.66L43.31,104ZM136,96.3V56a8,8,0,0,0-13.66-5.66l-48,48a8,8,0,0,0,0,11.32l48,48A8,8,0,0,0,136,152V112.37A88.11,88.11,0,0,1,216,200a8,8,0,0,0,16,0A104.15,104.15,0,0,0,136,96.3Z"></path></svg>
       <div class="row admin right-auto"> Support Center</div>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M232,128v80a40,40,0,0,1-40,40H136a8,8,0,0,1,0-16h56a24,24,0,0,0,24-24H192a24,24,0,0,1-24-24V144a24,24,0,0,1,24-24h23.65A88,88,0,0,0,66,65.54,87.29,87.29,0,0,0,40.36,120H64a24,24,0,0,1,24,24v40a24,24,0,0,1-24,24H48a24,24,0,0,1-24-24V128A104.11,104.11,0,0,1,201.89,54.66,103.41,103.41,0,0,1,232,128Z"></path></svg>
     </section>
     <section class="body">
        <section class="highlight">
            <strong style="font-size:1.4rem">Support Center</strong>
            <span>Our team is ready to assist you with any questions or issues you might have.</span>
            <div class="row w100 g10">
                <div style="border-radius:50%;background:rgba(255,255,255,0.2)" class="svg use">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm56,112H128a8,8,0,0,1-8-8V72a8,8,0,0,1,16,0v48h48a8,8,0,0,1,0,16Z"></path></svg>
                </div>
                 <div class="column">
                <strong class="desc use">Working Hours</strong>
                <span>Monday - Friday ,9AM - 6PM WAT</span>
            </div>
            </div>
             <div class="row w100 g10">
                <div style="border-radius:50%;background:rgba(255,255,255,0.2)" class="svg use">
                   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                        </div>
                 <div class="column">
                <strong class="desc use">Activity</strong>
                <span>24/7 Emergency support</span>
            </div>
            </div>
             <div class="row w100 g10">
                <div style="border-radius:50%;background:rgba(255,255,255,0.2)" class="svg use">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,168a12,12,0,1,1,12-12A12,12,0,0,1,128,192Zm8-48.72V144a8,8,0,0,1-16,0v-8a8,8,0,0,1,8-8c13.23,0,24-9,24-20s-10.77-20-24-20-24,9-24,20v4a8,8,0,0,1-16,0v-4c0-19.85,17.94-36,40-36s40,16.15,40,36C168,125.38,154.24,139.93,136,143.28Z"></path></svg>
                               </div>
                 <div class="column">
                <strong class="desc use">Quick Replies</strong>
                <span>Average response time: 15 minutes.</span>
            </div>
            </div>
            <div class="row w100 g10">
                <div style="border-radius:50%;background:rgba(255,255,255,0.2)" class="svg use">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM92,96a12,12,0,1,1-12,12A12,12,0,0,1,92,96Zm82.92,60c-10.29,17.79-27.39,28-46.92,28s-36.63-10.2-46.92-28a8,8,0,1,1,13.84-8c7.47,12.91,19.21,20,33.08,20s25.61-7.1,33.08-20a8,8,0,1,1,13.84,8ZM164,120a12,12,0,1,1,12-12A12,12,0,0,1,164,120Z"></path></svg>
                              </div>
                 <div class="column">
                <strong class="desc use">Customer Satisfaction</strong>
                <span>100% customer Satisfaction.</span>
            </div>
            </div>
           
        </section>
        <section class="column">
          
            <button style="width:fit-content;height:fit-content;padding:10px;background:var(--primary-light);color:white;clip-path:inset(0 round 10px);border-radius:10px;margin-left:auto;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content">Start New Chart</div></button>
        
            <div style="padding:10px 0;" class="column">
           
              @if ($chats->isEmpty())
                  
              @else
              
                  @foreach ($chats as $data)
                  
                        <div style="padding:10px 0;cursor:pointer;"  class="row g10">
                <div class="container">
                    <img src="{{ $data->photo }}" alt="Photo">

                </div>
                <div class="column">
                    <b>{{ $data->name }}</b>
                    <span>{{ $data->message }}</span>
                </div>
                <span style="font-weight:100;font-size:0.5rem;word-break: normal;" class="light left-auto">{{ $data->frame }}</span>
            </div>
                  @endforeach
              @endif
            
        </div>
        
        </section>
     </section>
    </section>
@endsection