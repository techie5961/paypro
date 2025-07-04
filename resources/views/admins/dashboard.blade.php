@extends('layout.admins.app') 
@section('title')
   Dashboard
@endsection
@section('css')
    <style>
        .card{
            user-select: none;
        }
    </style>
@endsection
@section('main')
     <section class="section1 section use grid2">
        <div onclick="window.location.href='{{ url('admins/users') }}'" class="card use">
            <div class="row space-between">
                <div class="column">
                <div class="svg use">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 256 256"><path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path></svg>
                </div>
                <span>Total Users</span>
                
            </div>
            <strong>{{ number_format($users) }}</strong>
            </div>
        </div>
          <div onclick="window.location.href='{{ url('admins/users') }}'" class="card use">
            <div class="row space-between">
                <div class="column">
                <div style="background:blue;" class="svg use">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 256 256"><path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path></svg>
                </div>
                <span>Total Promoters</span>
                
            </div>
            <strong>{{ number_format($promoters) }}</strong>
            </div>
        </div>
         <div  onclick="window.location.href='{{ url('admins/deposits/pending') }}'" class="card use">
            <div class="row space-between">
                <div class="column">
                <div style="background:rgb(165, 141, 7)" class="svg use">
                   <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M128,35.31V128a8,8,0,0,1-16,0V35.31L93.66,53.66A8,8,0,0,1,82.34,42.34l32-32a8,8,0,0,1,11.32,0l32,32a8,8,0,0,1-11.32,11.32Zm64,88.31V96a16,16,0,0,0-16-16H160a8,8,0,0,0,0,16h16v80.4A28,28,0,0,0,131.75,210l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62ZM80,80H64A16,16,0,0,0,48,96V200a8,8,0,0,0,16,0V96H80a8,8,0,0,0,0-16Z"></path></svg>
                    </div>
                <span>Pending Deposits</span>
                
            </div>
            <strong>&#8358;{{ number_format($pending_deposits,2) }}</strong>
            </div>
        </div>
         <div onclick="window.location.href='{{ url('admins/withdrawals/pending') }}'"class="card use">
            <div class="row space-between">
                <div class="column">
                <div style="background:rgb(165, 141, 7)" class="svg use">
                   <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M232,198.65V240a8,8,0,0,1-16,0V198.65A74.84,74.84,0,0,0,192,144v58.35a8,8,0,0,1-14.69,4.38l-10.68-16.31c-.08-.12-.16-.25-.23-.38a12,12,0,0,0-20.89,11.83l22.13,33.79a8,8,0,0,1-13.39,8.76l-22.26-34-.24-.38A28,28,0,0,1,176,176.4V64H160a8,8,0,0,1,0-16h16a16,16,0,0,1,16,16v59.62A90.89,90.89,0,0,1,232,198.65ZM88,56a8,8,0,0,0-8-8H64A16,16,0,0,0,48,64V200a8,8,0,0,0,16,0V64H80A8,8,0,0,0,88,56Zm69.66,42.34a8,8,0,0,0-11.32,0L128,116.69V16a8,8,0,0,0-16,0V116.69L93.66,98.34a8,8,0,0,0-11.32,11.32l32,32a8,8,0,0,0,11.32,0l32-32A8,8,0,0,0,157.66,98.34Z"></path></svg>
                    </div>
                <span>Pending Withdrawals</span>
                
            </div>
            <strong>&#8358;{{ number_format($pending_withdrawals,2) }}</strong>
            </div>
        </div>
          <div onclick="window.location.href='{{ url('admins/deposits/success') }}'" class="card use">
            <div class="row space-between">
                <div class="column">
                <div style="background:#4caf50;" class="svg use">
                   <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M128,35.31V128a8,8,0,0,1-16,0V35.31L93.66,53.66A8,8,0,0,1,82.34,42.34l32-32a8,8,0,0,1,11.32,0l32,32a8,8,0,0,1-11.32,11.32Zm64,88.31V96a16,16,0,0,0-16-16H160a8,8,0,0,0,0,16h16v80.4A28,28,0,0,0,131.75,210l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62ZM80,80H64A16,16,0,0,0,48,96V200a8,8,0,0,0,16,0V96H80a8,8,0,0,0,0-16Z"></path></svg>
                    </div>
                <span>Successfull Deposits</span>
                
            </div>
            <strong>&#8358;{{ number_format($successfull_deposits,2) }}</strong>
            </div>
        </div>
        <div onclick="window.location.href='{{ url('admins/withdrawals/success') }}'" class="card use">
            <div class="row space-between">
                <div class="column">
                <div style="background:#4caf50" class="svg use">
                   <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M232,198.65V240a8,8,0,0,1-16,0V198.65A74.84,74.84,0,0,0,192,144v58.35a8,8,0,0,1-14.69,4.38l-10.68-16.31c-.08-.12-.16-.25-.23-.38a12,12,0,0,0-20.89,11.83l22.13,33.79a8,8,0,0,1-13.39,8.76l-22.26-34-.24-.38A28,28,0,0,1,176,176.4V64H160a8,8,0,0,1,0-16h16a16,16,0,0,1,16,16v59.62A90.89,90.89,0,0,1,232,198.65ZM88,56a8,8,0,0,0-8-8H64A16,16,0,0,0,48,64V200a8,8,0,0,0,16,0V64H80A8,8,0,0,0,88,56Zm69.66,42.34a8,8,0,0,0-11.32,0L128,116.69V16a8,8,0,0,0-16,0V116.69L93.66,98.34a8,8,0,0,0-11.32,11.32l32,32a8,8,0,0,0,11.32,0l32-32A8,8,0,0,0,157.66,98.34Z"></path></svg>
                    </div>
                <span>Successfull Withdrawals</span>
                
            </div>
            <strong>&#8358;{{ number_format($successfull_withdrawals,2) }}</strong>
            </div>
        </div>
         <div class="card use">
            <div onclick="window.location.href='{{ url('admins/deposits/rejected') }}'" class="row space-between">
                <div class="column">
                <div style="background:red;" class="svg use">
                   <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M128,35.31V128a8,8,0,0,1-16,0V35.31L93.66,53.66A8,8,0,0,1,82.34,42.34l32-32a8,8,0,0,1,11.32,0l32,32a8,8,0,0,1-11.32,11.32Zm64,88.31V96a16,16,0,0,0-16-16H160a8,8,0,0,0,0,16h16v80.4A28,28,0,0,0,131.75,210l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62ZM80,80H64A16,16,0,0,0,48,96V200a8,8,0,0,0,16,0V96H80a8,8,0,0,0,0-16Z"></path></svg>
                    </div>
                <span>Rejected Deposits</span>
                
            </div>
            <strong>&#8358;{{ number_format($rejected_deposits,2) }}</strong>
            </div>
        </div>
          <div onclick="window.location.href='{{ url('admins/withdrawals/rejected') }}'" class="card use">
            <div class="row space-between">
                <div class="column">
                <div style="background:red" class="svg use">
                   <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M232,198.65V240a8,8,0,0,1-16,0V198.65A74.84,74.84,0,0,0,192,144v58.35a8,8,0,0,1-14.69,4.38l-10.68-16.31c-.08-.12-.16-.25-.23-.38a12,12,0,0,0-20.89,11.83l22.13,33.79a8,8,0,0,1-13.39,8.76l-22.26-34-.24-.38A28,28,0,0,1,176,176.4V64H160a8,8,0,0,1,0-16h16a16,16,0,0,1,16,16v59.62A90.89,90.89,0,0,1,232,198.65ZM88,56a8,8,0,0,0-8-8H64A16,16,0,0,0,48,64V200a8,8,0,0,0,16,0V64H80A8,8,0,0,0,88,56Zm69.66,42.34a8,8,0,0,0-11.32,0L128,116.69V16a8,8,0,0,0-16,0V116.69L93.66,98.34a8,8,0,0,0-11.32,11.32l32,32a8,8,0,0,0,11.32,0l32-32A8,8,0,0,0,157.66,98.34Z"></path></svg>
                    </div>
                <span>Rejected Withdrawals</span>
                
            </div>
            <strong>&#8358;{{ number_format($rejected_withdrawals,2) }}</strong>
            </div>
        </div>
          <div onclick="window.location.href='{{ url('admins/packages/manage') }}'" class="card use">
            <div class="row space-between">
                <div class="column">
                <div style="background:rgb(1,1,41)" class="svg use">
                   <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffff" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V80A16,16,0,0,0,224,64ZM96,56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96ZM224,80v32H192v-8a8,8,0,0,0-16,0v8H80v-8a8,8,0,0,0-16,0v8H32V80Zm0,112H32V128H64v8a8,8,0,0,0,16,0v-8h96v8a8,8,0,0,0,16,0v-8h32v64Z"></path></svg>
                    </div>
                <span>Packages</span>
                
            </div>
            <strong>{{ number_format($packages) }}</strong>
            </div>
        </div>
    </section>
@endsection