@extends('layout.admins.app')
@section('title')
    System Logs
@endsection
@section('main')
    <section style="word-break: normal" class="section1 section use grid2 w100">
       @if ($logs->isEmpty())
           @include('components.sections',[
            'null' => true
           ])
       @else
            <strong class="desc grid-full use right-auto">System Logs</strong>
      @foreach ($logs as $data)
            <div class="card use">
            <div class="row g10 w100">
                <div class="svg use">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M141.66,133.66l-40,40a8,8,0,0,1-11.32-11.32L116.69,136H24a8,8,0,0,1,0-16h92.69L90.34,93.66a8,8,0,0,1,11.32-11.32l40,40A8,8,0,0,1,141.66,133.66ZM200,32H136a8,8,0,0,0,0,16h56V208H136a8,8,0,0,0,0,16h64a8,8,0,0,0,8-8V40A8,8,0,0,0,200,32Z"></path></svg>
                </div>
                <strong>System Log</strong>
                <span style="font-weight:100" class="light use left-auto">{{ $data->frame }}</span>
            </div>
            <div class="row space-between">
                <div class="row "><b>IP Address:</b><span> {{ $data->ip }}</span></div>
                  <div style="border-left:3px solid #4caf50; padding-left:10px;" class="row"><b>Username: </b><span>{{ $data->user->username }}</span></div>
            </div>
        </div>
      @endforeach
       @endif
       @include('components.sections',[
        'paginate' => true,
        'admins' => true,
        'last' => $logs->LastPage(),
        'current' => $logs->CurrentPage()
       ])
    </section>
@endsection