@extends('layout.users.app')
@section('title')
    Profile
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/users/profile.css?v=1.2') }}" class="css">
@endsection
@section('main')
    <section class="section1 p10 section use">
       <div style="background-image:url('{{ asset('images/users/'.Auth::guard('users')->user()->photo.'') }}')" class="image">
        <div onclick="PopUp()" class="edit">
            <svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M168,136a8,8,0,0,1-8,8H136v24a8,8,0,0,1-16,0V144H96a8,8,0,0,1,0-16h24V104a8,8,0,0,1,16,0v24h24A8,8,0,0,1,168,136Zm64-56V192a24,24,0,0,1-24,24H48a24,24,0,0,1-24-24V80A24,24,0,0,1,48,56H75.72L87,39.12A16,16,0,0,1,100.28,32h55.44A16,16,0,0,1,169,39.12L180.28,56H208A24,24,0,0,1,232,80Zm-16,0a8,8,0,0,0-8-8H176a8,8,0,0,1-6.66-3.56L155.72,48H100.28L86.66,68.44A8,8,0,0,1,80,72H48a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H208a8,8,0,0,0,8-8Z"></path></svg>
        </div>
       </div>
       <b style="margin:auto;" class="desc row g5 use c-primary">{{ ucfirst(strtolower(Auth::guard('users')->user()->username)) }}
          @if (Auth::guard('users')->user()->type == 'promoter')
                         <svg style="font-size:1rem;width:1rem;height:1rem;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="blue" viewBox="0 0 256 256"><path d="M225.86,102.82c-3.77-3.94-7.67-8-9.14-11.57-1.36-3.27-1.44-8.69-1.52-13.94-.15-9.76-.31-20.82-8-28.51s-18.75-7.85-28.51-8c-5.25-.08-10.67-.16-13.94-1.52-3.56-1.47-7.63-5.37-11.57-9.14C146.28,23.51,138.44,16,128,16s-18.27,7.51-25.18,14.14c-3.94,3.77-8,7.67-11.57,9.14C88,40.64,82.56,40.72,77.31,40.8c-9.76.15-20.82.31-28.51,8S41,67.55,40.8,77.31c-.08,5.25-.16,10.67-1.52,13.94-1.47,3.56-5.37,7.63-9.14,11.57C23.51,109.72,16,117.56,16,128s7.51,18.27,14.14,25.18c3.77,3.94,7.67,8,9.14,11.57,1.36,3.27,1.44,8.69,1.52,13.94.15,9.76.31,20.82,8,28.51s18.75,7.85,28.51,8c5.25.08,10.67.16,13.94,1.52,3.56,1.47,7.63,5.37,11.57,9.14C109.72,232.49,117.56,240,128,240s18.27-7.51,25.18-14.14c3.94-3.77,8-7.67,11.57-9.14,3.27-1.36,8.69-1.44,13.94-1.52,9.76-.15,20.82-.31,28.51-8s7.85-18.75,8-28.51c.08-5.25.16-10.67,1.52-13.94,1.47-3.56,5.37-7.63,9.14-11.57C232.49,146.28,240,138.44,240,128S232.49,109.73,225.86,102.82Zm-52.2,6.84-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                   
                    @endif</b>
       <div style="box-shadow:none;" class="card g10 use">
        <u><b class="desc use">Personal Data</b></u>
        <div class="row g5 space-between">
           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#00ffb3" viewBox="0 0 256 256"><path d="M112,120a16,16,0,1,1-16-16A16,16,0,0,1,112,120ZM232,56V200a16,16,0,0,1-16,16H40a16,16,0,0,1-16-16V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56ZM135.75,166a39.76,39.76,0,0,0-17.19-23.34,32,32,0,1,0-45.12,0A39.84,39.84,0,0,0,56.25,166a8,8,0,0,0,15.5,4c2.64-10.25,13.06-18,24.25-18s21.62,7.73,24.25,18a8,8,0,1,0,15.5-4ZM200,144a8,8,0,0,0-8-8H152a8,8,0,0,0,0,16h40A8,8,0,0,0,200,144Zm0-32a8,8,0,0,0-8-8H152a8,8,0,0,0,0,16h40A8,8,0,0,0,200,112Z"></path></svg> 
       <div class="column right-auto">
        <b style="font-size:0.9rem;">Full Name</b>
       <span style="font-size:0.8rem;" class="light use">{{ strtoupper(Auth::guard('users')->user()->name) }}</span>
       </div>
        </div>
        <div class="row g5 space-between">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ff00bb" viewBox="0 0 256 256"><path d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32Zm0,176H48V168H76.69L96,187.32A15.89,15.89,0,0,0,107.31,192h41.38A15.86,15.86,0,0,0,160,187.31L179.31,168H208v40Z"></path></svg>
       <div class="column right-auto">
        <b style="font-size:0.9rem;">Email Address</b>
       <span style="font-size:0.8rem;" class="light use">{{ Auth::guard('users')->user()->email }}</span>
       </div>
        </div>
         <div class="row g5 space-between">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffea00" viewBox="0 0 256 256"><path d="M56,104a80,80,0,1,1,80,80A80.09,80.09,0,0,1,56,104Zm146.46,69.28A96,96,0,0,1,66.72,37.54,8,8,0,1,0,55.18,26.46,112,112,0,0,0,128,215.71V232H104a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16H144V215.72a111.21,111.21,0,0,0,69.54-30.9,8,8,0,1,0-11.08-11.54Z"></path></svg>
             <div class="column right-auto">
        <b style="font-size:0.9rem;">Country</b>
       <span style="font-size:0.8rem;" class="light use row g5">
        <div style="width:40px;height:20px;background:green;display:flex;flex-direction:row;align-items:center;justify-content:center;"><div style="width:100%;height:100%;"></div><div style="width:100%;height:100%;background:white"></div><div style="width:100%;height:100%;"></div></div>
        Nigeria</span>
       </div>
        </div>
       </div>

        <div style="box-shadow:none;" class="card g10 use">
       
        <div onclick="spa(event,'{{ url('users/refer') }}','refer',document.querySelector('footer .home'),'active')" class="row g5 space-between">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#0091ff" viewBox="0 0 256 256"><path d="M213.93,213.94l-17.65,4.73-10.42-38.89a40.06,40.06,0,0,0,20.77-46.14c-12.6-47-38.78-88.22-39.89-89.95a8,8,0,0,0-8.68-3.45L136.2,45.71c0-8.25-.18-13.43-.21-14.08a8,8,0,0,0-6.05-7.39l-32-8a8,8,0,0,0-8.68,3.45c-1.11,1.73-27.29,42.93-39.89,90a40.06,40.06,0,0,0,20.77,46.14L59.72,194.67l-17.65-4.73a8,8,0,0,0-4.14,15.46l48,12.86a8.23,8.23,0,0,0,2.07.27,8,8,0,0,0,2.07-15.73l-14.9-4,10.42-38.89c.81.05,1.61.08,2.41.08a40.12,40.12,0,0,0,37-24.88c1.18,6.37,2.6,12.82,4.31,19.22A40.08,40.08,0,0,0,168,184c.8,0,1.6,0,2.41-.08l10.42,38.89-14.9,4A8,8,0,0,0,168,242.53a8.23,8.23,0,0,0,2.07-.27l48-12.86a8,8,0,0,0-4.14-15.46ZM156.22,57.19c2.78,4.7,7.23,12.54,12.2,22.46L136,87.77c-.42-10-.38-18.25-.25-23.79,0-.56.05-1.12.08-1.68Zm-56.44-24,20.37,5.09c.06,4.28,0,10.67-.21,18.47-.06,1.21-.16,3.19-.23,5.84,0,1-.1,2-.16,3L86.69,57.43C92,46.67,96.84,38.16,99.78,33.19Zm85.06,10.39a8,8,0,0,1,3.58-10.74l16-8a8,8,0,1,1,7.16,14.32l-16,8a8,8,0,0,1-10.74-3.58ZM232,72a8,8,0,0,1-8,8H208a8,8,0,0,1,0-16h16A8,8,0,0,1,232,72ZM32.84,20.42a8,8,0,0,1,10.74-3.58l16,8a8,8,0,0,1-7.16,14.32l-16-8A8,8,0,0,1,32.84,20.42ZM40,72H24a8,8,0,0,1,0-16H40a8,8,0,0,1,0,16Z"></path></svg>
           <div class="column right-auto">
        <b style="font-size:0.9rem;">Refer and Earn</b>
       <span class="light use">Invite friends and earn up to &#8358;100,000.00 Bonus.</span>
       </div>
       <svg style="font-size:1rem;width:1rem;height:1rem" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M141.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L124.69,128,50.34,53.66A8,8,0,0,1,61.66,42.34l80,80A8,8,0,0,1,141.66,133.66Zm80-11.32-80-80a8,8,0,0,0-11.32,11.32L204.69,128l-74.35,74.34a8,8,0,0,0,11.32,11.32l80-80A8,8,0,0,0,221.66,122.34Z"></path></svg>
        </div>
         <div class="row g5 space-between">
         <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M187.58,144.84l-32-16a8,8,0,0,0-8,.5l-14.69,9.8a40.55,40.55,0,0,1-16-16l9.8-14.69a8,8,0,0,0,.5-8l-16-32A8,8,0,0,0,104,64a40,40,0,0,0-40,40,88.1,88.1,0,0,0,88,88,40,40,0,0,0,40-40A8,8,0,0,0,187.58,144.84ZM152,176a72.08,72.08,0,0,1-72-72A24,24,0,0,1,99.29,80.46l11.48,23L101,118a8,8,0,0,0-.73,7.51,56.47,56.47,0,0,0,30.15,30.15A8,8,0,0,0,138,155l14.61-9.74,23,11.48A24,24,0,0,1,152,176ZM128,24A104,104,0,0,0,36.18,176.88L24.83,210.93a16,16,0,0,0,20.24,20.24l34.05-11.35A104,104,0,1,0,128,24Zm0,192a87.87,87.87,0,0,1-44.06-11.81,8,8,0,0,0-6.54-.67L40,216,52.47,178.6a8,8,0,0,0-.66-6.54A88,88,0,1,1,128,216Z"></path></svg>
           
         <div  onclick="window.open('{{ $general->group }}')" class="column right-auto">
        <b style="font-size:0.9rem;">Whatsapp Community</b>
       <span class="light use">Join others on our Whatsapp Community.</span>
       </div>
       <svg style="font-size:1rem;width:1rem;height:1rem" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M141.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L124.69,128,50.34,53.66A8,8,0,0,1,61.66,42.34l80,80A8,8,0,0,1,141.66,133.66Zm80-11.32-80-80a8,8,0,0,0-11.32,11.32L204.69,128l-74.35,74.34a8,8,0,0,0,11.32,11.32l80-80A8,8,0,0,0,221.66,122.34Z"></path></svg>
        </div>
         <div   onclick="spa(event,'{{ url('users/transactions') }}','package',document.querySelector('footer .home'),'active')" class="row g5 space-between">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="rgb(108,92,230)" viewBox="0 0 256 256"><path d="M224,200h-8V40a8,8,0,0,0-8-8H152a8,8,0,0,0-8,8V80H96a8,8,0,0,0-8,8v40H48a8,8,0,0,0-8,8v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16ZM160,48h40V200H160ZM104,96h40V200H104ZM56,144H88v56H56Z"></path></svg>
            <div class="column right-auto">
        <b style="font-size:0.9rem;">Transaction History</b>
       <span class="light use">View your transactions.</span>
       </div>
       <svg style="font-size:1rem;width:1rem;height:1rem" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M141.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L124.69,128,50.34,53.66A8,8,0,0,1,61.66,42.34l80,80A8,8,0,0,1,141.66,133.66Zm80-11.32-80-80a8,8,0,0,0-11.32,11.32L204.69,128l-74.35,74.34a8,8,0,0,0,11.32,11.32l80-80A8,8,0,0,0,221.66,122.34Z"></path></svg>
        </div>
      <div onclick="SlideUp()" class="row g5 space-between">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#00ff33" viewBox="0 0 256 256"><path d="M48,56V200a8,8,0,0,1-16,0V56a8,8,0,0,1,16,0Zm92,54.5L120,117V96a8,8,0,0,0-16,0v21L84,110.5a8,8,0,0,0-5,15.22l20,6.49-12.34,17a8,8,0,1,0,12.94,9.4l12.34-17,12.34,17a8,8,0,1,0,12.94-9.4l-12.34-17,20-6.49A8,8,0,0,0,140,110.5ZM246,115.64A8,8,0,0,0,236,110.5L216,117V96a8,8,0,0,0-16,0v21l-20-6.49a8,8,0,0,0-4.95,15.22l20,6.49-12.34,17a8,8,0,1,0,12.94,9.4l12.34-17,12.34,17a8,8,0,1,0,12.94-9.4l-12.34-17,20-6.49A8,8,0,0,0,246,115.64Z"></path></svg>
            <div class="column right-auto">
        <b style="font-size:0.9rem;">Password</b>
       <span class="light use">Update your account password.</span>
       </div>
       <svg style="font-size:1rem;width:1rem;height:1rem" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M141.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L124.69,128,50.34,53.66A8,8,0,0,1,61.66,42.34l80,80A8,8,0,0,1,141.66,133.66Zm80-11.32-80-80a8,8,0,0,0-11.32,11.32L204.69,128l-74.35,74.34a8,8,0,0,0,11.32,11.32l80-80A8,8,0,0,0,221.66,122.34Z"></path></svg>
        </div>
         <div onclick="window.location.href='{{ url('users/logout') }}'" class="row g5 space-between">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ff8800" viewBox="0 0 256 256"><path d="M120,216a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V40a8,8,0,0,1,8-8h64a8,8,0,0,1,0,16H56V208h56A8,8,0,0,1,120,216Zm109.66-93.66-40-40a8,8,0,0,0-11.32,11.32L204.69,120H112a8,8,0,0,0,0,16h92.69l-26.35,26.34a8,8,0,0,0,11.32,11.32l40-40A8,8,0,0,0,229.66,122.34Z"></path></svg>
            <div class="column right-auto">
        <b style="font-size:0.9rem;">Logout</b>
       <span class="light use">Logout your account.</span>
       </div>
       <svg style="font-size:1rem;width:1rem;height:1rem" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M141.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L124.69,128,50.34,53.66A8,8,0,0,1,61.66,42.34l80,80A8,8,0,0,1,141.66,133.66Zm80-11.32-80-80a8,8,0,0,0-11.32,11.32L204.69,128l-74.35,74.34a8,8,0,0,0,11.32,11.32l80-80A8,8,0,0,0,221.66,122.34Z"></path></svg>
        </div>
       </div>
    </section>
@endsection
@section('slideup_body')
    <form action="{{ url('users/post/password/update') }}" method="POST" onsubmit="PostRequest(event,this,call_back)" class="form password-form card use">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
        <label for="">Current Password</label>
        <div class="cont required">
            <input name="current" type="password" placeholder="Enter current password" class="inp input">
        </div>
         <label for="">New Password</label>
        <div class="cont required">
            <input name="new" type="password" placeholder="Enter new password" class="inp input">
        </div>
         <label for="">Confirm New Password</label>
        <div class="cont required">
            <input name="confirm" type="password" placeholder="Re-type new password" class="inp input">
        </div>
        <button style="color:white;background:rgba(108,92,230)" class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Update Password</div></button>
    </form>
@endsection
@section('popup_child')
    <form onsubmit="PostRequest(event,this,updated)" action="{{ url('users/post/upload/profile/photo/process') }}" method="POST" enctype="multipart/form-data"  class="form g10 w100 column">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
        <label class="column upload" for="pix">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="rgb(108,92,230)" viewBox="0 0 256 256"><path d="M178.34,165.66,160,147.31V208a8,8,0,0,1-16,0V147.31l-18.34,18.35a8,8,0,0,1-11.32-11.32l32-32a8,8,0,0,1,11.32,0l32,32a8,8,0,0,1-11.32,11.32ZM160,40A88.08,88.08,0,0,0,81.29,88.68,64,64,0,1,0,72,216h40a8,8,0,0,0,0-16H72a48,48,0,0,1,0-96c1.1,0,2.2,0,3.29.12A88,88,0,0,0,72,128a8,8,0,0,0,16,0,72,72,0,1,1,100.8,66,8,8,0,0,0,3.2,15.34,7.9,7.9,0,0,0,3.2-.68A88,88,0,0,0,160,40Z"></path></svg>
            <span class="light use">Select new profile picture</span>
        </label>
        <input class="file" name="photo" required onchange="Preview(this)" id="pix" type="file" accept="image/*" style="display:none;">
        <button style="color:white;background:rgba(108,92,230)" class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Upload Profile Picture</div></button>
    </form>
@endsection
@section('js')
    <script class="js">
        window.MyFunc=function(){
            window.call_back=function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    document.querySelector('.password-form').reset();
                    HideSlideUp(document.querySelector('.slideup'));
                }
            }
            window.Preview=function(element){
                let file=element.files[0];
                let label= document.querySelector('label[for=pix]');
                if(file){
                   label.style.backgroundImage=`url('${URL.createObjectURL(file)}')`;
                  label.classList.add('active');
                } 
                  else{
                      label.style.backgroundImage='';
                     label.classList.remove('active');
                  }
            }
           window.updated=function(response,event){
                let data=JSON.parse(response);
                if(data.status  ==  'success'){
                    document.querySelector('header .photo span').style.backgroundImage=`url('${data.pix}')`;
                    spa(event,data.url,'profile',document.querySelector('footer .profile'),'active');
                
                }
            }
        }
        MyFunc()
        
    </script>
@endsection