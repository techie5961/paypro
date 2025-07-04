@extends('layout.users.app')
@section('title')
    Bank Accounts
@endsection
@section('main')
    <section class="section1 p10 use section">
        <form onsubmit="PostRequest(event,this,linked)" style="max-width:500px;" action="{{  url('users/post/add/bank/process') }}" method="POST" class="form use">
           <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
            <b class="desc c-primary use">Link New Bank Account</b>
            <label for="">Account Number</label>
            <div style="background:var(--bg)" class="cont required">
                <input name="AccountNumber" type="text" inputmode="numeric" minlength="10" maxlength="10" placeholder="10 digit account number" class="inp input">
            </div>
             <label for="">Select Bank</label>
            <div onclick="SlideUp()" style="background:var(--bg)" class="cont pointer required">
                <input name="BankName" type="hidden" placeholder="select bank" class="inp input">
                <div class="bank-div row g5 p10" class="p10">Select Bank....</div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 left-auto">
  <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
</svg>

            </div>
             <label for="">Account Name</label>
            <div style="background:var(--bg)" class="cont required">
                <input name="AccountName" type="text" placeholder="E.g {{ Auth::guard('users')->user()->name }}" class="inp input">
            </div>
            <button class="post" style="background:rgb(108,92,230);color:white;"><div class="working"><div class="work"></div>Working....</div><div class="content">Add Bank</div></button>
        </form>
    </section>
   @if (!$banks->isEmpty())
        <section class="section2 section p10 use grid2">
        <strong class="desc use grid-full c-primary">Linked Bank Accounts</strong>
       @foreach ($banks as $data)
             <div style="padding:0;overflow:hidden;" class="card use">
        <div style="padding:10px;" class="row space-between g5">
           <div style="background:#4caf50;border-radius:10px;min-height:50px;min-width:50px;max-height:50px;max-width:50px;display:flex;align-items:center;justify-content:center;" class="photo"><span style="background-image:url('{{ asset('banks/'.$data->bank.'') }}')"></span></div> 
            <div class="right-auto column g5">
        <b style="font-size:0.9rem;">{{ $data->uniqid }}</b>
        <span style="font-weight:100">Linked {{ $data->frame }}</span>
       </div>
          </div>
          <hr>
          <div style="padding:10px;" class="row space-between">
            <div class="column">
                <strong class="c-primary use desc">{{ ucwords($data->json->BankName) }}</strong>
                <div class="row use g5">
                    <svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary-light)" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>
                      Bank Name</div>
            </div>
            <div class="column" style="align-items:flex-end">
                <strong style="width:100%;text-align:end" class="c-primary use left-auto desc">{{ $data->json->AccountNumber }}</strong>
                <div style="width:100%;text-align:end;" class="row left-auto use g5"><svg class="left-auto" style="align-self:flex-end;1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M224,88H175.4l8.47-46.57a8,8,0,0,0-15.74-2.86l-9,49.43H111.4l8.47-46.57a8,8,0,0,0-15.74-2.86L95.14,88H48a8,8,0,0,0,0,16H92.23L83.5,152H32a8,8,0,0,0,0,16H80.6l-8.47,46.57a8,8,0,0,0,6.44,9.3A7.79,7.79,0,0,0,80,224a8,8,0,0,0,7.86-6.57l9-49.43H144.6l-8.47,46.57a8,8,0,0,0,6.44,9.3A7.79,7.79,0,0,0,144,224a8,8,0,0,0,7.86-6.57l9-49.43H208a8,8,0,0,0,0-16H163.77l8.73-48H224a8,8,0,0,0,0-16Zm-76.5,64H99.77l8.73-48h47.73Z"></path></svg>
                  Account Number</div>
            </div>
            
          </div>
            <div style="padding:10px;" class="row space-between">
            <div class="column">
                <strong class="c-primary use desc">{{ ucwords($data->json->AccountName) }}</strong>
                <div class="row use g5 right-auto">
                    <svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffa305" viewBox="0 0 256 256"><path d="M200,112a8,8,0,0,1-8,8H152a8,8,0,0,1,0-16h40A8,8,0,0,1,200,112Zm-8,24H152a8,8,0,0,0,0,16h40a8,8,0,0,0,0-16Zm40-80V200a16,16,0,0,1-16,16H40a16,16,0,0,1-16-16V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56ZM216,200V56H40V200H216Zm-80.26-34a8,8,0,1,1-15.5,4c-2.63-10.26-13.06-18-24.25-18s-21.61,7.74-24.25,18a8,8,0,1,1-15.5-4,39.84,39.84,0,0,1,17.19-23.34,32,32,0,1,1,45.12,0A39.76,39.76,0,0,1,135.75,166ZM96,136a16,16,0,1,0-16-16A16,16,0,0,0,96,136Z"></path></svg>
                    Account Name</div>
            </div>
            
          </div>
          <hr>
          <button onclick="GetRequest(event,'{{ url('users/get/bank/delete?id='.$data->id.'') }}',this,deleted)" style="clip-path:inset(0 round 10px);border-radius:10px;background:red;color:white;margin:10px 10px 10px auto;width:fit-content;height:fit-content;padding:10px;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content row g5"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" style="width:1rem;height:1rem;font-size:1rem;" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>Delete</div></button>
        </div>
       @endforeach
    </section>
   @endif
@endsection
@section('slideup_body')
    <div class="card use">
       @foreach (Banks() as $key=>$data)
            <div onclick="ChooseBank('{{ $key }}','{{ $data->name }}')" style="cursor:pointer" class="row space-between g5 p10">
            <div class="photo"><span style="background-image:url('{{ asset('banks/'.$data->icon.'') }}')"></span></div>
            <span class="right-auto">{{ $data->name }}</span>
            <svg style="width:1rem;height:1rem;font-size:1rem;"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
</svg>

        </div>
       @endforeach
        
        
    </div>
@endsection
@section('js')
    <script class="js">
      window.myFunc=function(){
        window.ChooseBank=function(key,name){
        document.querySelector(".bank-div").innerHTML=`${name}`;
        document.querySelector('input[name=BankName]').value=key;
        HideSlideUp(document.querySelector('.slideup'));
       } 
       window.linked=function(response,event){
        let data=JSON.parse(response);
        if(data.status == 'success'){
            spa(event,data.url,'package');
        }
       }
       window.deleted=function(response,event){
        let data=JSON.parse(response);
        CreateNotify(data.status,data.message);
        if(data.status == 'success'){
            spa(event,data.url,'package');
        }
       }
      }
      myFunc()
    </script>
@endsection