{{-- CARD UI --}}
@extends('layout.users.app')
@section('title')
    Packages
@endsection
@section('main')
    <section class="section1 gp p10 grid2 section use">
        <strong class="desc use right-auto grid-full">Available Packages</strong>
        <div style="padding:0;overflow:hidden;" class="card use">
        <div style="padding:10px;" class="row space-between g5">
            <div class="svg use box-shadow"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M122.34,109.66a8,8,0,0,0,11.32,0l40-40a8,8,0,0,0,0-11.32l-40-40a8,8,0,0,0-11.32,0l-40,40a8,8,0,0,0,0,11.32ZM128,35.31,156.69,64,128,92.69,99.31,64Zm5.66,111a8,8,0,0,0-11.32,0l-40,40a8,8,0,0,0,0,11.32l40,40a8,8,0,0,0,11.32,0l40-40a8,8,0,0,0,0-11.32ZM128,220.69,99.31,192,128,163.31,156.69,192Zm109.66-98.35-40-40a8,8,0,0,0-11.32,0l-40,40a8,8,0,0,0,0,11.32l40,40a8,8,0,0,0,11.32,0l40-40A8,8,0,0,0,237.66,122.34ZM192,156.69,163.31,128,192,99.31,220.69,128Zm-82.34-34.35-40-40a8,8,0,0,0-11.32,0l-40,40a8,8,0,0,0,0,11.32l40,40a8,8,0,0,0,11.32,0l40-40A8,8,0,0,0,109.66,122.34ZM64,156.69,35.31,128,64,99.31,92.69,128Z"></path></svg></div>
       <div class="right-auto column g5">
        <b style="font-size:0.9rem;">Solana Pro 5</b>
        <span style="font-weight:100">480.00 NGN/HOUR</span>
       </div>
       <div style="background:rgba(255,0,0,0.3);color:red;" class="pkg badge use bottom-auto">Hot</div>
        </div>
          <hr>
          <div style="padding:10px;" class="row space-between">
            <div class="column">
                <strong class="c-primary use desc">&#8358;3,000.00</strong>
                <div class="row use g5"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#4caf50" viewBox="0 0 256 256"><path d="M240,56v64a8,8,0,0,1-16,0V75.31l-82.34,82.35a8,8,0,0,1-11.32,0L96,123.31,29.66,189.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0L136,140.69,212.69,64H168a8,8,0,0,1,0-16h64A8,8,0,0,1,240,56Z"></path></svg>Daily Earnings/Interest</div>
            </div>
            <div class="column">
                <strong class="c-primary use desc">150 days</strong>
                <div class="row use g5"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="var(--primary-light)" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>Lifespan</div>
            </div>
          </div>
            <div style="padding:10px;" class="row space-between">
            <div class="column">
                <strong class="c-primary use desc">Daily</strong>
                <div class="row use g5 left-auto"><svg xmlns="http://www.w3.org/2000/svg" style="height:1rem;width:1rem;font-size:1rem;" width="16" height="16" fill="#ffa305" viewBox="0 0 256 256"><path d="M24,128A72.08,72.08,0,0,1,96,56H204.69L194.34,45.66a8,8,0,0,1,11.32-11.32l24,24a8,8,0,0,1,0,11.32l-24,24a8,8,0,0,1-11.32-11.32L204.69,72H96a56.06,56.06,0,0,0-56,56,8,8,0,0,1-16,0Zm200-8a8,8,0,0,0-8,8,56.06,56.06,0,0,1-56,56H51.31l10.35-10.34a8,8,0,0,0-11.32-11.32l-24,24a8,8,0,0,0,0,11.32l24,24a8,8,0,0,0,11.32-11.32L51.31,200H160a72.08,72.08,0,0,0,72-72A8,8,0,0,0,224,120Z"></path></svg>Payout Cycle</div>
            </div>
            <div class="column">
                <strong class="c-primary use desc">150 days</strong>
                <div class="row use g5 left-auto"><svg style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#05e2ff" viewBox="0 0 256 256"><path d="M184,89.57V84c0-25.08-37.83-44-88-44S8,58.92,8,84v40c0,20.89,26.25,37.49,64,42.46V172c0,25.08,37.83,44,88,44s88-18.92,88-44V132C248,111.3,222.58,94.68,184,89.57ZM232,132c0,13.22-30.79,28-72,28-3.73,0-7.43-.13-11.08-.37C170.49,151.77,184,139,184,124V105.74C213.87,110.19,232,122.27,232,132ZM72,150.25V126.46A183.74,183.74,0,0,0,96,128a183.74,183.74,0,0,0,24-1.54v23.79A163,163,0,0,1,96,152,163,163,0,0,1,72,150.25Zm96-40.32V124c0,8.39-12.41,17.4-32,22.87V123.5C148.91,120.37,159.84,115.71,168,109.93ZM96,56c41.21,0,72,14.78,72,28s-30.79,28-72,28S24,97.22,24,84,54.79,56,96,56ZM24,124V109.93c8.16,5.78,19.09,10.44,32,13.57v23.37C36.41,141.4,24,132.39,24,124Zm64,48v-4.17c2.63.1,5.29.17,8,.17,3.88,0,7.67-.13,11.39-.35A121.92,121.92,0,0,0,120,171.41v23.46C100.41,189.4,88,180.39,88,172Zm48,26.25V174.4a179.48,179.48,0,0,0,24,1.6,183.74,183.74,0,0,0,24-1.54v23.79a165.45,165.45,0,0,1-48,0Zm64-3.38V171.5c12.91-3.13,23.84-7.79,32-13.57V172C232,180.39,219.59,189.4,200,194.87Z"></path></svg>Cost</div>
            </div>
          </div>
          <div style="background:var(--primary-transparent)" class="column">
            <div class="progress use"><span class="child"></span></div>
            <div style="border:1px solid var(--bg-light);border-radius:0 0 10px 10px;" class="row space-between p10">
                <b class="desc use c-primary">&#8358;5,000.00</b>
            <button style="border:1px solid var(--bg-light);width:fit-content;clip-path:inset(0 round 10px);border-radius:10px;height:fit-content;padding:10px 20px;background:linear-gradient(to right,var(--primary-light),var(--blue));font-weight:900;color:white;" class="get"><div class="working"><div class="work"></div>Working....</div><div class="content row g5"><svg  style="height:1rem;width:1rem;font-size:1rem;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" viewBox="0 0 256 256"><path d="M104,216a16,16,0,1,1-16-16A16,16,0,0,1,104,216Zm88-16a16,16,0,1,0,16,16A16,16,0,0,0,192,200ZM239.71,74.14l-25.64,92.28A24.06,24.06,0,0,1,191,184H92.16A24.06,24.06,0,0,1,69,166.42L33.92,40H16a8,8,0,0,1,0-16H40a8,8,0,0,1,7.71,5.86L57.19,64H232a8,8,0,0,1,7.71,10.14ZM221.47,80H61.64l22.81,82.14A8,8,0,0,0,92.16,168H191a8,8,0,0,0,7.71-5.86Z"></path></svg>Purchase</div></button>
            
            </div>
          </div>
        </div>

       
      
    </section>

@endsection



{{-- ADMIN USERS CARD --}}
 <section class="section2 section use p10">
        <div class="card use">
            <div class="row g5 space-between">
                <div style="position:relative;" class="photo"> <div style="position:absolute;bottom:0;right:0;transform:translateX(-50%) translateY(50%)" class="online use bottom-auto"><span></span></div><span style="background-image:url('{{ asset('images/users/avatar.svg') }}')"></span></div>
                <div class="column right-auto g5">
                    <b>Techie5961</b>
                    <span class="dim row g5 use">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48ZM98.71,128,40,181.81V74.19Zm11.84,10.85,12,11.05a8,8,0,0,0,10.82,0l12-11.05,58,53.15H52.57ZM157.29,128,216,74.18V181.82Z"></path></svg>
                        techie@gmail.com
                    </span>
                        <div style="width:fit-content;" class="status use success active">active</div>
                </div>
               
                
                
            </div>
           <div style="margin:10px 0;" class="grid g10 col-2 use">
             <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M208,48H48A24,24,0,0,0,24,72V184a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V72A24,24,0,0,0,208,48Zm-56,72a24,24,0,0,1-48,0,8,8,0,0,0-8-8H40V96H216v16H160A8,8,0,0,0,152,120ZM48,64H208a8,8,0,0,1,8,8v8H40V72A8,8,0,0,1,48,64Z"></path></svg>
                Account Balance
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;50,000.00
             </b>
                </div>

                 <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M226,88.08c-.4-1-.82-2-1.25-3a87.93,87.93,0,0,0-30.17-37H216a8,8,0,0,0,0-16H112a88.12,88.12,0,0,0-87.72,81A32,32,0,0,0,0,144a8,8,0,0,0,16,0,16,16,0,0,1,8.57-14.16A87.69,87.69,0,0,0,46,178.22l12.56,35.16A16,16,0,0,0,73.64,224H86.36a16,16,0,0,0,15.07-10.62l1.92-5.38h57.3l1.92,5.38A16,16,0,0,0,177.64,224h12.72a16,16,0,0,0,15.07-10.62L221.64,168H224a24,24,0,0,0,24-24V112A24,24,0,0,0,226,88.08ZM152,72H112a8,8,0,0,1,0-16h40a8,8,0,0,1,0,16Zm28,56a12,12,0,1,1,12-12A12,12,0,0,1,180,128Z"></path></svg>
                       Total Deposit
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;50,000.00
             </b>
                </div>
                 <div style="background:rgba(112, 128, 144, 0.2);padding:20px;" class="card p10 use">
             <div class="dim use row g5">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208ZM16.3,98.18a8,8,0,0,1,3.51-9l104-64a8,8,0,0,1,8.38,0l104,64A8,8,0,0,1,232,104H208v64h16a8,8,0,0,1,0,16H32a8,8,0,0,1,0-16H48V104H24A8,8,0,0,1,16.3,98.18ZM144,160a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Zm-48,0a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Z"></path></svg>
                       Total Withdrawals
             </div>
             <b style="color:#4caf50;" class="desc use">
                &#8358;50,000.00
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
                &#8358;50,000.00
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
                Techie_Innovations
             </b>
             </div>
              <div class="row g10">
                <div class="dim use">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM152,160H136v16a8,8,0,0,1-16,0V160H104a8,8,0,0,1,0-16h16V128a8,8,0,0,1,16,0v16h16a8,8,0,0,1,0,16ZM48,80V48H72v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80Z"></path></svg>
                 Registered :
                </div>
               <b style="color:#4caf50;" class="desc use">
                2 days ago
             </b>
             </div>
             <div class="row g10">
                <div class="dim use">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M230.4,219.19A8,8,0,0,1,224,232H32a8,8,0,0,1-6.4-12.8A67.88,67.88,0,0,1,53,197.51a40,40,0,1,1,53.93,0,67.42,67.42,0,0,1,21,14.29,67.42,67.42,0,0,1,21-14.29,40,40,0,1,1,53.93,0A67.85,67.85,0,0,1,230.4,219.19ZM27.2,126.4a8,8,0,0,0,11.2-1.6,52,52,0,0,1,83.2,0,8,8,0,0,0,12.8,0,52,52,0,0,1,83.2,0,8,8,0,0,0,12.8-9.61A67.85,67.85,0,0,0,203,93.51a40,40,0,1,0-53.93,0,67.42,67.42,0,0,0-21,14.29,67.42,67.42,0,0,0-21-14.29,40,40,0,1,0-53.93,0A67.88,67.88,0,0,0,25.6,115.2,8,8,0,0,0,27.2,126.4Z"></path></svg>
                 Total Referred :
                </div>
               <b style="color:#4caf50;" class="desc use">
              100
             </b>
             </div>
             <div class="row g10">
                <div class="dim use">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M240,208h-8V72a8,8,0,0,0-8-8H184V40a8,8,0,0,0-8-8H80a8,8,0,0,0-8,8V96H32a8,8,0,0,0-8,8V208H16a8,8,0,0,0,0,16H240a8,8,0,0,0,0-16ZM80,176H64a8,8,0,0,1,0-16H80a8,8,0,0,1,0,16Zm0-32H64a8,8,0,0,1,0-16H80a8,8,0,0,1,0,16Zm64,64H112V168h32Zm-8-64H120a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H120a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H120a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm56,96H176a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H176a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Zm0-32H176a8,8,0,0,1,0-16h16a8,8,0,0,1,0,16Z"></path></svg>
                  Total Banks Linked :
                </div>
               <b style="color:#4caf50;" class="desc use">
              10
             </b>
             </div>
              <div class="row g10">
                <div class="dim use">
             <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#708090" viewBox="0 0 256 256"><path d="M232,56H24A16,16,0,0,0,8,72V200a8,8,0,0,0,16,0V184H40v16a8,8,0,0,0,16,0V184H72v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V184h16v16a8,8,0,0,0,16,0V72A16,16,0,0,0,232,56ZM208,96v48H144V96Zm-96,0v48H48V96Z"></path></svg>
                 Total Packages Purchased :
                </div>
               <b style="color:#4caf50;" class="desc use">
              15
             </b>
             </div>
               <a href="view">View More....</a>
            </div>
          
        </div>
 </section>