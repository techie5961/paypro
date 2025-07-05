@extends('layout.users.app')
@section('title')
   Accept Task
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/users/refer.css?v=1.4') }}" class="css">
@endsection
@section('main')
    <section style="background:var(--bg)" class="section 1 fixed use">
 <section style="z-index: 100" class="head use">
        <svg class="pointer" onclick="spa(event,'{{ url('users/dashboard') }}','home')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M85.66,146.34a8,8,0,0,1-11.32,11.32l-48-48a8,8,0,0,1,0-11.32l48-48A8,8,0,0,1,85.66,61.66L43.31,104ZM136,96.3V56a8,8,0,0,0-13.66-5.66l-48,48a8,8,0,0,0,0,11.32l48,48A8,8,0,0,0,136,152V112.37A88.11,88.11,0,0,1,216,200a8,8,0,0,0,16,0A104.15,104.15,0,0,0,136,96.3Z"></path></svg>
        <b style="color:var(--text)" class="right-auto">Complete Task</b>
       <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM169.66,133.66l-48,48a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L116,164.69l42.34-42.35a8,8,0,0,1,11.32,11.32ZM48,80V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80Z"></path></svg>
      </section>

         <section class="body p10 use">
       <section style="height:100%" class="w100 g10 card p10 use">
      <div class="row">
        <b class="desc c-primary use">{{ $task->title }}</b>
        <div style="padding:10px;background:#ffd700;color:black;font-weight:900;border-radius:10px;user-select:none;">&#8358;{{ number_format($task->reward,2) }}</div>
      </div>
      <div class="row g10">
        <svg style="width:16px;height:16px;font-size:16px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--text)" viewBox="0 0 256 256"><path d="M117.18,188.74a12,12,0,0,1,0,17l-5.12,5.12A58.26,58.26,0,0,1,70.6,228h0A58.62,58.62,0,0,1,29.14,127.92L63.89,93.17a58.64,58.64,0,0,1,98.56,28.11,12,12,0,1,1-23.37,5.44,34.65,34.65,0,0,0-58.22-16.58L46.11,144.89A34.62,34.62,0,0,0,70.57,204h0a34.41,34.41,0,0,0,24.49-10.14l5.11-5.12A12,12,0,0,1,117.18,188.74ZM226.83,45.17a58.65,58.65,0,0,0-82.93,0l-5.11,5.11a12,12,0,0,0,17,17l5.12-5.12a34.63,34.63,0,1,1,49,49L175.1,145.86A34.39,34.39,0,0,1,150.61,156h0a34.63,34.63,0,0,1-33.69-26.72,12,12,0,0,0-23.38,5.44A58.64,58.64,0,0,0,150.56,180h.05a58.28,58.28,0,0,0,41.47-17.17l34.75-34.75a58.62,58.62,0,0,0,0-82.91Z"></path></svg>
        <strong class="desc use">Task Link</strong>
      </div>
      <div style="width:100%;padding:20px;text-align:center;border:1px dotted #708090;background:rgba(112, 128, 144, 0.1);border-radius:10px" class="link">
        <a style="text-align:center;width:100%;color:aqua;overflow:hidden;word-break:break-all" href="{{ $task->link }}" class="row g5">{{ $task->link }}</a>
      </div>
       <div class="row g10">
       <svg  style="width:16px;height:16px;font-size:16px;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H116a12,12,0,0,1,0-24H216A12,12,0,0,1,228,128ZM116,76H216a12,12,0,0,0,0-24H116a12,12,0,0,0,0,24ZM216,180H116a12,12,0,0,0,0,24H216a12,12,0,0,0,0-24ZM44,59.31V104a12,12,0,0,0,24,0V40A12,12,0,0,0,50.64,29.27l-16,8a12,12,0,0,0,9.36,22Zm39.73,96.86a27.7,27.7,0,0,0-11.2-18.63A28.89,28.89,0,0,0,32.9,143a27.71,27.71,0,0,0-4.17,7.54,12,12,0,0,0,22.55,8.21,4,4,0,0,1,.58-1,4.78,4.78,0,0,1,6.5-.82,3.82,3.82,0,0,1,1.61,2.6,3.63,3.63,0,0,1-.77,2.77l-.13.17L30.39,200.82A12,12,0,0,0,40,220H72a12,12,0,0,0,0-24H64l14.28-19.11A27.48,27.48,0,0,0,83.73,156.17Z"></path></svg>
         <strong class="desc use">Instructions</strong>
        
      </div>
 <div style="background:rgba(112, 128, 144, 0.2);padding:10px;width:100%;border-radius:10px;">
      {!! nl2br($task->instructions) ?? '-Follow the link above to perform this task <br> -Take a screenshot showing you performed the task' !!}
         </div>
      <div class="row g10">
     <svg style="width:16px;height:16px;font-size:16px;" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--text)" viewBox="0 0 256 256"><path d="M144,96a16,16,0,1,1,16,16A16,16,0,0,1,144,96Zm92-40V200a20,20,0,0,1-20,20H40a20,20,0,0,1-20-20V56A20,20,0,0,1,40,36H216A20,20,0,0,1,236,56ZM44,60v79.72l33.86-33.86a20,20,0,0,1,28.28,0L147.31,147l17.18-17.17a20,20,0,0,1,28.28,0L212,149.09V60Zm0,136H162.34L92,125.66l-48,48Zm168,0V183l-33.37-33.37L164.28,164l32,32Z"></path></svg> 
        <strong class="desc use">Upload screenshot</strong>
        
      </div>
   <form method="POST" action="{{ url('users/post/submit/task/process') }}" onsubmit="PostRequest(event,this,submitted)" style="flex:1 0 auto" action="" class="w100 p10 g10 column">
    <input type="hidden" value="{{ $task->id }}" class="input" name="id">
    <input type="hidden" name="_token" class="input" value="{{ csrf_token() }}"> 
    <label for="photo" style="background-size:100% 100%;background-position:center;clip-path:inset(o round 10px);cursor:pointer;width:100%;background:var(--primary-transparent);padding:20px;display:flex;flex-direction:column;gap:10px;align-items:center;justify-content:center;border:2px dashed var(--primary-light);border-radius:10px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="var(--primary-light)" viewBox="0 0 256 256"><path d="M247.93,124.52C246.11,77.54,207.07,40,160.06,40A88.1,88.1,0,0,0,81.29,88.67h0A87.48,87.48,0,0,0,72,127.73,8.18,8.18,0,0,1,64.57,136,8,8,0,0,1,56,128a103.66,103.66,0,0,1,5.34-32.92,4,4,0,0,0-4.75-5.18A64.09,64.09,0,0,0,8,152c0,35.19,29.75,64,65,64H160A88.09,88.09,0,0,0,247.93,124.52Zm-50.27,9.14a8,8,0,0,1-11.32,0L168,115.31V176a8,8,0,0,1-16,0V115.31l-18.34,18.35a8,8,0,0,1-11.32-11.32l32-32a8,8,0,0,1,11.32,0l32,32A8,8,0,0,1,197.66,133.66Z"></path></svg>
    <span>Upload screenshot of task performed</span>
    <span style="color:blue">Browse Files</span>
   </label>
   <input required onchange="Preview(this)" type="file" name="screenshot" class="file" id="photo" accept="image/*" style="display:none">
   <button style="background:var(--primary-light);color:white;margin-top:auto" class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Upload Proof</div></button>
   </form>

        
       </section>
         </section>

    </section>
@endsection
@section('js')
       <script class="js">
        window.MyFunc=function(){
          
           window.Preview=function(element){
          
                let file=element.files[0];
                let label= document.querySelector('label[for=photo]');
                if(file){
               label.style.background=``;
                label.style.backgroundPosition=`center`;
                   label.style.backgroundImage=`url('${URL.createObjectURL(file)}')`;
                  label.classList.add('active');
                } 
                  else{
                      label.style.backgroundImage='';
                     label.classList.remove('active');
                  }
            }
            window.submitted=function(response,event){
              if(JSON.parse(response).status== 'success'){
                spa(event,JSON.parse(response).url,'package')
              }
            }
        }
        MyFunc();
       </script>
@endsection