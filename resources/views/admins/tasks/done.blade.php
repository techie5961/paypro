@extends('layout.admins.app')
@section('title')
    Done Tasks
@endsection
@section('css')
    <style>
        .svg.use{
            background:rgba(0,255,0,0.3);
        }
    </style>
@endsection
@section('main')
  
    <section class="section2 section grid2 use">
        @if ($proofs->isEmpty())
          @include('components.sections',[ 'null' => true ])

        @else
        @foreach ($proofs as $data)
            <div class="card bottom-auto use">
            <div class="row space-between g10">
                <div class="photo use"><span style="background-image:url('{{ asset('images/users/'.$data->photo.'') }}')"></span></div>
            <div class="column h100 right-auto space-between">
                <b class="row"><a href="{{ url('admins/user?id='.$data->user_id.'') }}">{{ $data->username }}</a>
                  @if (Illuminate\Support\Facades\DB::table('users')->where('id',$data->user_id)->first()->type == 'promoter')
                         <svg style="font-size:1rem;width:1rem;height:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="blue" viewBox="0 0 256 256"><path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                   
                    @endif</b>
                <span class="light">{{ $data->uniqid }}</span>
                <span class="dim row g5 use"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>Submitted {{ $data->frame }}</span>
            </div>
          
            </div>
            <hr>
            <strong class="desc use"><a target="_blank" href="{{ $data->link }}">{{ $data->head }}</a></strong>
            <strong class="cgrey"><u>Task Proof</u></strong>
            <a target="_blank" href="{{ asset('proofs/'.$data->proof.'') }}">View Proof</a>
            <div class="row space-between">
            <span class="credit use">
                creditted
            </span>
            <strong style="font-size:1.2rem;" class="font1 use cgreen">&#8358;{{ number_format($data->amount,2) }}</strong>
            
            </div>
           
        </div>
        
        @endforeach
        @endif

        
        @include('components.sections',[
            'admins' => true,
            'paginate' => true,
            'current' => $proofs->CurrentPage(),
            'last' => $proofs->LastPage()
        ])
    </section>
@endsection 
@section('js')
    <script>
        function call_back(response){
            PopUp(response);
        }
        function confirmed(response){
            
          let data=JSON.parse(response);
          CreateNotify(data.status,data.message);
          if(data.status == 'success'){
            window.location.reload();
          }
        }
    </script>
@endsection