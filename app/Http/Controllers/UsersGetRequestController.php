<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UsersGetRequestController extends Controller
{
    // Deposit Initiate
    public function DepositInitiate(){
        $uniqid=strtoupper(uniqid('TRX-'));
        DB::table('transactions')->insert([
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'deposit',
            'class' => 'credit',
            'uniqid' => $uniqid,
            'head' => 'Deposit Request',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#000080" viewBox="0 0 256 256"><path d="M128,35.31V128a8,8,0,0,1-16,0V35.31L93.66,53.66A8,8,0,0,1,82.34,42.34l32-32a8,8,0,0,1,11.32,0l32,32a8,8,0,0,1-11.32,11.32Zm64,88.31V96a16,16,0,0,0-16-16H160a8,8,0,0,0,0,16h16v80.4A28,28,0,0,0,131.75,210l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62ZM80,80H64A16,16,0,0,0,48,96V200a8,8,0,0,0,16,0V96H80a8,8,0,0,0,0-16Z"></path></svg>',
            'body' => json_encode([
                'admin' => 'Deposit Request from @'.Auth::guard('users')->user()->username.'',
                'user' => 'You made a Deposit Request'
            ]),
            'amount' => request()->input('amount'),
            'status' => 'initiated',
            'date' => Carbon::now()
        ]);
      //  $BankDetails=json_decode(DB::table('settings')->where('key','BankDetails')->where('status','active')->first()->json);
        $url=url('users/deposit/complete?amount='.request()->input('amount').'&uniqid='.$uniqid.'');
        $response=[
            'url' => $url,
            'uniqid' => $uniqid
        ];
    
        return $response;
    }
    // purchase package
    public function PurchasePackage(){
        $pkg=DB::table('packages')->where('id',request()->input('id'))->first();
        $pkg->svg=json_decode($pkg->svg);
        $pkg->daily=number_format(($pkg->return*$pkg->cost)/100,2);
         $pkg->weekly=number_format((($pkg->return*$pkg->cost)/100)*7,2);
        return view('components.api',[
            'PurchasePackage' => true,
            'pkg' => $pkg
        ]);
    }
    // confirm purchase
    public function ConfirmPurchase(){
        $pkg=DB::table('packages')->where('id',request()->input('id'))->where('status','active');
        if($pkg->count() == 0){
            return response()->json([
                'message' => 'Package not found',
                'status' => 'error'
            ]);

        }
         else{
            $pkg=$pkg->first();
            if(Auth::guard('users')->user()->balance < $pkg->cost){
                return response()->json([
                    'message' => 'Insufficient balance,Deposit funds to purchase this package',
                    'status' => 'error'
                ]);
            }
             else{
                DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                    'balance' => DB::raw('balance - '.$pkg->cost.'')
                    
                ]);
                DB::table('transactions')->insert([
                    'uniqid' => strtoupper(uniqid('trx-')),
                    'user_id' => Auth::guard('users')->user()->id,
                    'type' => 'purchase',
                    'class' => 'debit',
                    'amount' => $pkg->cost,
                    'head' => 'Package Purchase',
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#1f2323" viewBox="0 0 256 256"><path d="M239.71,74.14l-25.64,92.28A24.06,24.06,0,0,1,191,184H92.16A24.06,24.06,0,0,1,69,166.42L33.92,40H16a8,8,0,0,1,0-16H40a8,8,0,0,1,7.71,5.86L57.19,64H232a8,8,0,0,1,7.71,10.14ZM88,200a16,16,0,1,0,16,16A16,16,0,0,0,88,200Zm104,0a16,16,0,1,0,16,16A16,16,0,0,0,192,200Z"></path></svg>',
                    'body' => json_encode([
                        'user' => 'You purchased '.$pkg->name.' package',
                        'admin' => '@'.Auth::guard('users')->user()->username.' purchased '.$pkg->name.' package'
                    ]),
                    'status' => 'success',
                    'date' => Carbon::now()
                ]);
                DB::table('purchased')->insert([
                    'user_id' => Auth::guard('users')->user()->id,
                    'package_id' => $pkg->id,
                    'json' => json_encode($pkg),
                    'last_reward' => Carbon::now(),
                    'date' => Carbon::now()
                ]);
                // refferral commission
                $ref=json_decode(Auth::guard('users')->user()->ref)->username ?? '';
                if($ref !== ''){
                  
                    $settings=json_decode(DB::table('settings')->where('key','ReferralSettings')->first()->json);
                  
                    if($settings->method == 'fixed'){
                        $commission=$settings->commission;
                    } else{
                        $commission=($settings->commission*$pkg->cost)/100;
                    }
                    
                    DB::table('users')->where('username',$ref)->update([
                        'balance' => DB::raw('balance + '.$commission.'')
                    ]);
                     DB::table('transactions')->insert([
                    'uniqid' => strtoupper(uniqid('trx-')),
                    'user_id' => DB::table('users')->where('username',$ref)->first()->id,
                    'type' => 'commission',
                    'class' => 'credit',
                    'amount' => $commission,
                    'head' => 'Referral Commission',
                    'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#f7f7f7" viewBox="0 0 256 256"><path d="M208,48H48A24,24,0,0,0,24,72V184a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V72A24,24,0,0,0,208,48ZM40,96H216v16H160a8,8,0,0,0-8,8,24,24,0,0,1-48,0,8,8,0,0,0-8-8H40Zm8-32H208a8,8,0,0,1,8,8v8H40V72A8,8,0,0,1,48,64ZM208,192H48a8,8,0,0,1-8-8V128H88.8a40,40,0,0,0,78.4,0H216v56A8,8,0,0,1,208,192Z"></path></svg>',
                    'body' => json_encode([
                        'user' => 'You received a referral commission from '.Auth::guard('users')->user()->username.'',
                        'admin' => '@'.$ref.' received referral commission from '.Auth::guard('users')->user()->username.''
                    ]),
                    'json' => json_encode([
                        'user_id' => Auth::guard('users')->user()->id,
                        'purchase' => $pkg->cost
                    ]),
                    'status' => 'success',
                    'date' => Carbon::now()
                ]);
                }
                //  notifications
      DB::table('notifications')->insert([
        'user_id' => Auth::guard('users')->user()->id,
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM128,160a48.05,48.05,0,0,1-48-48,8,8,0,0,1,16,0,32,32,0,0,0,64,0,8,8,0,0,1,16,0A48.05,48.05,0,0,1,128,160ZM40,72V56H216V72Z"></path></svg>',
          'head' => json_encode([
            'user' => 'Package Purchase',
            'admin' => 'Package Purchase'
          ]),
          'body' => json_encode([
            'user' => 'You purchased '.$pkg->name.' Package',
            'admin' => '@'.Auth::guard('users')->user()->username.' just purchased '.$pkg->name.' Package'
          ]),
          'status' => json_encode([
            'user' => 'unread',
            'admin' => 'unread'
          ]),
          'date' => Carbon::now()
      ]);
                return response()->json([
                    'message' => 'Package purchased successfully',
                    'status' => 'success',
                    'url' => url('users/packages/active')
                ]);

             }
         }

    }
    // Delete bank
    public function DeleteBank(){
        DB::table('banks')->where('id',request()->input('id'))->delete();
           //  notifications
      DB::table('notifications')->insert([
        'user_id' => Auth::guard('users')->user()->id,
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM112,168a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm0-120H96V40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Z"></path></svg>',
          'head' => json_encode([
            'user' => 'Bank Delete',
            'admin' => 'Bank Delete'
          ]),
          'body' => json_encode([
            'user' => 'You deleted a bank account',
            'admin' => '@'.Auth::guard('users')->user()->username.' just deleted a bank account'
          ]),
          'status' => json_encode([
            'user' => 'unread',
            'admin' => 'unread'
          ]),
          'date' => Carbon::now()
      ]);
        return response()->json([
            'message' => 'bank account deleted successfully',
            'status' => 'success',
            'url' => url('users/bank')
        ]);
    }
    // withdrawal
    function Withdrawal(){
        if(request()->input('amount') > Auth::guard('users')->user()->balance){
            return response()->json([
                'message' => 'Insufficient balance',
                'status' => 'error'

            ]);
        }
        // LIMIT CONTROL
        if(DB::table('transactions')->where('status','pending')->orWhere('status','success')->where('date',Carbon::today())->sum('amount') + request()->input('amount') > 300000){
            DB::table('settings')->where('key','WithdrawalSettings')->update([
                'json->status' => 'closed'
            ]);
        }
        $settings= json_decode(DB::table('settings')->where('key','WithdrawalSettings')->where('status','active')->first()->json);
        if($settings->status !== 'active'){
            return response()->json([
                'message' => 'Withdrawal portal is currently closed,check back later',
                'status' => 'error'
            ]);
        }
        
        $uniqid=uniqid('TRX-');
        $bank=json_decode(DB::table('banks')->where('id',request()->input('bank_id'))->first()->json);
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'balance' => DB::raw('balance - '.request()->input('amount').'')
        ]);
        DB::table('transactions')->insert([
            'uniqid' => strtoupper($uniqid),
            'user_id' => Auth::guard('users')->user()->id,
            'type' => 'withdrawal',
            'class' => 'debit',
            'amount' => request()->input('amount') - (($settings->fee*request()->input('amount'))/100),
            'head' => 'Withdrawal Request',
            'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M128,56H112V16a8,8,0,0,1,16,0Zm64,67.62V72a16,16,0,0,0-16-16H128v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32l-32,32a8,8,0,0,1-11.32,0l-32-32A8,8,0,0,1,93.66,98.34L112,116.69V56H64A16,16,0,0,0,48,72V200a8,8,0,0,0,8,8h74.7c.32.67.67,1.34,1.05,2l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62Z"></path></svg>',
           'body' => json_encode([
                'admin' => 'Withdrawal Request from @'.Auth::guard('users')->user()->username.'',
                'user' => 'You made a Withdrawal Request'
            ]),
            'json' => json_encode([
            'AccountName' => $bank->AccountName,
            'BankName' => banks()->{$bank->BankName}->name,
            'AccountNumber' => $bank->AccountNumber,
            'fee' => ($settings->fee*request()->input('amount'))/100
            ]),
            'status' => 'pending',
            'date' => Carbon::now()
        ]);
         //  notifications
      DB::table('notifications')->insert([
        'user_id' => Auth::guard('users')->user()->id,
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M128,56H112V16a8,8,0,0,1,16,0Zm64,67.62V72a16,16,0,0,0-16-16H128v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32l-32,32a8,8,0,0,1-11.32,0l-32-32A8,8,0,0,1,93.66,98.34L112,116.69V56H64A16,16,0,0,0,48,72V200a8,8,0,0,0,8,8h74.7c.32.67.67,1.34,1.05,2l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62Z"></path></svg>',
          'head' => json_encode([
            'user' => 'Withdrawal Request',
            'admin' => 'Withdrawal Request'
          ]),
          'body' => json_encode([
            'user' => 'You submited a withdrawal request',
            'admin' => '@'.Auth::guard('users')->user()->username.' just submitted a withdrawal request'
          ]),
          'status' => json_encode([
            'user' => 'unread',
            'admin' => 'unread'
          ]),
          'date' => Carbon::now()
      ]);
        return response()->json([
            'message' => 'Withdrawal request submitted successfully',
            'status' => 'success',
             'url' => url('users/withdrawal/receipt?uniqid='.$uniqid.'')
        ]);
    }
    // online status
    public function OnlineStatus(){
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'last_online' => Carbon::now()
        ]);
    }
//   mark as read
    public function MarkAsRead(){
        DB::table('notifications')->where('id',request()->input('id'))->update([
            'status->user' => 'read',
            
        ]);
        return response()->json([
            'message' => 'Notification marked successfully',
            'status' => 'success',
            'url' => url('users/notifications')
        ]);
    }
    //   mark all as read
    public function MarkAllAsRead(){
        DB::table('notifications')->where('user_id',Auth::guard('users')->user()->id)->where('status->user','unread')->update([
            'status->user' => 'read',
            
        ]);
        return response()->json([
            'message' => 'Notifications marked successfully',
            'status' => 'success',
            'url' => url('users/notifications')
        ]);
    }
    
}
