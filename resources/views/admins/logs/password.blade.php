@extends('layout.admins.app')
@section('title')
    Reset Password Logs
@endsection
@section('main')
    <section class="section1 use grid2 section">
      @if ($logs->isEmpty())
          @include('components.sections',[
            'null' => true
          ])
      @else
           <strong class="desc use c-primary grid-full">Reset Password Logs</strong>
      @foreach ($logs as $data)
            <div class="card use">
            <div class="row g10 space-between w100">
                <div class="photo"><span style="background-image:url('{{ asset('images/users/'.$data->photo.'') }}')"></span></div>

                <div class="column right-auto">
                    <b>{{ $data->email }}</b>
                    <span class="dim use row right-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>
                        Requested {{ $data->frame }}
                    </span>
                </div>
                <div class="badge status use bottom-auto {{ $data->status == 'active' ? 'pending' : 'success' }}">{{ $data->status == 'active' ? 'pending' : 'completed' }}</div>
            </div>
            <hr>
            <b class="desc">
                OTP CODE - {{ $data->otp }}
            </b>
        </div> 
      @endforeach
      @endif
        @include('components.sections',[
            'admins' => true,
            'paginate' => true,
            'last' => $logs->LastPage(),
            'current' => $logs->CurrentPage()
        ])
    </section>
@endsection