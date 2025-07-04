@extends('layout.admins.app')
@section('title')
    Bank Details
@endsection
@section('main')
    <section class="section1 section use">
        <form action="{{ url('admins/post/bank/details/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="form use">
            <strong class="desc use"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000080" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>Bank Details</strong>
           <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
            <label for="">Account Number</label>
            <div class="cont required use">
                <input value="{{ $BankDetails->AccountNumber ?? '' }}" placeholder="E.g 5005016577" name="AccountNumber" type="number" class="inp input">
            </div>
            <label for="">Bank Name</label>
             <div class="cont required use">
                <input value="{{ $BankDetails->BankName ?? '' }}" name="BankName" placeholder="E.g Standard Chartered Bank" type="text" class="inp input">
            </div>
            <label for="">Account Name</label>
             <div class="cont required use">
                <input value="{{ $BankDetails->AccountName ?? '' }}" name="AccountName" placeholder="E.g David James" type="text" class="inp input">
            </div>
            <button class="post"><div class="working"><div class="work"></div>Working....</div><div class="content">Update Bank</div></button>
        </form>
    </section>
@endsection