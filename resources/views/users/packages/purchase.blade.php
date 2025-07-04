@extends('layout.users.app')
@section('title')
    Packages
@endsection
@section('main')
    <section class="section1 gp p10 grid2 section use">
        @if ($pkgs->isEmpty())
            @include('components.sections',[
                'null' => true
            ])
        @else
            <strong class="desc use right-auto grid-full">Available Packages</strong>
            @foreach ($pkgs as $data)
                <div style="padding:0;overflow:hidden;" class="card use">
        <div style="padding:10px;" class="row space-between g5">
            <div style="background:{{ $data->svg->background }}" class="svg use box-shadow">{!! $data->svg->icon !!}</div>
       <div class="right-auto column g5">
        <b style="font-size:0.9rem;">{{ ucfirst($data->name) }}</b>
        <span style="font-weight:100">{{ $data->daily }} NGN/DAY</span>
       </div>
       <div style="background:{{ $data->badge->background }};color:{{ $data->badge->color }};" class="pkg badge use bottom-auto">{{ $data->badge->name }}</div>
        </div>
          <hr>
          <div style="padding:10px;" class="row space-between">
            <div class="column">
                <strong class="c-primary use desc">&#8358;{{ $data->daily }}</strong>
                <div class="row use g5"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4caf50" viewBox="0 0 256 256"><path d="M240,56v64a8,8,0,0,1-16,0V75.31l-82.34,82.35a8,8,0,0,1-11.32,0L96,123.31,29.66,189.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0L136,140.69,212.69,64H168a8,8,0,0,1,0-16h64A8,8,0,0,1,240,56Z"></path></svg>Daily Earnings/Interest</div>
            </div>
            <div class="column">
                <strong class="c-primary use desc">{{ number_format($data->validity) }} days</strong>
                <div class="row use g5"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary-light)" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>Lifespan</div>
            </div>
          </div>
            <div style="padding:10px;" class="row space-between">
            <div class="column">
                <strong class="c-primary use desc">Daily</strong>
                <div class="row use g5 left-auto"><svg xmlns="http://www.w3.org/2000/svg" style="height:1rem;width:1rem;font-size:1rem;" width="16" height="16" fill="#ffa305" viewBox="0 0 256 256"><path d="M24,128A72.08,72.08,0,0,1,96,56H204.69L194.34,45.66a8,8,0,0,1,11.32-11.32l24,24a8,8,0,0,1,0,11.32l-24,24a8,8,0,0,1-11.32-11.32L204.69,72H96a56.06,56.06,0,0,0-56,56,8,8,0,0,1-16,0Zm200-8a8,8,0,0,0-8,8,56.06,56.06,0,0,1-56,56H51.31l10.35-10.34a8,8,0,0,0-11.32-11.32l-24,24a8,8,0,0,0,0,11.32l24,24a8,8,0,0,0,11.32-11.32L51.31,200H160a72.08,72.08,0,0,0,72-72A8,8,0,0,0,224,120Z"></path></svg>Payout Cycle</div>
            </div>
            <div class="column">
                <strong class="c-primary use desc">&#8358;{{ $data->cost }}</strong>
                <div class="row use g5 left-auto"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#05e2ff" viewBox="0 0 256 256"><path d="M184,89.57V84c0-25.08-37.83-44-88-44S8,58.92,8,84v40c0,20.89,26.25,37.49,64,42.46V172c0,25.08,37.83,44,88,44s88-18.92,88-44V132C248,111.3,222.58,94.68,184,89.57ZM232,132c0,13.22-30.79,28-72,28-3.73,0-7.43-.13-11.08-.37C170.49,151.77,184,139,184,124V105.74C213.87,110.19,232,122.27,232,132ZM72,150.25V126.46A183.74,183.74,0,0,0,96,128a183.74,183.74,0,0,0,24-1.54v23.79A163,163,0,0,1,96,152,163,163,0,0,1,72,150.25Zm96-40.32V124c0,8.39-12.41,17.4-32,22.87V123.5C148.91,120.37,159.84,115.71,168,109.93ZM96,56c41.21,0,72,14.78,72,28s-30.79,28-72,28S24,97.22,24,84,54.79,56,96,56ZM24,124V109.93c8.16,5.78,19.09,10.44,32,13.57v23.37C36.41,141.4,24,132.39,24,124Zm64,48v-4.17c2.63.1,5.29.17,8,.17,3.88,0,7.67-.13,11.39-.35A121.92,121.92,0,0,0,120,171.41v23.46C100.41,189.4,88,180.39,88,172Zm48,26.25V174.4a179.48,179.48,0,0,0,24,1.6,183.74,183.74,0,0,0,24-1.54v23.79a165.45,165.45,0,0,1-48,0Zm64-3.38V171.5c12.91-3.13,23.84-7.79,32-13.57V172C232,180.39,219.59,189.4,200,194.87Z"></path></svg>Cost</div>
            </div>
          </div>
          <div style="background:var(--primary-transparent)" class="column">
            <div class="progress use"><span class="child"></span></div>
            <div style="border:1px solid var(--bg-light);border-radius:0 0 10px 10px;" class="row space-between p10">
                <b class="desc use c-primary">&#8358;{{ $data->cost }}</b>
            <button onclick="GetRequest(event,'{{ url('users/get/purchase/package/process?id='.$data->id.'') }}',this,call_back)" style="border:1px solid var(--bg-light);width:fit-content;clip-path:inset(0 round 10px);border-radius:10px;height:fit-content;padding:10px 20px;background:linear-gradient(to right,var(--primary-light),var(--blue));font-weight:900;color:white;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content row g5"><svg  style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 256 256"><path d="M104,216a16,16,0,1,1-16-16A16,16,0,0,1,104,216Zm88-16a16,16,0,1,0,16,16A16,16,0,0,0,192,200ZM239.71,74.14l-25.64,92.28A24.06,24.06,0,0,1,191,184H92.16A24.06,24.06,0,0,1,69,166.42L33.92,40H16a8,8,0,0,1,0-16H40a8,8,0,0,1,7.71,5.86L57.19,64H232a8,8,0,0,1,7.71,10.14ZM221.47,80H61.64l22.81,82.14A8,8,0,0,0,92.16,168H191a8,8,0,0,0,7.71-5.86Z"></path></svg>Purchase</div></button>
            
            </div>
          </div>
        </div>
            @endforeach
        @endif
        
        

       
      
    </section>

@endsection

@section('js')
    <script class="js">
      window.MyFunc=function(){
      window.call_back=function(response){
       SlideUp(response);
       }
       window.confirmed=function(response,event){
        let data=JSON.parse(response);
        CreateNotify(data.status,data.message);
        if(data.status == 'success'){
         spa(event,data.url,'package',document.querySelector("footer .package"),'active');
        }
       }
      }
      MyFunc();
    </script>
@endsection