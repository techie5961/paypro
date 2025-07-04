@extends('layout.admins.app')
@section('title')
    Transactions
@endsection
@section('css')
    <style>
        .svg.use{
            background:rgba(0,255,0,0.3);
        }
    </style>
@endsection
@section('main')
    <section class="section1 section use">
        <div class="card use">
        <div class="row" style="gap:10px;">
            <div class="svg use">
<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="#4caf50"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-list-details"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 5h8" /><path d="M13 9h5" /><path d="M13 15h8" /><path d="M13 19h5" /><path d="M3 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /><path d="M3 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" /></svg>
            </div>
            <div style="height:100%;" class="column space-between">
                <span class="light use">Transactions</span>
                <strong class="desc use">{{ $total }}</strong>
            </div>
        </div>
        </div>
         <div class="card use">
        <div class="row" style="gap:10px;">
            <div class="svg use">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#4caf50" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>
            </div>
            <div style="height:100%;" class="column space-between">
                <span class="light use">Today`s Transactions</span>
                <strong class="desc use">{{ $today }}</strong>
            </div>
        </div>
        </div>
        <div class="card use">
        <div class="row" style="gap:10px;">
            <div class="svg use">
<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#4caf50" viewBox="0 0 256 256"><path d="M208,48H48A24,24,0,0,0,24,72V184a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V72A24,24,0,0,0,208,48ZM40,96H216v16H160a8,8,0,0,0-8,8,24,24,0,0,1-48,0,8,8,0,0,0-8-8H40Zm8-32H208a8,8,0,0,1,8,8v8H40V72A8,8,0,0,1,48,64ZM208,192H48a8,8,0,0,1-8-8V128H88.8a40,40,0,0,0,78.4,0H216v56A8,8,0,0,1,208,192Z"></path></svg>
            </div>
            <div style="height:100%;" class="column space-between">
                <span class="light use">Total Amount</span>
                <strong class="desc use">&#8358;{{ $amount }}</strong>
            </div>
        </div>
        </div>
        <div class="card search use">
            <div class="cont use">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000004" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>
                <input oninput="SearchRequest(this,'{{ url('admins/search/transactions') }}',document.querySelector('.suggestions'))" placeholder="Search by username,name or email" type="search" class="inp">
            </div>
            <div class="suggestions column g5">
         
        </div>
        </div>
    </section>
    <section class="section2 section grid2 use">
        @if ($trx->isEmpty())
          @include('components.sections',[ 'null' => true ])

        @else
        @foreach ($trx as $data)
            <div class="card bottom-auto use">
            <div class="row space-between g10">
                <div class="photo use"><span style="background-image:url('{{ asset('images/users/'.$data->photo.'') }}')"></span></div>
            <div class="column h100 space-between">
                <b class="row"><a href="{{ url('admins/user?id='.$data->user_id.'') }}">{{ $data->username }}</a>
                  @if (Illuminate\Support\Facades\DB::table('users')->where('id',$data->user_id)->first()->type == 'promoter')
                         <svg style="font-size:1rem;width:1rem;height:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="blue" viewBox="0 0 256 256"><path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                   
                    @endif</b>
                <span class="light">{{ $data->uniqid }}</span>
                <span class="dim row g5 use"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>Submitted {{ $data->frame }}</span>
            </div>
            <div class="status bottom-auto {{ $data->status }} use">{{ $data->status }}</div>
            </div>
            <hr>
            <strong class="desc use">{{ $data->head }}</strong>
            <strong class="cgrey"><u>{{ $data->desc }}</u></strong>
            <b>{{ $data->details }}</b>
            <div class="row space-between">
            <span class="credit use">
                {{ $data->class }}
            </span>
            <strong style="font-size:1.2rem;" class="font1 use cgreen">&#8358;{{ number_format($data->amount,2) }}</strong>
            
            </div>
            @if ($data->status == 'pending')
                <hr>
            <div class="row space-between g10">
               
                  <button onclick="GetRequest(event,'{{ $data->RejectURL }}',this,call_back)" style="width:fit-content;white-space:nowrap;border-radius:10px;clip-path:inset(0 round 10px);padding:10px;height:fit-content;background:red;" class="get left-auto"><div class="working"><div class="work"></div>Working....</div><div class="content">Reject</div></button>
  <button onclick="GetRequest(event,'{{ $data->ApproveURL }}',this,call_back)" style="width:fit-content;white-space:nowrap;border-radius:10px;clip-path:inset(0 round 10px);padding:10px;height:fit-content;background:#4caf50;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content">Approve</div></button>

                          </div>
            @endif
        </div>
        
        @endforeach
        @endif

        
        @include('components.sections',[
            'admins' => true,
            'paginate' => true,
            'current' => $trx->CurrentPage(),
            'last' => $trx->LastPage()
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