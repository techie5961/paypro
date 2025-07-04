@extends('layout.admins.app')
@section('css')
     <style>
        .svg.use{
            background:rgba(0,255,0,0.3);
        }
        .dim.use{
            font-size:0.7rem;
        }
          .dim.use svg{
            font-size:0.7rem;
            height:0.7rem;
            width:0.7rem;
        }
    </style>
@endsection
@section('title')
    Promoters
@endsection
@section('main')
     <section class="section1 section use">
        <div class="card use">
        <div class="row" style="gap:10px;">
            <div class="svg use">
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M27.2,126.4a8,8,0,0,0,11.2-1.6,52,52,0,0,1,83.2,0,8,8,0,0,0,11.2,1.59,7.73,7.73,0,0,0,1.59-1.59h0a52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,93.51a40,40,0,1,0-53.94,0,67.27,67.27,0,0,0-21,14.31,67.27,67.27,0,0,0-21-14.31,40,40,0,1,0-53.94,0A67.88,67.88,0,0,0,25.6,115.2,8,8,0,0,0,27.2,126.4ZM176,40a24,24,0,1,1-24,24A24,24,0,0,1,176,40ZM80,40A24,24,0,1,1,56,64,24,24,0,0,1,80,40ZM203,197.51a40,40,0,1,0-53.94,0,67.27,67.27,0,0,0-21,14.31,67.27,67.27,0,0,0-21-14.31,40,40,0,1,0-53.94,0A67.88,67.88,0,0,0,25.6,219.2a8,8,0,1,0,12.8,9.6,52,52,0,0,1,83.2,0,8,8,0,0,0,11.2,1.59,7.73,7.73,0,0,0,1.59-1.59h0a52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,197.51ZM80,144a24,24,0,1,1-24,24A24,24,0,0,1,80,144Zm96,0a24,24,0,1,1-24,24A24,24,0,0,1,176,144Z"></path></svg>
            </div>
            <div style="height:100%;" class="column space-between">
                <span class="light use">Total Promoters</span>
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
                <span class="light use">New Promoters (today)</span>
                <strong class="desc use">{{ $today }}</strong>
            </div>
        </div>
        </div>
        <div class="card use">
        <div class="row" style="gap:10px;">
            <div class="svg use">
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm87.63,96H191.48A64.1,64.1,0,0,0,136,64.52V40.37A88.13,88.13,0,0,1,215.63,120ZM120,120H80.68A48.09,48.09,0,0,1,120,80.68Zm0,16v39.32A48.09,48.09,0,0,1,80.68,136Zm16,0h39.32A48.09,48.09,0,0,1,136,175.32Zm0-16V80.68A48.09,48.09,0,0,1,175.32,120ZM120,40.37V64.52A64.1,64.1,0,0,0,64.52,120H40.37A88.13,88.13,0,0,1,120,40.37ZM40.37,136H64.52A64.1,64.1,0,0,0,120,191.48v24.15A88.13,88.13,0,0,1,40.37,136ZM136,215.63V191.48A64.1,64.1,0,0,0,191.48,136h24.15A88.13,88.13,0,0,1,136,215.63Z"></path></svg>
           </div>
            <div style="height:100%;" class="column space-between">
                <span class="light use">Online Promoters</span>
                <strong class="desc use">{{ number_format($Online) }}</strong>
            </div>
        </div>
        </div>
        <div class="card search use">
            <div class="cont use">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000004" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>
                <input oninput="SearchRequest(this,'{{ url('admins/search/promoters') }}',document.querySelector('.suggestions'))" placeholder="Search by username,name or email" type="search" class="inp">
            </div>
            <div class="suggestions column g5">
         
        </div>
        </div>
    </section>
    <section style="word-break: normal" class="section2 section grid2 use p10">
        @if ($users->isEmpty())
            @include('components.sections',[
                'null' => true,

            ])
        @else
            @foreach ($users as $data)
               <div class="card use">
            <div class="row g5 space-between">
                <div style="position:relative;" class="photo"><span style="background-image:url('{{ asset('images/users/'.$data->photo.'') }}')"></span></div>
                <div class="column right-auto g5">
                   <div class="row g5">
                     <b>{{ $data->username }}</b>
                    @if ($data->type == 'promoter')
                         <svg style="font-size:1rem;width:1rem;height:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="blue" viewBox="0 0 256 256"><path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                   
                    @endif
                   </div>
                    <span class="dim row g5 use">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z"></path></svg>
                        {{ $data->email }}
                    </span>
                        <div style="width:fit-content;" class="status use {{ $data->status == 'active' ? 'success' : 'rejected' }} active">{{ $data->status }}</div>
                </div>
               
                <div style="width:fit-content;" class="status bottom-auto use {{ $data->LastOnline <= 5 ? 'success' : 'rejected' }} active">{{ $data->LastOnline <= 5 ? 'online' : 'offline' }}</div>
                
                
            </div>
           <div style="margin:10px 0;" class="grid g10 col-2 use">
             <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M208,48H48A24,24,0,0,0,24,72V184a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V72A24,24,0,0,0,208,48Zm-56,72a24,24,0,0,1-48,0,8,8,0,0,0-8-8H40V96H216v16H160A8,8,0,0,0,152,120ZM48,64H208a8,8,0,0,1,8,8v8H40V72A8,8,0,0,1,48,64Z"></path></svg>
                Account Balance
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;{{ number_format($data->balance,2) }}
             </b>
                </div>

                 <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M226,88.08c-.4-1-.82-2-1.25-3a87.93,87.93,0,0,0-30.17-37H216a8,8,0,0,0,0-16H112a88.12,88.12,0,0,0-87.72,81A32,32,0,0,0,0,144a8,8,0,0,0,16,0,16,16,0,0,1,8.57-14.16A87.69,87.69,0,0,0,46,178.22l12.56,35.16A16,16,0,0,0,73.64,224H86.36a16,16,0,0,0,15.07-10.62l1.92-5.38h57.3l1.92,5.38A16,16,0,0,0,177.64,224h12.72a16,16,0,0,0,15.07-10.62L221.64,168H224a24,24,0,0,0,24-24V112A24,24,0,0,0,226,88.08ZM152,72H112a8,8,0,0,1,0-16h40a8,8,0,0,1,0,16Zm28,56a12,12,0,1,1,12-12A12,12,0,0,1,180,128Z"></path></svg>
                       Total Deposit
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;{{ number_format($data->TotalDeposit,2) }}
             </b>
                </div>
                 <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208ZM16.3,98.18a8,8,0,0,1,3.51-9l104-64a8,8,0,0,1,8.38,0l104,64A8,8,0,0,1,232,104H208v64h16a8,8,0,0,1,0,16H32a8,8,0,0,1,0-16H48V104H24A8,8,0,0,1,16.3,98.18ZM144,160a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Zm-48,0a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Z"></path></svg>
                       Total Withdrawals
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;{{ number_format($data->TotalWithdrawal,2) }}
             </b>
                </div>

                 <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m9 14.25 6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185ZM9.75 9h.008v.008H9.75V9Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm4.125 4.5h.008v.008h-.008V13.5Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
</svg>

Last Deposit
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;{{ number_format($data->LastDeposit,2) }}
             </b>
                </div>
           </div>

            <div style="background:rgba(112, 128, 144, 0.2);" class="card p10 use">
             <div class="row g10">
                <div class="dim use">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M235.24,84.38l-28.06,23.68,8.56,35.39a13.34,13.34,0,0,1-5.09,13.91,13.54,13.54,0,0,1-15,.69L164,139l-31.65,19.06a13.51,13.51,0,0,1-15-.69,13.32,13.32,0,0,1-5.1-13.91l8.56-35.39L92.76,84.38a13.39,13.39,0,0,1,7.66-23.58l36.94-2.92,14.21-33.66a13.51,13.51,0,0,1,24.86,0l14.21,33.66,36.94,2.92a13.39,13.39,0,0,1,7.66,23.58ZM88.11,111.89a8,8,0,0,0-11.32,0L18.34,170.34a8,8,0,0,0,11.32,11.32l58.45-58.45A8,8,0,0,0,88.11,111.89Zm-.5,61.19L34.34,226.34a8,8,0,0,0,11.32,11.32l53.26-53.27a8,8,0,0,0-11.31-11.31Zm73-1-54.29,54.28a8,8,0,0,0,11.32,11.32l54.28-54.28a8,8,0,0,0-11.31-11.32Z"></path></svg>
                    Referred By :
                </div>
               <b style="color:#4caf50;" class="desc use">
               {{ $data->ref->username ?? 'none' }}
             </b>
             </div>
              <div class="row g10">
                <div class="dim use">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM152,160H136v16a8,8,0,0,1-16,0V160H104a8,8,0,0,1,0-16h16V128a8,8,0,0,1,16,0v16h16a8,8,0,0,1,0,16ZM48,80V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80Z"></path></svg>
                 Registered :
                </div>
               <b style="color:#4caf50;" class="desc use">
                {{ $data->frame }}
             </b>
             </div>
             <div class="row g10">
                <div class="dim use">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M230.4,219.19A8,8,0,0,1,224,232H32a8,8,0,0,1-6.4-12.8A67.88,67.88,0,0,1,53,197.51a40,40,0,1,1,53.93,0,67.42,67.42,0,0,1,21,14.29,67.42,67.42,0,0,1,21-14.29,40,40,0,1,1,53.93,0A67.85,67.85,0,0,1,230.4,219.19ZM27.2,126.4a8,8,0,0,0,11.2-1.6,52,52,0,0,1,83.2,0,8,8,0,0,0,12.8,0,52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,93.51a40,40,0,1,0-53.93,0,67.42,67.42,0,0,0-21,14.29,67.42,67.42,0,0,0-21-14.29,40,40,0,1,0-53.93,0A67.88,67.88,0,0,0,25.6,115.2,8,8,0,0,0,27.2,126.4Z"></path></svg>
                 Total Referred :
                </div>
               <b style="color:#4caf50;" class="desc use">
              {{ number_format($data->TotalRef) }}
             </b>
             </div>
             <div class="row g10">
                <div class="dim use">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M240,208h-8V72a8,8,0,0,0-8-8H184V40a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8V96H32a8,8,0,0,0-8,8V208H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM80,176H64a8,8,0,0,1,0-16H80a8,8,0,0,1,0,16Zm0-32H64a8,8,0,0,1,0-16H80a8,8,0,0,1,0,16Zm64,64H112V168h32Zm-8-64H120a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H120a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H120a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm56,96H176a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H176a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H176a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Z"></path></svg>
                  Total Banks Linked :
                </div>
               <b style="color:#4caf50;" class="desc use">
              {{ number_format($data->TotalBanks) }}
             </b>
             </div>
              <div class="row g10">
                <div class="dim use">
             <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M232,56H24A16,16,0,0,0,8,72V200a8,8,0,0,0,16,0V184H40v16a8,8,0,0,0,16,0V184H72v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V72A16,16,0,0,0,232,56ZM208,96v48H144V96Zm-96,0v48H48V96Z"></path></svg>
                 Total Packages Purchased :
                </div>
               <b style="color:#4caf50;" class="desc use">
              {{ $data->TotalPackages }}
             </b>
             </div>
               <a href="{{ url('admins/user?id='.$data->id.'') }}">View More....</a>
            </div>
          
        </div> 
            @endforeach
        @endif
        @include('components.sections',[
            'current' => $users->CurrentPage(),
            'last' => $users->LastPage(),
            'admins' => 'true',
            'paginate' => true
        ])
    </section>
@endsection