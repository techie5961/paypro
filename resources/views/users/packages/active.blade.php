
@extends('layout.users.app')
@section('title')
   Active Packages
@endsection
@section('main')
    <section class="section1 gp p10 grid2 section use">
        <strong class="desc use right-auto grid-full">Active Packages</strong>
        @if ($purchased->isEmpty())
            
        @else
        
            @foreach ($purchased as $data)
           
                 <div style="padding:0;overflow:hidden;" class="card use">
        <div style="padding:10px;" class="row space-between g5">
            <div style="background:{{ $data->svg->background }}" class="svg use box-shadow">{!! $data->svg->icon !!}</div>
       <div class="right-auto column g5">
        <b style="font-size:0.9rem;">{{ ucwords($data->pkg->name) }}</b>
        <span style="font-weight:100">{{ $data->daily }} NGN/DAY</span>
       </div>
       <div class="loader"></div>
        </div>
          <hr>
          <div style="padding:10px;" class="row space-between">
            <div class="column">
                <strong class="c-primary use desc">&#8358;{{ $data->daily }}</strong>
                <div class="row use g5"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4caf50" viewBox="0 0 256 256"><path d="M240,56v64a8,8,0,0,1-16,0V75.31l-82.34,82.35a8,8,0,0,1-11.32,0L96,123.31,29.66,189.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0L136,140.69,212.69,64H168a8,8,0,0,1,0-16h64A8,8,0,0,1,240,56Z"></path></svg>Daily Earnings/Interest</div>
            </div>
            <div class="column">
                <strong class="c-primary use desc">{{ $data->expires }}</strong>
                <div class="row left-auto use g5"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary-light)" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>Expires</div>
            </div>
          </div>
            <div style="padding:10px;" class="row space-between">
            <div class="column">
                <strong class="c-primary use desc">Daily</strong>
                <div class="row use g5 left-auto"><svg xmlns="http://www.w3.org/2000/svg" style="height:1rem;width:1rem;font-size:1rem;" width="16" height="16" fill="#ffa305" viewBox="0 0 256 256"><path d="M24,128A72.08,72.08,0,0,1,96,56H204.69L194.34,45.66a8,8,0,0,1,11.32-11.32l24,24a8,8,0,0,1,0,11.32l-24,24a8,8,0,0,1-11.32-11.32L204.69,72H96a56.06,56.06,0,0,0-56,56,8,8,0,0,1-16,0Zm200-8a8,8,0,0,0-8,8,56.06,56.06,0,0,1-56,56H51.31l10.35-10.34a8,8,0,0,0-11.32-11.32l-24,24a8,8,0,0,0,0,11.32l24,24a8,8,0,0,0,11.32-11.32L51.31,200H160a72.08,72.08,0,0,0,72-72A8,8,0,0,0,224,120Z"></path></svg>Payout Cycle</div>
            </div>
            <div class="column">
                <strong style="align-self:flex-end;text-align:end;width:100%" class="c-primary use desc left-auto">{{ $data->next }}</strong>
                <div class="row use g5 left-auto"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#05e2ff" viewBox="0 0 256 256"><path d="M208,48H48A24,24,0,0,0,24,72V184a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V72A24,24,0,0,0,208,48ZM40,96H216v16H160a8,8,0,0,0-8,8,24,24,0,0,1-48,0,8,8,0,0,0-8-8H40Zm8-32H208a8,8,0,0,1,8,8v8H40V72A8,8,0,0,1,48,64ZM208,192H48a8,8,0,0,1-8-8V128H88.8a40,40,0,0,0,78.4,0H216v56A8,8,0,0,1,208,192Z"></path></svg>Next Earning/Reward</div>
            </div>
          </div>
          
        </div>
            @endforeach
        @endif

       
          <section style="display: {{ $last <= 1 ? 'none' : '' }}" class="paginate grid-full">
            <a onclick="spa(event,'{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current - 1 ])) }}','package',document.querySelector('footer .package'),'active')" class="{{ $current <= 1 ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current - 1 ])) }}">&laquo;</a>
            <a>{{ $current }}</a>
            <a onclick="spa(event,'{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current + 1 ])) }}','package',document.querySelector('footer .package'),'active')" class="{{ $current >= $last ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current + 1 ])) }}">&raquo;</a>
         </section>
       
      
    </section>

@endsection
