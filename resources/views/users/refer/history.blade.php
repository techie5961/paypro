@extends('layout.users.app')
@section('title')
    Referrals
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/users/refer.css?v=1.2') }}" class="css">
@endsection
@section('main')
    <section style="background:var(--bg)" class="section 1 fixed use">
 <section style="z-index: 100" class="head use">
        <svg class="pointer" onclick="spa(event,'{{ url('users/dashboard') }}','home')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M85.66,146.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,61.66L43.31,104ZM136,96.3V56a8,8,0,0,0-13.66-5.66l-48,48a8,8,0,0,0,0,11.32l48,48A8,8,0,0,0,136,152V112.37A88.11,88.11,0,0,1,216,200a8,8,0,0,0,16,0A104.15,104.15,0,0,0,136,96.3Z"></path></svg>
        <b style="color:var(--text)" class="right-auto">My Referrals</b>
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M64.12,147.8a4,4,0,0,1-4,4.2H16a8,8,0,0,1-7.8-6.17,8.35,8.35,0,0,1,1.62-6.93A67.79,67.79,0,0,1,37,117.51a40,40,0,1,1,66.46-35.8,3.94,3.94,0,0,1-2.27,4.18A64.08,64.08,0,0,0,64,144C64,145.28,64,146.54,64.12,147.8Zm182-8.91A67.76,67.76,0,0,0,219,117.51a40,40,0,1,0-66.46-35.8,3.94,3.94,0,0,0,2.27,4.18A64.08,64.08,0,0,1,192,144c0,1.28,0,2.54-.12,3.8a4,4,0,0,0,4,4.2H240a8,8,0,0,0,7.8-6.17A8.33,8.33,0,0,0,246.17,138.89Zm-89,43.18a48,48,0,1,0-58.37,0A72.13,72.13,0,0,0,65.07,212,8,8,0,0,0,72,224H184a8,8,0,0,0,6.93-12A72.15,72.15,0,0,0,157.19,182.07Z"></path></svg>
      </section>

         <section class="body use">
       <section class="w100 p10 section use grid2 column g10">
      @if ($ref->isEmpty())
          @include('components.sections',[
            'null' => 'true'
          ])
      @else
      <strong class="desc use grid-full c-primary">Referral Tree</strong>
           @foreach ($ref as $data)
                <div class="card use">
            <div class="row g10">
                <div class="photo"><span style="background-image:url('{{ asset('images/users/'.$data->photo.'') }}')"></span></div>
                <div class="column">
                    <b class="desc use">{{ $data->username }}</b>
                    <span class="light">Joined {{ $data->frame }}</span>
                </div>
                <div class="badge left-auto bottom-auto {{ $data->status == 'active' ? 'success' : 'rejected' }} use status">{{ $data->status }}</div>
            </div>
            <hr>
            <div class="row space-between">
                <div class="column">
                    <strong class="desc use c-primary">&#8358;{{ number_format($data->purchased) }}</strong>
                 <div class="row use g5">
                    <svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V72H40V56Zm0,144H40V88H216V200Zm-40-88a48,48,0,0,1-96,0,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0Z"></path></svg>
                    Total Purchase</div>

                </div>
                <div class="column">
                    <strong style="width:100%;text-align:end;" class="desc left-auto use c-primary">&#8358;{{ number_format($data->commission,2) }}</strong>
                 <div class="row use g5">
                     <svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="aqua" viewBox="0 0 256 256"><path d="M208,48H48A24,24,0,0,0,24,72V184a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V72A24,24,0,0,0,208,48ZM40,96H216v16H160a8,8,0,0,0-8,8,24,24,0,0,1-48,0,8,8,0,0,0-8-8H40Zm8-32H208a8,8,0,0,1,8,8v8H40V72A8,8,0,0,1,48,64ZM208,192H48a8,8,0,0,1-8-8V128H88.8a40,40,0,0,0,78.4,0H216v56A8,8,0,0,1,208,192Z"></path></svg>
                    Total Commission</div>

                </div>
            </div>
        </div>
           @endforeach
      @endif
   

         <section style="display: {{ $last <= 1 ? 'none' : '' }}" class="paginate grid-full">
            <a onclick="spa(event,'{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current - 1 ])) }}','package',document.querySelector('footer .home'),'active')" class="{{ $current <= 1 ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current - 1 ])) }}">&laquo;</a>
            <a>{{ $current }}</a>
            <a onclick="spa(event,'{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current + 1 ])) }}','package',document.querySelector('footer .home'),'active')" class="{{ $current >= $last ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current + 1 ])) }}">&raquo;</a>
         </section>
       </section>
         </section>

    </section>
@endsection