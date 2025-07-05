@extends('layout.admins.app')
@section('title')
    Manage Tasks
@endsection
@section('main')
    <section class="section1 section use grid2">
        
        @if ($tasks->isEmpty())
            @include('components.sections',[
                'null' => true
            ])
        @else
        <strong class="desc grid-full use right-auto">Manage Tasks</strong>
            @foreach ($tasks as $data)
                 <div class="card use">
            <div class="row space-between g5">
                <div style="box-shadow: 0 4px 8px rgba(0,0,0,0.2);overflow:hidden;" class="svg use">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M212,96a27.84,27.84,0,0,0-10.51,2L171,59.94A28,28,0,1,0,120,44a28.65,28.65,0,0,0,.15,2.94L73.68,66.3a28,28,0,1,0-28.6,44.83l1.85,46.38a28,28,0,1,0,32.74,41.42L128,212.47a28,28,0,1,0,49.13-18.79l27.21-42.75A28,28,0,1,0,212,96Zm-56,88-.89,0-16.18-48.53,46.65-2.22a27.94,27.94,0,0,0,5.28,9l-27.21,42.75A28,28,0,0,0,156,184ZM62.92,156.87l-1.85-46.38a28,28,0,0,0,10.12-6.13L113.72,129,72.26,161.22A28,28,0,0,0,62.92,156.87ZM149.57,72a27.8,27.8,0,0,0,8.94-2L189,108.06a27.86,27.86,0,0,0-4.18,9.22l-46.57,2.22ZM82.09,173.85,124,141.26l15.94,47.83a28.2,28.2,0,0,0-7.6,8L84,183.53A28,28,0,0,0,82.09,173.85ZM148,32a12,12,0,1,1-12,12A12,12,0,0,1,148,32ZM126.32,61.7A28.44,28.44,0,0,0,134,68.24l-11.3,47.45L79.23,90.52A28,28,0,0,0,80,84a28.65,28.65,0,0,0-.15-2.94ZM40,84A12,12,0,1,1,52,96,12,12,0,0,1,40,84ZM56,196a12,12,0,1,1,12-12A12,12,0,0,1,56,196Zm100,28a12,12,0,1,1,12-12A12,12,0,0,1,156,224Zm56-88a12,12,0,1,1,12-12A12,12,0,0,1,212,136Z"></path></svg>
                </div>
                <div class="column right-auto g5 use">
                    <b>{{ ucwords($data->title) }}</b>
                    <span class="light use">TSK-{{ $data->id }}</span>
                </div>
                <div onclick="window.open('{{ $data->link }}')" class="pkg status success badge use bottom-auto">Visit Link</div>
            </div>
            <hr>
            <div class="dim use row g5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>Updated {{ $data->frame }}</div>
            <div class="row g5">
                <b class="cgrey use">Reward: </b><span>&#8358;{{ number_format($data->reward,2) }}</span>
               
            </div>
            <div class="row g5">
                 <b class="cgrey use">Limit: </b><span>{{ number_format($data->limit) }}</span>

            </div>
              <div class="row g5">
                 <b class="cgrey use">Total Done: </b><span>{{ number_format($data->done) }}</span>

            </div>
            <b class="desc c-primary"><u>Instructions</u></b>
             <div class="row g5">
                <span>{!! trim(nl2br($data->instructions)) == '' ? 'No instructions'  : trim(nl2br($data->instructions)) !!}</span>

            </div>
          
            <hr>
           <div class="row g5">
            <button onclick="window.location.href='{{ url('admins/task/delete?id='.$data->id.'') }}'" style="width:fit-content;border-radius:10px;background:red;padding:10px;clip-path:inset(0 round 10px)" class="get"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="CurrentColor" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>Delete</button>
  
            <button onclick="window.location.href='{{ url('admins/task/edit?id='.$data->id.'') }}'" style="width:fit-content;border-radius:10px;background:#4caf50;padding:10px;clip-path:inset(0 round 10px)" class="get left-auto"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>Edit</button>
  </div> 
        </div>
            @endforeach
        @endif
       
        @include('components.sections',[
            'paginate' => true,
            'admins' => true,
            'current' => $tasks->CurrentPage(),
            'last' => $tasks->LastPage()
        ])
         
    </section>
@endsection