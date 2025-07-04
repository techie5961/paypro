@extends('layout.admins.app')
@section('title')
    Notifications
@endsection
@section('main')
    <section class="section1 section grid2 use">
        @if ($notifications->isEmpty())
            @include('components.sections',[
                'null' => 'true'
            ])
        @else
         <strong class="desc use c-primary right-auto">System Notifications</strong>
        @if ($unread > 0)
           <button onclick="window.location.href='{{ url('admins/notification/get/mark/all/read') }}'" style="clip-path: inset(0 round 5px);border-radius:5px;border:1px solid #4caf50;background:white;color:#4caf50;width:fit-content;height:fit-content;padding:10px;" class="get left-auto grid-full">Mark all as Read</button>
  
        @endif
            @foreach ($notifications as $data)
                  <div class="card use">
            <div class="row g5 space-between">
                <div class="svg use">
                    {!! $data->svg !!}
                 </div>
                <div class="column right-auto">
                    <b style="font-weight:900">{{ $data->head->admin }}</b>
                    <span class="dim use row g5"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm45.66,61.66-40,40a8,8,0,0,1-11.32-11.32l40-40a8,8,0,0,1,11.32,11.32ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>
                        Submitted {{ $data->frame }}</span>
                </div>
                <div class="use status {{ $data->status->admin == 'read' ? 'success' : 'pending' }} bottom-auto">{{ $data->status->admin }}</div>
            </div>
            <hr>
           <span> {{ ucfirst($data->body->admin) }}</span>
           <button onclick="window.location.href='{{ url('admins/notification/get/mark/read?id='.$data->id.'') }}'" style="clip-path: inset(0 round 5px);border-radius:5px;border:{{ $data->status->admin == 'read' ? '1px solid rgb(108,92,230)' : '1px solid #4caf50' }};background:white;color:{{ $data->status->admin == 'read' ? 'rgb(108,92,230)' : '#4caf50' }};cursor:{{ $data->status->admin == 'read' ? 'none' : 'pointer'  }};{{ $data->status->admin == 'read' ? 'pointer-events:none;' : '' }}width:fit-content;height:fit-content;padding:10px;" class="get">{{ $data->status->admin == 'read' ? 'Marked as Read' : 'Mark as Read' }}</button>

        </div>
            @endforeach
        @endif
       
      @include('components.sections',[
        'admins' => true,
        'paginate' => true,
        'current' => $notifications->CurrentPage(),
        'last' => $notifications->LastPage()
      ])
    </section>
@endsection