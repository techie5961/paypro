@extends('layout.admins.app')
@section('title')
    Manage packages
@endsection
@section('main')
    <section class="section1 section use grid2">
        
        @if ($packages->isEmpty())
            @include('components.sections',[
                'null' => true
            ])
        @else
        <strong class="desc grid-full use right-auto">Manage Packages</strong>
            @foreach ($packages as $data)
                 <div class="card use">
            <div class="row space-between g5">
                <div style="box-shadow: 0 4px 8px rgba(0,0,0,0.2);overflow:hidden;background:{{ $data->svg->background }}" class="svg use">{!! $data->svg->icon !!}</div>
                <div class="column right-auto g5 use">
                    <b>{{ ucwords($data->name) }}</b>
                    <span class="light use">PKG-{{ $data->id }}</span>
                </div>
                <div style="background:{{ $data->badge->background }};color:{{ $data->badge->color }};" class="pkg badge use bottom-auto">{{ $data->badge->name }}</div>
            </div>
            <hr>
            <div class="dim use row g5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>Updated {{ $data->frame }}</div>
            <div class="row g5">
                <b class="cgrey use">Cost: </b><span>&#8358;{{ number_format($data->cost,2) }}</span>
               
            </div>
            <div class="row g5">
                 <b class="cgrey use">Daily Return: </b><span>&#8358;{{ number_format($data->daily,2) }} / {{ $data->return }}%</span>

            </div>
             <div class="row g5">
                 <b class="cgrey use">Validity: </b><span>{{ $data->validity ?? '0' }} days</span>

            </div>
            <div class="row g5">
                 <b class="cgrey use">Total Purchased: </b><span>200</span>

            </div>
            <hr>
            <button onclick="window.location.href='{{ url('admins/package/edit?id='.$data->id.'') }}'" style="width:fit-content;border-radius:10px;background:#4caf50;padding:10px;clip-path:inset(0 round 10px)" class="get left-auto"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>Edit</button>
        </div>
            @endforeach
        @endif
       
        @include('components.sections',[
            'paginate' => true,
            'admins' => true,
            'current' => $packages->CurrentPage(),
            'last' => $packages->LastPage()
        ])
         
    </section>
@endsection