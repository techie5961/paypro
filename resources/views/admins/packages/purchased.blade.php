@extends('layout.admins.app')
@section('title')
    Purchased Packages
@endsection
@section('main')
    <section class="section1 section use grid2">
       @if ($purchased->isEmpty())
           @include('components.sections',[
            'null' => true
           ])
       @else
            <strong class="desc grid-full right-auto use">Purchased Packages</strong>
       @foreach ($purchased as $data)
            <div class="card use">
         <div class="row g5">
            <div style="background:{{ $data->svg->background }}" class="svg use">{!! $data->svg->icon !!}</div>
         <div class="column">
            <strong>{{ $data->pkg->name }}</strong>
            <span class="dim use row g5">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>
                Purchased {{ $data->frame }}
            </span>

         </div>
         <div class="badge status use success left-auto bottom-auto">success</div>
        </div>
        <hr>
        <div class="row g5">
            <div style="height:30px;width:30px;padding:2px;" class="photo"><span style="background-image:url('{{ asset('images/users/'.$data->user->photo.'') }}')"></span></div>
        <b>{{ $data->user->username }}</b>
        </div>
         <div class="row g5">
           <b>Next Reward -</b>
         <span>{{ $data->next_reward }}</span>
        </div>
         <div class="row g5">
           <b>Package Cost -</b>
         <span>&#8358;{{ number_format($data->pkg->cost,2) }}</span>
        </div>
          <div class="row g5">
           <b>Daily Earning -</b>
         <span>&#8358;{{ number_format((($data->pkg->return*$data->pkg->cost)/100),2) }}</span>
        </div>
        </div>
       @endforeach
       @endif

        @include('components.sections',[
            'paginate' => true,
            'admins' => true,
            'current' => $purchased->CurrentPage(),
            'last' => $purchased->LastPage()
        ])
    </section>
@endsection