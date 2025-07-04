<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminsPostRequestController extends Controller
{
    //Login
    public function Login(){
       
        $select=DB::table('admins')->where('tag',request()->input('tag'));
        if($select->count() > 0){
            if(!Hash::check(request()->input('password'),$select->first()->password)){
                return response()->json([
                    'message' => 'Invalid Password',
                    'status' => 'error'
                ]);
            }
            Auth::guard('admins')->loginUsingId($select->first()->id);
            return response()->json([
                'message' => 'Login successfull',
                'status' => 'success',
                'url' => url('admins/dashboard')
            ]);

        }
         else{
            return response()->json([
                'message' => 'Admin Tag not found',
                'status' => 'error'
            ]);
         }
    }
// Finance Settings
    public function FinanceSettings(){
        $json=[
            'MinDeposit' => request()->input('MinDeposit'),
            'MaxDeposit' => request()->input('MaxDeposit'),
            'MinWithdrawal' => request()->input('MinWithdrawal'),
            'MaxWithdrawal' => request()->input('MaxWithdrawal')
        ];
        if(DB::table('settings')->where('key','FinanceSettings')->count() > 0){
              DB::table('settings')->where('key','FinanceSettings')->update([
                
                'json' => json_encode($json),
                'status' => 'active',
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Finance settings updated successfully',
                'status' => 'success'
            ]);
        }
         else{
            DB::table('settings')->insert([
                'key' => 'FinanceSettings',
                'json' => json_encode($json),
                'status' => 'active',
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Finance settings saved successfully',
                'status' => 'success'
            ]);
         }
    }
    // Bank Details
      public function BankDetails(){
        $json=[
            'AccountNumber' => request()->input('AccountNumber'),
            'AccountName' => ucwords(request()->input('AccountName')),
            'BankName' => ucwords(request()->input('BankName'))
          
        ];
        if(DB::table('settings')->where('key','BankDetails')->count() > 0){
              DB::table('settings')->where('key','BankDetails')->update([
             
                'json' => json_encode($json),
                'status' => 'active',
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Bank Details updated successfully',
                'status' => 'success'
            ]);
        }
         else{
            DB::table('settings')->insert([
                'key' => 'BankDetails',
                'json' => json_encode($json),
                'status' => 'active',
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Bank Details saved successfully',
                'status' => 'success'
            ]);
         }
    }
    // Add Package
    public function AddPackage(){
        $badge=request()->input('BadgeColor');
        $badge=ltrim($badge,'#');
        $rgb="rgb(".hexdec(substr($badge,0,2)).','.hexdec(substr($badge,3,2)).','.hexdec(substr($badge,5,2)).')';
        $rgba="rgba(".hexdec(substr($badge,0,2)).','.hexdec(substr($badge,3,2)).','.hexdec(substr($badge,5,2)).',0.3)';
        DB::table('packages')->insert([
            'name' => request()->input('name'),
            'badge' => json_encode([
                'name' => request()->input('badge'),
                'color' => $rgb,
                'background' => $rgba
            ]),
            'svg' => json_encode([
                'icon' => request()->input('svg'),
                'background' => request()->input('SVGColor')
            ]),
            'cost' => request()->input('cost'),
            'return' => request()->input('return'),
            'validity' => request()->input('validity'),
            'date' => Carbon::now(),
            'status' => 'active'
        ]);
       return response()->json([
        'message' => 'Package Added Successfully',
        'status' => 'success',
        'url' => url('admins/packages/manage')
       ]);
    }
      // Edit Package
    public function EditPackage($id){
        $badge=request()->input('BadgeColor');
        $badge=ltrim($badge,'#');
        $rgb="rgb(".hexdec(substr($badge,0,2)).','.hexdec(substr($badge,3,2)).','.hexdec(substr($badge,5,2)).')';
        $rgba="rgba(".hexdec(substr($badge,0,2)).','.hexdec(substr($badge,3,2)).','.hexdec(substr($badge,5,2)).',0.3)';
        DB::table('packages')->where('id',$id)->update([
            'name' => request()->input('name'),
            'badge' => json_encode([
                'name' => request()->input('badge'),
                'color' => $rgb,
                'background' => $rgba
            ]),
            'svg' => json_encode([
                'icon' => request()->input('svg'),
                'background' => request()->input('SVGColor')
            ]),
            'cost' => request()->input('cost'),
            'return' => request()->input('return'),
            'validity' => request()->input('validity'),
            'date' => Carbon::now(),
            'status' => 'active'
        ]);
       return response()->json([
        'message' => 'Package Edited Successfully',
        'status' => 'success',
        'url' => url('admins/packages/manage')
       ]);
    }

    // withdrawal settings
 public function WithdrawalSettings(){
        $json=[
            'fee' => request()->input('fee'),
            'status' => request()->input('status'),
            
        ];
        if(DB::table('settings')->where('key','WithdrawalSettings')->count() > 0){
              DB::table('settings')->where('key','WithdrawalSettings')->update([
                
                'json' => json_encode($json),
                'status' => 'active',
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Withdrawal settings updated successfully',
                'status' => 'success'
            ]);
        }
         else{
            DB::table('settings')->insert([
                'key' => 'WithdrawalSettings',
                'json' => json_encode($json),
                'status' => 'active',
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Withdrawal settings saved successfully',
                'status' => 'success'
            ]);
         }
    }
    // credit user
    public function CreditUser(){
        if(Auth::guard('admins')->user()->role !== 'Master Admin'){
            return response()->json([
                'message' => 'You dont have the privileges to approve transactions',
                'status' => 'error'
            ]);
        }
        $user=DB::table('users')->where('id',request()->input('user_id'))->first();
        DB::table('users')->where('id',request()->input('user_id'))->update([
            'balance' => DB::raw('balance + '.request()->input('amount').'')
        ]);
        DB::table('transactions')->insert([
            'uniqid' => strtoupper(uniqid('TRX')),
            'user_id' => request()->input('user_id'),
            'type' => 'credit',
            'class' => 'credit',
            'amount' => request()->input('amount'),
            'head' => 'Admin Reward',
            'body' => json_encode([
                'admin' => 'An admin creditted @'.$user->username.' with &#8358;'.number_format(request()->input(('amount')),2).'',
                'user' => 'Admin rewarded you with &#8358;'.number_format(request()->input(('amount')),2).''
            ]),
            'status' => 'success',
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'User creditted successfully',
            'status' => 'success'
        ]);
    }
     // debit user
    public function DebitUser(){
        if(Auth::guard('admins')->user()->role !== 'Master Admin'){
            return response()->json([
                'message' => 'You dont have the privileges to approve transactions',
                'status' => 'error'
            ]);
        }
          $user=DB::table('users')->where('id',request()->input('user_id'))->first();
        DB::table('users')->where('id',request()->input('user_id'))->update([
            'balance' => DB::raw('balance - '.request()->input('amount').'')
        ]);
        DB::table('transactions')->insert([
            'uniqid' => strtoupper(uniqid('TRX')),
            'user_id' => request()->input('user_id'),
            'type' => 'credit',
            'class' => 'credit',
            'amount' => request()->input('amount'),
            'head' => 'Admin Reward',
            'body' => json_encode([
                'admin' => 'An admin creditted @'.$user->username.' with &#8358;'.number_format(request()->input(('amount')),2).'',
                'user' => 'Admin rewarded you with &#8358;'.number_format(request()->input(('amount')),2).''
            ]),
            'status' => 'success',
            'date' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'User debitted successfully',
            'status' => 'success'
        ]);
        
    }
    // referral settings
 public function ReferralSettings(){
        $json=[
            'method' => request()->input('method'),
            'commission' => request()->input('commission'),
            
        ];
        if(DB::table('settings')->where('key','ReferralSettings')->count() > 0){
              DB::table('settings')->where('key','ReferralSettings')->update([
                
                'json' => json_encode($json),
                'status' => 'active',
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Referral settings updated successfully',
                'status' => 'success'
            ]);
        }
         else{
            DB::table('settings')->insert([
                'key' => 'ReferralSettings',
                'json' => json_encode($json),
                'status' => 'active',
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Referral settings saved successfully',
                'status' => 'success'
            ]);
         }
    }
    // general settings
    public function GeneralSettings(){
         $json=[
            'group' => request()->input('group'),
            'notification' => request()->input('notification'),
            
        ];
        if(DB::table('settings')->where('key','GeneralSettings')->count() > 0){
              DB::table('settings')->where('key','GeneralSettings')->update([
                
                'json' => json_encode($json),
                'status' => 'active',
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'General settings updated successfully',
                'status' => 'success'
            ]);
        }
         else{
            DB::table('settings')->insert([
                'key' => 'GeneralSettings',
                'json' => json_encode($json),
                'status' => 'active',
                'date' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'General settings saved successfully',
                'status' => 'success'
            ]);
         }
    }
}
