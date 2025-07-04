@isset($TrxActionConfirm)
    @if ($action == 'approve')
        @if ($type == 'deposit')
            <div style="border-radius: 50%;" class="svg use"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#4caf50" viewBox="0 0 256 256"><path d="M243.28,68.24l-24-23.56a16,16,0,0,0-22.59,0L104,136.23l-36.69-35.6a16,16,0,0,0-22.58.05l-24,24a16,16,0,0,0,0,22.61l71.62,72a16,16,0,0,0,22.63,0L243.33,90.91A16,16,0,0,0,243.28,68.24ZM103.62,208,32,136l24-24a.6.6,0,0,1,.08.08l42.35,41.09a8,8,0,0,0,11.19,0L208.06,56,232,79.6Z"></path></svg></div>
           <p>Are you sure you want to approve deposit of &#8358;{{ $amount }} for <b class="cgreen">{{ $username }}?</b></p>
            <button onclick="GetRequest(event,'{{ $ConfirmURL }}',this,confirmed)" style="background:#4caf50;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content">Confirm Approval</div></button>
      
        @else
            <div style="border-radius: 50%;" class="svg use"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#4caf50" viewBox="0 0 256 256"><path d="M243.28,68.24l-24-23.56a16,16,0,0,0-22.59,0L104,136.23l-36.69-35.6a16,16,0,0,0-22.58.05l-24,24a16,16,0,0,0,0,22.61l71.62,72a16,16,0,0,0,22.63,0L243.33,90.91A16,16,0,0,0,243.28,68.24ZM103.62,208,32,136l24-24a.6.6,0,0,1,.08.08l42.35,41.09a8,8,0,0,0,11.19,0L208.06,56,232,79.6Z"></path></svg></div>
           <p>Are you sure you want to approve withdrawal of &#8358;{{ $amount }} for <b class="cgreen">{{ $username }}?</b></p>
            <button onclick="GetRequest(event,'{{ $ConfirmURL }}',this,confirmed)" style="background:#4caf50;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content">Confirm Approval</div></button>
      
        @endif
    @else
        @if ($type == 'deposit')
            <div style="border-radius: 50%;background:rgba(255,0,0,0.3)" class="svg use"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="red" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg></div>
           <p>Are you sure you want to reject deposit of &#8358;{{ $amount }} for <b class="cgreen">{{ $username }}?</b></p>
            <button onclick="GetRequest(event,'{{ $ConfirmURL }}',this,confirmed)" style="background:red;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content">Confirm Rejection</div></button>
      
        @else
            <div style="border-radius: 50%;background:rgba(255,0,0,0.3)" class="svg use"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="red" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg></div>
           <p>Are you sure you want to reject withdrawal of &#8358;{{ $amount }} for <b class="cgreen">{{ $username }}?</b></p>
            <button onclick="GetRequest(event,'{{ $ConfirmURL }}',this,confirmed)" style="background:red;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content">Confirm Rejection</div></button>
      
        @endif 
    @endif
@endisset

@isset($search)
     @if ($data->isEmpty())
         <a><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M198.24,62.63l15.68-17.25a8,8,0,0,0-11.84-10.76L186.4,51.86A95.95,95.95,0,0,0,57.76,193.37L42.08,210.62a8,8,0,1,0,11.84,10.76L69.6,204.14A95.95,95.95,0,0,0,198.24,62.63ZM48,128A80,80,0,0,1,175.6,63.75l-107,117.73A79.63,79.63,0,0,1,48,128Zm80,80a79.55,79.55,0,0,1-47.6-15.75l107-117.73A79.95,79.95,0,0,1,128,208Z"></path></svg><span class="right-auto">No Data Found</span></a>
   
     @else
       @foreach ($data as $data)
            <a href="{{ $data->url }}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg><span class="right-auto">{{ $data->username }}</span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#708090" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg></a>
    
       @endforeach
     @endif  
@endisset

@isset($PurchasePackage)
    <div class="card use">
      <strong class="desc use c-primary">Confirm Purchase</strong>
       <div style="padding:10px;" class="row space-between g5">
            <div style="overflow:hidden;background:{{ $pkg->svg->background }}" class="svg use box-shadow">{!! $pkg->svg->icon !!}</div>
       <div class="right-auto column g5">
        <b style="font-size:0.9rem;">{{ ucwords($pkg->name) }}</b>
        <span style="font-weight:100">{{ $pkg->daily }} NGN/DAY</span>
       </div>
        </div>
        <hr>
        <div class="column w100 use g5">
            <div class="row space-between">
            <strong style="font-size:0.8rem;font-weight:300;">Daily Earnings:</strong>
            <strong style="font-size:1rem;" class="desc c-primary">&#8358;{{ $pkg->daily }}</strong>
            </div>
             <div class="row space-between">
            <strong style="font-size:0.8rem;font-weight:300;">Lifespan:</strong>
            <strong style="font-size:1rem;" class="desc c-primary">{{ number_format($pkg->validity) }} days</strong>
            </div>
             <div class="row space-between">
            <strong style="font-size:0.8rem;font-weight:300;">Payout Cycle:</strong>
            <strong style="font-size:1rem;" class="desc c-primary">Daily</strong>
            </div>
             <div class="row space-between">
            <strong style="font-size:0.8rem;font-weight:300;">Weekly Earnings:</strong>
            <strong style="font-size:1rem;" class="desc c-primary">&#8358;{{ $pkg->weekly }}</strong>
            </div>
            <hr>
            <div class="row space-between g5">
                <button onclick="HideSlideUp(document.querySelector('.slideup'))" style="width:fit-content;height:fit-content;padding:10px 20px;border:1px solid var(--text);color:var(--text);background:var(--bg-light);clip-path:inset(0 round 10px);border-radius:10px;" class="get"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--text)" viewBox="0 0 256 256"><path d="M192,80v96a8,8,0,0,1-8,8H128v40a8,8,0,0,1-13.66,5.66l-96-96a8,8,0,0,1,0-11.32l96-96A8,8,0,0,1,128,32V72h56A8,8,0,0,1,192,80Zm24-8a8,8,0,0,0-8,8v96a8,8,0,0,0,16,0V80A8,8,0,0,0,216,72Z"></path></svg>Cancel</button>
                <button onclick="GetRequest(event,'{{ url('users/get/package/purchase/confirm?id='.$pkg->id.'') }}',this,confirmed)" style="width:fit-content;height:fit-content;padding:10px 20px;border:none;color:white;background:var(--primary-light);clip-path:inset(0 round 10px);border-radius:10px;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content g5 row"><svg style="width:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>Confirm</div></button>
            </div>
        </div>
    </div>
@endisset
@isset($ChatMessages)
    @foreach ($messages as $data)
        <div id="{{ $loop->last ? 'last' : '' }}" class="messages {{ $data->sender_type == 'user'  ? 'receiver' : 'sender' }}">
       <span>{{ $data->message }}</span>
       <span class="frame">{{ $data->frame }}</span>
    </div>
    @endforeach
@endisset
