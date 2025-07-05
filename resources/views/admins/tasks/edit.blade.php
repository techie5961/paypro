@extends('layout.admins.app')
@section('title')
    Edit Task
@endsection
@section('main')
    <section class="section1 section use">
        <strong class="desc use">Edit Task</strong>
        <form action="{{ url('admins/post/edit/task/process') }}" method="POST" onsubmit="PostRequest(event,this,call_back)" class="form use">
            <input type="hidden" name="id" value="{{ $task->id }}" class="input">
            <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
            <label for="">Task Title</label>
            <div class="cont use required">
                <input value="{{ $task->title }}" name="title" type="text" placeholder="E.g Whatsapp Group" class="inp input">
            </div>
            <label for="">Task Link</label>
            <div class="cont use required">
                <input value="{{ $task->link }}" name="link" type="url" placeholder="E.g https://link-to-your-task.com" class="inp input">
            </div>
           
          
          
            <label for="">Task Reward (&#8358;)</label>
            <div class="cont use required">
                <input value="{{ $task->reward }}" name="reward" type="number" step="any" placeholder="E.g 5000" class="inp input">
            </div>
            <label for="">Task Limit (%)</label>
            <div class="cont use required">
                <input value="{{ $task->limit }}" name="limit" type="number" step="any" placeholder="E.g 1000" class="inp input">
            </div>
            <label for="">Task Instructions</label>
            <div style="height:200px;" class="cont use">
               <textarea style="resize: none" class="inp input"  placeholder="Task description" name="instructions" id="" cols="30" rows="10">{{ $task->instructions }}</textarea>
            </div>
            <button class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Add Task</div></button>
        </form>
    </section>
@endsection
@section('js')
    <script class="js">
        function call_back(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href=data.url;
            }
        }
    </script>
@endsection