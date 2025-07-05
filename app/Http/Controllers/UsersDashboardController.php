<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersDashboardController extends Controller
{
    //  Check login
    protected function CheckLogin(){
        if(!Auth::guard('users')->check()){
            return redirect()->to('login')->send();

        }
    } 
    
    public function __construct()
    {
        $this->CheckLogin();
        DailyRewards();
    }
    // Dashboard
    public function Dashboard(){
         $trx=DB::table('transactions')->whereNot('status','initiated')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->limit(2)->paginate(2);
   $trx->getCollection()->transform(function($each){
    $each->frame=Carbon::parse($each->date)->diffForHumans();
    return $each;
   });
        $response=[
            'balance' => number_format(Auth::guard('users')->user()->balance,2),
            'trx' => $trx,
            'ref' => json_decode(DB::table('settings')->where('key','ReferralSettings')->first()->json),
              'general' => json_decode(DB::table('settings')->where('key','GeneralSettings')->where('status','active')->first()->json)
        ];
        return view('users.dashboard',$response);
    }
    // Deposit
    public function Deposit(){
        $response=[
            'Limits' => json_decode(DB::table('settings')->where('key','FinanceSettings')->where('status','active')->first()->json)

        ];
        return view('users.finance.deposit.initiate',$response);
    }
    // Complete Deposit
    public function CompleteDeposit(){
        if(DB::table('transactions')->where('uniqid',request()->input('uniqid'))->where('status','initiated')->count() == 0){
            return redirect()->to('users/deposit');
        }
        if(request()->input('amount') == 0 || request()->input('amount') == null){
            return redirect()->to('users/deposit');
        }
        $response=[
            'uniqid' => request()->input('uniqid'),
            'amount' => number_format(request()->input('amount'),2),
            'BankDetails' => json_decode(DB::table('settings')->where('key','BankDetails')->first()->json)
        ];
        return view('users.finance.deposit.complete',$response);
    }
    // deposit receipt
    public function DepositReceipt(){
        $trx=DB::table('transactions')->where('uniqid',request()->input('uniqid'))->first();
        $response=[
            'amount' => $trx->amount,
            'date' => $trx->date,
            'uniqid' => request()->input('uniqid'),
            'BankName' => json_decode($trx->json)->BankName,
            'AccountName' => json_decode($trx->json)->AccountName,
            
            
        ];
        return view('users.finance.deposit.receipt',$response);
    }
    // Purchase Packages
    public function PurchasePackages(){
        $pkgs=DB::table('packages')->where('status','active')->orderBy('cost','asc')->paginate(20);
        $pkgs->getCollection()->transform(function($each){
            $each->svg=json_decode($each->svg);
            $each->daily=number_format(($each->return*$each->cost)/100,2);
            $each->badge=json_decode($each->badge);
            $each->cost=number_format($each->cost,2);
            return $each;
        });
        return view('users.packages.purchase',[
            'pkgs' => $pkgs
        ]);
    }
    // active packages
    public function ActivePackages(){
        $pkgs=DB::table('purchased')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->orderBy('date','desc')->paginate(10);
       $pkgs->getCollection()->transform(function($each){
        $each->pkg=json_decode($each->json);
        $each->svg=json_decode(json_decode($each->json)->svg);
        $each->daily=number_format((json_decode($each->json)->return*json_decode($each->json)->cost)/100,2);
        $each->expires=Carbon::parse($each->date)->addDays(json_decode($each->json)->validity)->format('d, M Y');
        $each->next=Carbon::parse($each->last_reward)->addDays(1)->format('d, M Y H:i:s');
        return $each;
       });
        return view('users.packages.active',[
            'purchased' => $pkgs,
            'current' => $pkgs->CurrentPage(),
            'last' => $pkgs->LastPage()
        ]);
    }
    // add bank
    public function AddBank(){
        $banks=DB::table('banks')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->get();
       $banks->transform(function($each){
        $each->json=json_decode($each->json);
        $each->bank=Banks()->{$each->json->BankName}->icon;
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        return $each;
       });
        return view('users.bank',[
            'banks' => $banks
        ]);
    }
    // withdraw
    public function Withdraw(){
        $banks=DB::table('banks')->where('user_id',Auth::guard('users')->user()->id);
        if($banks->count() == 0){
            return redirect()->to('users/bank')->send();
        }
        $banks=$banks->orderBy('date','desc')->get();
        $banks->transform(function($each){
            $each->json=json_decode($each->json);
            $each->bank=Banks()->{$each->json->BankName};
            return $each;
        });
         $response=[
            'Limits' => json_decode(DB::table('settings')->where('key','FinanceSettings')->where('status','active')->first()->json),
            'banks' => $banks

        ];
        return view('users.finance.withdraw.initiate',$response);
    }
// withdrawal receipt
    public function WithdrawalReceipt(){ 
        $trx=DB::table('transactions')->where('uniqid',request()->input('uniqid'))->first();
        $response=[
            'amount' => $trx->amount,
            'date' => $trx->date,
            'uniqid' => request()->input('uniqid'),
            'BankName' => json_decode($trx->json)->BankName,
            'AccountName' => json_decode($trx->json)->AccountName,
            'AccountNumber' => json_decode($trx->json)->AccountNumber,
            'fee' => json_decode($trx->json)->fee,
            
            
        ];
        return view('users.finance.withdraw.receipt',$response);
    }
// transactions
public function Transactions(){
    $trx=DB::table('transactions')->whereNot('status','initiated')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->paginate(10);
   $trx->getCollection()->transform(function($each){
    $each->frame=Carbon::parse($each->date)->diffForHumans();
    return $each;
   });
    return view('users.transactions',[
        'trx' => $trx,
        'last' => $trx->lastPage(),
        'current' => $trx->currentPage()
    ]); 
}

// withdrawal receipt
    public function Receipt(){ 
        $trx=DB::table('transactions')->where('id',request()->input('id'))->first();
        $response=[
            'amount' => $trx->amount,
            'date' => $trx->date,
            'trx' => $trx
            
            
        ];
        return view('users.finance.receipt',$response);
    }

    // Profile
    public function Profile(){
        return view('users.profile',[
             'general' => json_decode(DB::table('settings')->where('key','GeneralSettings')->where('status','active')->first()->json)
        ]);
    }
    // chat
    public function Chat(){
       if(request()->has('chat_id')){
        $admin_id=DB::table('chats')->where('id',request()->input('chat_id'))->first()->admin_id ?? 0;
        if($admin_id == 0){
 $head='<img src="'.asset('images/bot.svg').'"> <b>PayPro AI</b>';
        }
         else{
  $admin=DB::table('admins')->where('id',$admin_id)->first();
$head='<img src="'.asset('images/admins/'.$admin->photo.'').'"> <b>'.$admin->name.'</b>';
         }
        $messages=DB::table('messages')->where('chat_id',request()->input('chat_id'))->limit(100)->orderBy('date','asc')->get();
        $messages->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        return view('users.chat.message',[
            'messages' => $messages,
            'chat_id' => request()->input('chat_id'),
            'head' => $head
        ]);
       }
        return view('users.chat.message');
    }
    // support
    public function Support(){
        $chats=DB::table('chats')->where('user_id',Auth::guard('users')->user()->id)->limit(100)->get();
        $chats->transform(function($each){
            $message=DB::table('messages')->where('chat_id',$each->id)->orderBy('date','asc')->first();
            $each->updated=$message->date;
            $admin_id=$each->admin_id ?? 0;
            if($admin_id == 0){
              $each->photo=asset('images/admins/bot.svg');
                $each->name='PayPro AI';
            }
             else{
                $admin=DB::table('admins')->where('id',$admin_id)->first();
                $each->photo=asset('images/admins/'.$admin->photo.'');
                $each->name=$admin->name;
             }
             if(strlen($message->message) > 20){
                $each->message=ucfirst(substr($message->message,0,20)).'.......';
             }
              else{
                $each->message=ucfirst($message->message);
              }
              $each->frame=Carbon::parse($message->date)->diffForHumans();
            return $each;
        });
        $chats->sortBy('updated');
        return view('users.chat.support',[
            'chats' => $chats
        ]);
    }
    public function ReferAndEarn(){
        $settings=json_decode(DB::table('settings')->where('key','ReferralSettings')->first()->json);
        
        return view('users.refer.home',[
            'ref' => $settings
        ]);
    }
    // referrals
    public function Referrals(){
        $ref=DB::table('users')->where('ref->username',Auth::guard('users')->user()->username)->orderBy('date','desc')->paginate(10);
        $ref->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->purchased=DB::table('transactions')->where('type','commission')->where('json->user_id',$each->id)->sum('json->purchase');
            $each->commission=DB::table('transactions')->where('type','commission')->where('json->user_id',$each->id)->sum('amount');
            return $each;
        });
        return view('users.refer.history',[
            'ref' => $ref,
            'current' => $ref->currentPage(),
            'last' => $ref->lastPage()
        ]);
    }
    public function Notifications(){
        $notifications=DB::table('notifications')->where('user_id',Auth::guard('users')->user()->id)->orderBy('date','desc')->paginate(10);
       $notifications->getCollection()->transform(function($each){
        $each->head=json_decode($each->head);
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        $each->status=json_decode($each->status)->user;
        $each->body=json_decode($each->body);
        return $each;
       });
        return view('users.notifications',[
            'notifications' => $notifications,
            'unread' => DB::table('notifications')->where('user_id',Auth::guard('users')->user()->id)->where('status->user','unread')->count(),
            'current' => $notifications->currentPage(),
            'last' => $notifications->lastPage()
        ]);
    }
    // logout
    public function Logout(){
        Auth::guard('users')->logout();
        return redirect()->to('login');
    }
     // tasks
    public function Tasks(){
        $proofs=DB::table('proofs')->where('user_id',Auth::guard('users')->user()->id)->pluck('task_id');
        $tasks=DB::table('tasks')->whereNotIn('id',$proofs)->where('status','active')->whereColumn('done','<','limit')->orderBy('date','desc')->paginate(10);
        return view('users.tasks.available',[
            'tasks' => $tasks
        ]);
    }
    // accept task
    public function AcceptTask(){
    $task=DB::table('tasks')->where('id',request()->input('id'))->first();
        return view('users.tasks.accept',[
            'task' => $task
        ]);
    }

}
