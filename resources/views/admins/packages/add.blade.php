@extends('layout.admins.app')
@section('title')
    Add New Package
@endsection
@section('main')
    <section class="section1 section use">
        <strong class="desc use">Add New Package</strong>
        <form action="{{ url('admins/post/add/package/process') }}" method="POST" onsubmit="PostRequest(event,this,call_back)" class="form use">
            <input type="hidden" value="{{ csrf_token() }}" name="_token" class="input">
            <label for="">Package Name</label>
            <div class="cont use required">
                <input name="name" type="text" placeholder="E.g PayPro Starter" class="inp input">
            </div>
            <label for="">Badge Text</label>
            <div class="cont use required">
                <input name="badge" type="text" placeholder="E.g New" class="inp input">
            </div>
            <label for="">Badge Color</label>
            <div class="cont use required">
                <input name="BadgeColor" type="color" class="inp input">
            </div>
            <label for="">SVG Icon</label>
            <div class="cont use required">
                <input name="svg" type="text" placeholder="E.g <svg>.....<svg/>" class="inp input">
            </div>
            <label for="">SVG Color</label>
            <div class="cont use required">
                <input name="SVGColor" type="color" class="inp input">
            </div>
            <label for="">Package Cost (&#8358;)</label>
            <div class="cont use required">
                <input name="cost" type="number" step="any" placeholder="E.g 5000" class="inp input">
            </div>
            <label for="">Daily Return (%)</label>
            <div class="cont use required">
                <input name="return" type="number" step="any" placeholder="E.g 3.5" class="inp input">
            </div>
            <label for="">Validity (days)</label>
            <div class="cont use required">
                <input min="1" name="validity" type="number" placeholder="E.g 7" class="inp input">
            </div>
            <button class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Add Package</div></button>
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