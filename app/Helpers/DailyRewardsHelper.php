<?php
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
function DailyRewards(){
    $purchased=DB::table('purchased')->where('status','active')->get();
 
    foreach($purchased as $data){
        
       $json=json_decode($data->json);
       $user=DB::table('users')->where('id',$data->user_id)->first();
        $next_reward=Carbon::parse($data->last_reward)->diffInDays();
        if(Carbon::parse($data->date)->diffInDays() >= $json->validity ?? 0){
            DB::table('purchased')->where('id',$data->id)->update([
                'status' => 'completed'
            ]);
        }
        $status=DB::table('purchased')->where('id',$data->id)->first()->status;
       if($next_reward >= 1 && $status == 'active'){
       $return=($json->return*$json->cost)/100;
    DB::table('users')->where('id',$data->user_id)->update([
        'balance' => DB::raw('balance + '.$return.'')
    ]);
    DB::table('purchased')->where('id',$data->id)->update([
        'last_reward' => Carbon::now()
    ]);
      DB::table('transactions')->insert([
            'user_id' => $data->user_id,
            'type' => 'reward',
            'class' => 'credit',
            'uniqid' => strtoupper(uniqid('TRX-')),
            'head' => 'Daily Reward',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M208,48H48A24,24,0,0,0,24,72V184a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V72A24,24,0,0,0,208,48ZM40,96H216v16H160a8,8,0,0,0-8,8,24,24,0,0,1-48,0,8,8,0,0,0-8-8H40Zm8-32H208a8,8,0,0,1,8,8v8H40V72A8,8,0,0,1,48,64ZM208,192H48a8,8,0,0,1-8-8V128H88.8a40,40,0,0,0,78.4,0H216v56A8,8,0,0,1,208,192Z"></path></svg>',
            'body' => json_encode([
                'admin' => 'Daily reward from '.$json->name.' Package to @'.$user->username.'',
                'user' => 'Daily reward from '.$json->name.' Package'
            ]),
            'amount' => $return,
            'status' => 'success',
            'date' => Carbon::now()
        ]);
       }
    }

}

?>