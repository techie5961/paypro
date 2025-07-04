@extends('layout.users.app')
@section('title')
    Notifications
@endsection
@section('main')
    <section class="section1 section use grid2 p10">
        @if ($notifications->isEmpty())
            @include('components.sections',[
                'null' => true
            ])
        @else
            <strong class="desc grid-full use c-primary">Notifications</strong>
        @if ($unread > 0)
             <button onclick="GetRequest(event,'{{ url('users/get/notifications/mark/all/as/read') }}',this,call_back)" style="width:fit-content;height:fit-content;padding:10px;border-radius:5px;clip-path:inset(0 round 5px);background:inherit;border:1px solid #4caf50;color:#4caf50;" class="get grid-full left-auto"><div class="working"><div class="work"></div>Working....</div><div class="content">Mark All as Read</div></button>
       
        @endif
       @foreach ($notifications as $data)
            <div class="card use">
           <div class="row g5 w100">
             <div class="svg use">
                {!! $data->svg !!}
            </div>
            <div class="column g5">
                <b>{{ $data->head->user }}</b>
                <span class="dim use">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm45.66,61.66-40,40a8,8,0,0,1-11.32-11.32l40-40a8,8,0,0,1,11.32,11.32ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>
                    Submitted {{ $data->frame }}
                </span>
            </div>
            <div class="status {{ $data->status == 'read' ? 'success' : 'pending' }} left-auto bottom-auto use">{{ $data->status }}</div>
           </div>
           <hr>
           <span>{{ $data->body->user }}</span>
           <button onclick="GetRequest(event,'{{ url('users/get/notifications/mark/as/read?id='.$data->id.'') }}',this,call_back)" style="{{ $data->status == 'read' ? 'pointer-events:none;' : ''  }}width:fit-content;height:fit-content;padding:10px;border-radius:5px;clip-path:inset(0 round 5px);background:inherit;{{ $data->status == 'unread' ? 'border:1px solid #4caf50;color:#4caf50;' : 'border:1px solid rgb(108,92,230);color:rgb(108,92,230);' }}" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content">{{ $data->status == 'read' ? 'Marked as Read' : 'Mark as Read' }}</div></button>
        </div>
       @endforeach
 
        @endif
         <section style="display: {{ $last <= 1 ? 'none' : '' }}" class="paginate grid-full">
            <a onclick="spa(event,'{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current - 1 ])) }}','package',document.querySelector('footer .home'),'active')" class="{{ $current <= 1 ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current - 1 ])) }}">&laquo;</a>
            <a>{{ $current }}</a>
            <a onclick="spa(event,'{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current + 1 ])) }}','package',document.querySelector('footer .home'),'active')" class="{{ $current >= $last ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current + 1 ])) }}">&raquo;</a>
         </section>
        
    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc=function(){
            window.call_back=function(response,event){
                let data=JSON.parse(response);
                CreateNotify(data.status,data.message);
                if(data.status == 'success'){
                    spa(event,data.url,'package',document.querySelector('footer .home'),'active');
                }
            }
        }
        MyFunc();
    </script>
@endsection