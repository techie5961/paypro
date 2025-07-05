<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminsDashboardController extends Controller
{
    // check login
    protected function CheckLogin(){
        if(!Auth::guard('admins')->check()){
            return redirect()->to('admins/login')->send();
        }
    }
    public function __construct(){
        $this->CheckLogin();
        DailyRewards();
    }
    // Dashboard
    public function Dashboard(){
        
        return view('admins.dashboard',[
            'users' => DB::table('users')->count(),
             'promoters' => DB::table('users')->where('type','promoter')->count(),
            'pending_deposits' => DB::table('transactions')->where('type','deposit')->where('status','pending')->sum('amount'),
            'pending_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('status','pending')->sum('amount'),
            'successfull_deposits' => DB::table('transactions')->where('type','deposit')->where('status','success')->sum('amount'),
            'successfull_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('status','success')->sum('amount'),
            'rejected_deposits' => DB::table('transactions')->where('type','deposit')->where('status','rejected')->sum('amount'),
            'rejected_withdrawals' => DB::table('transactions')->where('type','withdrawal')->where('status','rejected')->sum('amount'),
            'packages' => DB::table('packages')->count()
        ]);
    }
    // Site Settings
    public function SiteSettings(){
        $response=[
            'Finance'=> json_decode(DB::table('settings')->where('key','FinanceSettings')->where('status','active')->first()->json),
            'Withdrawal' =>  json_decode(DB::table('settings')->where('key','WithdrawalSettings')->where('status','active')->first()->json),
            'ref' =>  json_decode(DB::table('settings')->where('key','ReferralSettings')->where('status','active')->first()->json),
            'general' => json_decode(DB::table('settings')->where('key','GeneralSettings')->where('status','active')->first()->json),
        ];
        return view('admins.settings',$response);
    }
    // Bank Details
    public function BankDetails(){
        $response=[
            'BankDetails' => json_decode(DB::table('settings')->where('key','BankDetails')->first()->json)
        ];
        return view('admins.bank',$response);
    }
    // Transactions
    public function Transactions(){
       $trx=DB::table('transactions')->whereNot('status','initiated')->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $user=DB::table('users')->where('id',$each->user_id)->first();
            $each->photo=$user->photo;
            $each->username=$user->username;
            $each->frame=Carbon::parse($each->date)->diffForHumans();
           switch(strtolower(trim($each->type))){
            case 'deposit':
                 $each->desc='Bank Sent From';
                 $each->details=json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            case 'withdrawal':
                $each->desc='Bank Details';
                 $each->details=json_decode($each->json)->AccountNumber.' / '.json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            default:
                $each->desc='Transaction Details';
                 $each->details=json_decode($each->body)->admin;
                  
                 break;
           }
           $each->ApproveURL=url('admins/get/transaction/approve?id='.$each->id.'');
            $each->RejectURL=url('admins/get/transaction/reject?id='.$each->id.'');
            return $each;
        });
        $response=[
            'title' => 'Transactions',
            'status' => 'Transactions',
            'total' => number_format(DB::table('transactions')->whereNot('status','initiated')->count()),
            'today' => number_format(DB::table('transactions')->whereNot('status','initiated')->whereDate('date',Carbon::today())->count()),
            'amount' => number_format(DB::table('transactions')->whereNot('status','initiated')->sum('amount') ?? '0',2),
            'trx' => $trx
        ];
        return view('admins.transactions',$response);
    }
      // Filter Transactions
    public function FilterTransactions(){
       $trx=DB::table('transactions')->whereNot('status','initiated')->where('user_id',request()->input('user_id'))->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $user=DB::table('users')->where('id',$each->user_id)->first();
            $each->photo=$user->photo;
            $each->username=$user->username;
            $each->frame=Carbon::parse($each->date)->diffForHumans();
           switch($each->type){
            case 'deposit':
                 $each->desc='Bank Sent From';
                 $each->details=json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            case 'withdrawal':
                $each->desc='Bank Details';
                 $each->details=json_decode($each->json)->AccountNumber.' / '.json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            default:
                $each->desc='Transaction Details';
                 $each->details=json_decode($each->body)->admin;
                 break;
           }
           $each->ApproveURL=url('admins/get/transaction/approve?id='.$each->id.'');
            $each->RejectURL=url('admins/get/transaction/reject?id='.$each->id.'');
            return $each;
        });
        $response=[
            'title' => 'Transactions',
            'status' => 'Transactions',
            'total' => number_format(DB::table('transactions')->whereNot('status','initiated')->where('user_id',request()->input('user_id'))->count()),
            'today' => number_format(DB::table('transactions')->whereNot('status','initiated')->where('user_id',request()->input('user_id'))->whereDate('date',Carbon::today())->count()),
            'amount' => number_format(DB::table('transactions')->whereNot('status','initiated')->where('user_id',request()->input('user_id'))->sum('amount') ?? '0',2),
            'trx' => $trx
        ];
        return view('admins.transactions',$response);
    }
    // Deposits
    public function Deposits($status){
        switch($status){
            case 'pending':
                $title='Pending Deposits';
                $TodayTitle='Today`s Pending Deposits';
                break;
            case 'success':
                $title='Successfull Deposits';
                $TodayTitle='Today`s Successfull Deposits';
                break;
            default:
            $title=$status." Deposits";
            $TodayTitle='Today`s Rejected Deposits';
        }
        $trx=DB::table('transactions')->where('status',$status)->where('type','deposit')->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $user=DB::table('users')->where('id',$each->user_id)->first();
            $each->photo=$user->photo;
            $each->username=$user->username;
            $each->frame=Carbon::parse($each->date)->diffForHumans();
           switch($each->type){
            case 'deposit':
                 $each->desc='Bank Sent From';
                 $each->details=json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            case 'withdrawal':
                $each->desc='Bank Details';
                 $each->details=json_decode($each->json)->AccountNumber.' / '.json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            default:
                $each->desc='Transaction Details';
                 $each->details=json_decode($each->body)->admin;
                 break;
           }
           $each->ApproveURL=url('admins/get/transaction/approve?id='.$each->id.'');
            $each->RejectURL=url('admins/get/transaction/reject?id='.$each->id.'');
            return $each;
        });
        $response=[
            'title' => 'Transactions',
            'status' => 'Transactions',
            'total' => number_format(DB::table('transactions')->where('type','deposit')->where('status',$status)->count()),
            'today' => number_format(DB::table('transactions')->where('type','deposit')->where('status',$status)->whereDate('date',Carbon::today())->count()),
            'amount' => number_format(DB::table('transactions')->where('type','deposit')->where('status',$status)->sum('amount') ?? '0',2),
            'trx' => $trx,
            'status' => $status,
            'title' => $title,
            'TodayTitle' => $TodayTitle,
            'SearchURL' => url('admins/search/deposits/'.$status.'')
        ];
        return view('admins.deposits',$response);
    }
    // Filter Deposits
    public function FilterDeposits($status){
        switch($status){
            case 'pending':
                $title='Pending Deposits';
                $TodayTitle='Today`s Pending Deposits';
                break;
            case 'success':
                $title='Successfull Deposits';
                $TodayTitle='Today`s Successfull Deposits';
                break;
            default:
            $title=$status." Deposits";
            $TodayTitle='Today`s Rejected Deposits';
        }
        $trx=DB::table('transactions')->where('status',$status)->where('type','deposit')->where('user_id',request()->input('user_id'))->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $user=DB::table('users')->where('id',$each->user_id)->first();
            $each->photo=$user->photo;
            $each->username=$user->username;
            $each->frame=Carbon::parse($each->date)->diffForHumans();
           switch($each->type){
            case 'deposit':
                 $each->desc='Bank Sent From';
                 $each->details=json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            case 'withdrawal':
                $each->desc='Bank Details';
                 $each->details=json_decode($each->json)->AccountNumber.' / '.json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            default:
                $each->desc='Transaction Details';
                 $each->details=json_decode($each->body)->admin;
                 break;
           }
           $each->ApproveURL=url('admins/get/transaction/approve?id='.$each->id.'');
            $each->RejectURL=url('admins/get/transaction/reject?id='.$each->id.'');
            return $each;
        });
        $response=[
            'title' => 'Transactions',
            'status' => 'Transactions',
            'total' => number_format(DB::table('transactions')->where('type','deposit')->where('status',$status)->where('user_id',request()->input('user_id'))->count()),
            'today' => number_format(DB::table('transactions')->where('type','deposit')->where('status',$status)->where('user_id',request()->input('user_id'))->whereDate('date',Carbon::today())->count()),
            'amount' => number_format(DB::table('transactions')->where('type','deposit')->where('status',$status)->where('user_id',request()->input('user_id'))->sum('amount') ?? '0',2),
            'trx' => $trx,
            'status' => $status,
            'title' => $title,
            'TodayTitle' => $TodayTitle,
            'SearchURL' => url('admins/search/deposits/'.$status.'')
        ];
        return view('admins.deposits',$response);
    }
      // Withdrawals
    public function Withdrawals($status){
        switch($status){
            case 'pending':
                $title='Pending Withdrawals';
                $TodayTitle='Today`s Pending Withdrawals';
                break;
            case 'success':
                $title='Successfull Withdrawals';
                $TodayTitle='Today`s Successfull Withdrawals';
                break;
            default:
            $title=$status." Withdrawals";
            $TodayTitle='Today`s Rejected Withdrawals';
        }
        $trx=DB::table('transactions')->where('status',$status)->where('type','withdrawal')->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $user=DB::table('users')->where('id',$each->user_id)->first();
            $each->photo=$user->photo;
            $each->username=$user->username;
            $each->frame=Carbon::parse($each->date)->diffForHumans();
           switch($each->type){
            case 'deposit':
                 $each->desc='Bank Sent From';
                 $each->details=json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            case 'withdrawal':
                $each->desc='Bank Details';
                 $each->details=json_decode($each->json)->AccountNumber.' / '.json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            default:
                $each->desc='Transaction Details';
                 $each->details=json_decode($each->body)->admin;
                 break;
           }
           $each->ApproveURL=url('admins/get/transaction/approve?id='.$each->id.'');
            $each->RejectURL=url('admins/get/transaction/reject?id='.$each->id.'');
            return $each;
        });
        $response=[
            'title' => 'Transactions',
            'status' => 'Transactions',
            'total' => number_format(DB::table('transactions')->where('type','withdrawal')->where('status',$status)->count()),
            'today' => number_format(DB::table('transactions')->where('type','withdrawal')->where('status',$status)->whereDate('date',Carbon::today())->count()),
            'amount' => number_format(DB::table('transactions')->where('type','withdrawal')->where('status',$status)->sum('amount') ?? '0',2),
            'trx' => $trx,
            'status' => $status,
            'title' => $title,
            'TodayTitle' => $TodayTitle,
            'SearchURL' => url('admins/search/withdrawals/'.$status.'')
        ];
        return view('admins.withdrawals',$response);
    }
      // Filter Withdrawals
    public function FilterWithdrawals($status){
        switch($status){
            case 'pending':
                $title='Pending Withdrawals';
                $TodayTitle='Today`s Pending Withdrawals';
                break;
            case 'success':
                $title='Successfull Withdrawals';
                $TodayTitle='Today`s Successfull Withdrawals';
                break;
            default:
            $title=$status." Withdrawals";
            $TodayTitle='Today`s Rejected Withdrawals';
        }
        $trx=DB::table('transactions')->where('status',$status)->where('user_id',request()->input('user_id'))->where('type','withdrawal')->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $user=DB::table('users')->where('id',$each->user_id)->first();
            $each->photo=$user->photo;
            $each->username=$user->username;
            $each->frame=Carbon::parse($each->date)->diffForHumans();
           switch($each->type){
            case 'deposit':
                 $each->desc='Bank Sent From';
                 $each->details=json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            case 'withdrawal':
                $each->desc='Bank Details';
                 $each->details=json_decode($each->json)->AccountNumber.' / '.json_decode($each->json)->BankName.' / '.json_decode($each->json)->AccountName;
                 break;
            default:
                $each->desc='Transaction Details';
                 $each->details=json_decode($each->body)->admin;
                 break;
           }
           $each->ApproveURL=url('admins/get/transaction/approve?id='.$each->id.'');
            $each->RejectURL=url('admins/get/transaction/reject?id='.$each->id.'');
            return $each;
        });
        $response=[
            'title' => 'Transactions',
            'status' => 'Transactions',
            'total' => number_format(DB::table('transactions')->where('type','withdrawal')->where('user_id',request()->input('user_id'))->where('status',$status)->count()),
            'today' => number_format(DB::table('transactions')->where('type','withdrawal')->where('user_id',request()->input('user_id'))->where('status',$status)->whereDate('date',Carbon::today())->count()),
            'amount' => number_format(DB::table('transactions')->where('type','withdrawal')->where('user_id',request()->input('user_id'))->where('status',$status)->sum('amount') ?? '0',2),
            'trx' => $trx,
            'status' => $status,
            'title' => $title,
            'TodayTitle' => $TodayTitle,
            'SearchURL' => url('admins/search/withdrawals/'.$status.'')
        ];
        return view('admins.withdrawals',$response);
    }
//    Add Package
    public function AddPackage(){
        return view('admins.packages.add');
    }
    // Manage Packages
    public function ManagePackages(){
        $packages=DB::table('packages')->where('status','active')->orderBy('cost','asc')->paginate(10);
        $packages->getCollection()->transform(function($each){
            $each->svg=json_decode($each->svg);
            $each->badge=json_decode($each->badge);
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->daily=($each->return*$each->cost)/100;
            return $each;
        });
        return view('admins.packages.manage',[
            'packages' => $packages
        ]);
    }
    // Edit Package
    public function EditPackage(){
         $package=DB::table('packages')->where('id',request()->input('id'))->orderBy('cost','asc')->first();
       
            $package->svg=json_decode($package->svg);
            $package->badge=json_decode($package->badge);
            $package->frame=Carbon::parse($package->date)->diffForHumans();
            $package->daily=($package->return*$package->cost)/100;
            $rgb=$package->badge->color;
            $rgb=str_replace(['rgb(',')'],'',$rgb);
            list($r,$g,$b)=explode(',',$rgb);
            $package->hex=sprintf('#%02x%02x%02x',$r,$g,$b);

          
        return view('admins.packages.edit',[
            'pkg' => $package
        ]);
    }
    // All users
    public function AllUsers(){
       if(request()->has('id')){
         $users=DB::table('users')->where('id',request()->input('id'))->orderBy('date','desc')->paginate(10);
       }
        else{
             $users=DB::table('users')->orderBy('date','desc')->paginate(10);
        }
        $users->getCollection()->transform(function($each){
            $each->TotalDeposit=DB::table('transactions')->where('user_id',$each->id)->where('type','deposit')->where('status','success')->sum('amount');
            $each->TotalWithdrawal=DB::table('transactions')->where('user_id',$each->id)->where('type','withdrawal')->where('status','success')->sum('amount');
            $each->LastDeposit=DB::table('transactions')->where('user_id',$each->id)->where('type','deposit')->where('status','success')->orderBy('date','desc')->first()->amount ?? '0';
            $each->ref=json_decode($each->ref);
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->TotalRef=DB::table('users')->where('ref->username',$each->username)->count() ?? 10;
            $each->TotalBanks=DB::table('banks')->where('user_id',$each->id)->count();
            $each->TotalPackages=DB::table('purchased')->where('user_id',$each->id)->count() ?? 0;
            $each->LastOnline=Carbon::parse($each->last_online)->diffInMinutes();
             
            return $each;
        });
        return view('admins.users',[
            'total' => DB::table('users')->count(),
            'today' => DB::table('users')->whereDate('date',Carbon::today())->count(),
            'users' => $users,
            'Online' => DB::table('users')->where('last_online','>=',Carbon::now()->subMinutes(5))->count(),
         ]);
    }
     // promoters
    public function Promoters(){
       if(request()->has('id')){
         $users=DB::table('users')->where('id',request()->input('id'))->orderBy('date','desc')->paginate(10);
       }
        else{
             $users=DB::table('users')->where('type','promoter')->orderBy('date','desc')->paginate(10);
        }
        $users->getCollection()->transform(function($each){
            $each->TotalDeposit=DB::table('transactions')->where('user_id',$each->id)->where('type','deposit')->where('status','success')->sum('amount');
            $each->TotalWithdrawal=DB::table('transactions')->where('user_id',$each->id)->where('type','withdrawal')->where('status','success')->sum('amount');
            $each->LastDeposit=DB::table('transactions')->where('user_id',$each->id)->where('type','deposit')->where('status','success')->orderBy('date','desc')->first()->amount ?? '0';
            $each->ref=json_decode($each->ref);
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->TotalRef=DB::table('users')->where('ref->username',$each->username)->count() ?? 10;
            $each->TotalBanks=DB::table('banks')->where('user_id',$each->id)->count();
            $each->TotalPackages=DB::table('purchased')->where('user_id',$each->id)->count() ?? 0;
            $each->LastOnline=Carbon::parse($each->last_online)->diffInMinutes();
             
            return $each;
        });
        return view('admins.promoters',[
            'total' => DB::table('users')->where('type','promoter')->count(),
            'today' => DB::table('users')->where('type','promoter')->whereDate('date',Carbon::today())->count(),
            'users' => $users,
            'Online' => DB::table('users')->where('type','promoter')->where('last_online','>=',Carbon::now()->subMinutes(5))->count(),
         ]);
    }
    // user
    public function User(){
       
         $each=DB::table('users')->where('id',request()->input('id'))->orderBy('date','desc')->first();
      
        
        
            $each->TotalDeposit=DB::table('transactions')->where('user_id',$each->id)->where('type','deposit')->where('status','success')->sum('amount');
            $each->TotalWithdrawal=DB::table('transactions')->where('user_id',$each->id)->where('type','withdrawal')->where('status','success')->sum('amount');
            $each->LastDeposit=DB::table('transactions')->where('user_id',$each->id)->where('type','deposit')->where('status','success')->orderBy('date','desc')->first()->amount ?? '0';
            $each->ref=json_decode($each->ref);
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->TotalRef=DB::table('users')->where('ref->username',$each->username)->count() ?? 10;
            $each->TotalBanks=DB::table('banks')->where('user_id',$each->id)->count();
            $each->TotalPackages=DB::table('purchased')->where('user_id',$each->id)->count() ?? 0;
            $each->LastOnline=Carbon::parse($each->last_online)->diffInMinutes();
            $each->TotalReferralCommission=DB::table('transactions')->where('type','commission')->where('user_id',$each->id)->sum('amount');
           
        return view('admins.user',[
           
            'user' => $each,
            
         ]);
    }
    // notifications
    public function Notifications(){
        $notifications=DB::table('notifications')->orderBy('date','desc')->paginate(10);
        $notifications->getCollection()->transform(function($each){
            $each->head=json_decode($each->head);
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->status=json_decode($each->status);
            $each->body=json_decode($each->body);
            return $each;
        });
        return view('admins.notifications',[
            'notifications' => $notifications,
            'unread' => DB::table('notifications')->where('status->admin','unread')->count()
        ]);
    }
    // filter users
  
    public function FilterUsers($status){
       if(request()->has('id')){
         $users=DB::table('users')->where('id',request()->input('id'))->where('status',$status)->orderBy('date','desc')->paginate(10);
       }
        else{
             $users=DB::table('users')->where('status',$status)->orderBy('date','desc')->paginate(10);
        }
        $users->getCollection()->transform(function($each){
            $each->TotalDeposit=DB::table('transactions')->where('user_id',$each->id)->where('type','deposit')->where('status','success')->sum('amount');
            $each->TotalWithdrawal=DB::table('transactions')->where('user_id',$each->id)->where('type','withdrawal')->where('status','success')->sum('amount');
            $each->LastDeposit=DB::table('transactions')->where('user_id',$each->id)->where('type','deposit')->where('status','success')->orderBy('date','desc')->first()->amount ?? '0';
            $each->ref=json_decode($each->ref);
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->TotalRef=DB::table('users')->where('ref->username',$each->username)->count() ?? 10;
            $each->TotalBanks=DB::table('banks')->where('user_id',$each->id)->count();
            $each->TotalPackages=DB::table('purchased')->where('user_id',$each->id)->count() ?? 0;
            $each->LastOnline=Carbon::parse($each->last_online)->diffInMinutes();
             
            return $each;
        });
        return view('admins.users',[
            'total' => DB::table('users')->where('status',$status)->count(),
            'today' => DB::table('users')->where('status',$status)->whereDate('date',Carbon::today())->count(),
            'users' => $users,
            'Online' => DB::table('users')->where('status',$status)->where('last_online','>=',Carbon::now()->subMinutes(5))->count(),
         ]);
    }
    // purchased packages
    public function PurchasedPackages(){
        $purchased=DB::table('purchased')->where('status','active')->orderBy('date','desc')->paginate(10);
        $purchased->getCollection()->transform(function($each){
            $each->pkg=json_decode($each->json);
            $each->svg=json_decode($each->pkg->svg);
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->next_reward=Carbon::parse($each->last_reward)->addDay()->format('d M Y, H:i:s');
            return $each;
        });
        return view('admins.packages.purchased',[
            'purchased' => $purchased
        ]);
    }
    // system logs
    public function SystemLogs(){
        $logs=DB::table('logs')->orderBy('date','desc')->paginate(10);
        $logs->getCollection()->transform(function($each){
            $each->user=DB::table('users')->where('id',$each->user_id)->first();
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        return view('admins.logs.logs',[
            'logs' => $logs
        ]);
    }
    //logout
    public function Logout(){
        Auth::guard('admins')->logout();
       return redirect()->to('admins/login');

    }
    // reset password logs
    public function ResetPasswordLogs(){
        $logs=DB::table('otp')->orderBy('date','desc')->paginate(10);
        $logs->getCollection()->transform(function($each){
            $each->photo=DB::table('users')->where('email',$each->email)->first()->photo;
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        return view('admins.logs.password',[
            'logs' => $logs
        ]);
    }
    // add task
    public function AddTask(){
        return view('admins.tasks.add');
    }
    // manage tasks
    public function ManageTasks(){
        $tasks=DB::table('tasks')->where('status','active')->orderBy('date','desc')->paginate(10);
        $tasks->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
        return $each;
        });
        return view('admins.tasks.manage',[
            'tasks' => $tasks
        ]);
    }
    // edit task
    public function EditTask(){
        return view('admins.tasks.edit',[
            'task' => DB::table('tasks')->where('id',request()->input('id'))->first()
        ]);
    }
    // done tasks
    public function DoneTasks(){
        $done=DB::table('proofs')->orderBy('date','desc')->paginate(10);
        $done->getCollection()->transform(function($each){
            $user=DB::table('users')->where('id',$each->user_id)->first();
          $each->photo=$user->photo;
          $each->username=$user->username;
          $each->frame=Carbon::parse($each->date)->diffForHumans();
          $task=DB::table('tasks')->where('id',$each->task_id)->first();
          $each->head=$task->title ?? '';
          $each->link=$task->link ?? '';
          $each->proof=json_decode($each->json)->screenshot;
            $each->amount=json_decode($each->json)->reward ?? 0;
            return $each;
        });
        return view('admins.tasks.done',[
            'proofs' => $done
        ]);
    }
   
}
