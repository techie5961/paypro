<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsSearchRequestController extends Controller
{
    // Transactions
    public function Transactions(){
        $trx=DB::table('transactions')->join('users','users.id','transactions.user_id')->whereNot('transactions.status','initiated')->where(function($q){
          $q->where('users.username','like','%'.request()->input('q').'%')->orWhere('users.email','like','%'.request()->input('q').'%')->orWhere('users.name','like','%'.request()->input('q').'%');
        })->groupBy('users.username','transactions.user_id')->select('users.username','transactions.user_id')->limit(5)->get();
      $trx->transform(function($each){
        $each->url=url('admins/transactions/filter?user_id='.$each->user_id.'');
        return $each;
      });
        return view('components.api',[
            'search' => true,
            'data' => $trx
        ]);
    }
    // Deposits
    public function Deposits($status){
        $trx=DB::table('transactions')->join('users','users.id','transactions.user_id')->where('transactions.type','deposit')->where('transactions.status',$status)->where(function($q){
          $q->where('users.username','like','%'.request()->input('q').'%')->orWhere('users.email','like','%'.request()->input('q').'%')->orWhere('users.name','like','%'.request()->input('q').'%');
        })->groupBy('users.username','transactions.user_id')->select('users.username','transactions.user_id')->limit(5)->get();
      $trx->transform(function($each) use($status){
        $each->url=url('admins/deposits/'.$status.'/filter?user_id='.$each->user_id.'');
        return $each;
      });
        return view('components.api',[
            'search' => true,
            'data' => $trx
        ]);
    }
    // Withdrawals
    public function Withdrawals($status){
        $trx=DB::table('transactions')->join('users','users.id','transactions.user_id')->where('transactions.type','withdrawal')->where('transactions.status',$status)->where(function($q){
          $q->where('users.username','like','%'.request()->input('q').'%')->orWhere('users.email','like','%'.request()->input('q').'%')->orWhere('users.name','like','%'.request()->input('q').'%');
        })->groupBy('users.username','transactions.user_id')->select('users.username','transactions.user_id')->limit(5)->get();
      $trx->transform(function($each) use($status){
        $each->url=url('admins/withdrawals/'.$status.'/filter?user_id='.$each->user_id.'');
        return $each;
      });
        return view('components.api',[
            'search' => true,
            'data' => $trx
        ]);
    
    }

        // users
        public function Users(){
          
          $users=DB::table('users')->where('name','like','%'.request()->input('q').'%')->orWhere('email','like','%'.request()->input('q').'%')->orWhere('name','like','%'.request()->input('q').'%')->limit(5)->get();
          $users->transform(function($each){
             $each->url=url('admins/users?id='.$each->id.'');
             return $each;
          });
           return view('components.api',[
            'search' => true,
            'data' => $users
        ]);
        }
         // Promoters
        public function Promoters(){
          $query=request()->input('q');
          $users=DB::table('users')->where('type','promoter')->where(function($q) use($query){
            $q->where('name','like','%'.$query.'%')->orWhere('email','like','%'.$query.'%')->orWhere('name','like','%'.$query.'%');
          return $q;
          })->limit(5)->get();
          $users->transform(function($each){
             $each->url=url('admins/promoters?id='.$each->id.'');
             return $each;
          });
           return view('components.api',[
            'search' => true,
            'data' => $users
        ]);
        }
}
