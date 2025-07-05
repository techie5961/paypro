@extends('layout.users.app')
@section('main')
   <section class="section1 gp p10 grid2 section use">
       @if ($tasks->isEmpty())
           @include('components.sections',[
            'null' => true
           ])
       @else
            <strong class="desc use right-auto grid-full">Available Tasks</strong>
       @foreach ($tasks as $data)
            <div style="padding:0;overflow:hidden;" class="card use">
        <div style="padding:10px;" class="row space-between g5">
            <div class="svg use box-shadow"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M212,96a27.84,27.84,0,0,0-10.51,2L171,59.94A28,28,0,1,0,120,44a28.65,28.65,0,0,0,.15,2.94L73.68,66.3a28,28,0,1,0-28.6,44.83l1.85,46.38a28,28,0,1,0,32.74,41.42L128,212.47a28,28,0,1,0,49.13-18.79l27.21-42.75A28,28,0,1,0,212,96Zm-56,88-.89,0-16.18-48.53,46.65-2.22a27.94,27.94,0,0,0,5.28,9l-27.21,42.75A28,28,0,0,0,156,184ZM62.92,156.87l-1.85-46.38a28,28,0,0,0,10.12-6.13L113.72,129,72.26,161.22A28,28,0,0,0,62.92,156.87ZM149.57,72a27.8,27.8,0,0,0,8.94-2L189,108.06a27.86,27.86,0,0,0-4.18,9.22l-46.57,2.22ZM82.09,173.85,124,141.26l15.94,47.83a28.2,28.2,0,0,0-7.6,8L84,183.53A28,28,0,0,0,82.09,173.85ZM148,32a12,12,0,1,1-12,12A12,12,0,0,1,148,32ZM126.32,61.7A28.44,28.44,0,0,0,134,68.24l-11.3,47.45L79.23,90.52A28,28,0,0,0,80,84a28.65,28.65,0,0,0-.15-2.94ZM40,84A12,12,0,1,1,52,96,12,12,0,0,1,40,84ZM56,196a12,12,0,1,1,12-12A12,12,0,0,1,56,196Zm100,28a12,12,0,1,1,12-12A12,12,0,0,1,156,224Zm56-88a12,12,0,1,1,12-12A12,12,0,0,1,212,136Z"></path></svg></div>
       <div class="right-auto column g5">
        <b style="font-size:0.9rem;">{{ $data->title }}</b>
        <span style="font-weight:100">Posted by Admin</span>
       </div>
       <div style="background:rgba(0,255,0,0.3);color:green;" class="pkg badge use bottom-auto">Active</div>
        </div>
          <hr>
          
             
          <div class="column">
           
            <div style="border:1px solid var(--bg-light);border-radius:0 0 10px 10px;" class="row space-between p10">
                <b class="desc use c-primary">&#8358;{{ number_format($data->reward,2) }} Reward</b>
            <button onclick="spa(event,'{{ url('users/tasks/accept?id='.$data->id.'') }}','refer')" style="border:1px solid var(--bg-light);width:fit-content;clip-path:inset(0 round 10px);border-radius:10px;height:fit-content;padding:10px 20px;background:linear-gradient(to right,var(--primary-light),var(--blue));font-weight:900;color:white;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content row g5">Accept Task</div></button>
            
            </div>
          </div>
        </div>
       @endforeach

       @endif
       
      
    </section>
@endsection