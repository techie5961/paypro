<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class UsersPostRequestController extends Controller
{
    // Register
    public function Register(){
        $username=str_replace(' ','_',request()->input('username'));
      if(DB::table('users')->where('username',$username)->count() > 0){
        return response()->json([
            'message' => 'Username has been taken',
            'status' => 'error'
        ]);
      }
      if(DB::table('users')->where('email',request()->input('email'))->count() > 0){
        return response()->json([
            'message' => 'email address has been taken',
            'status' => 'error'
        ]);
      }
       if(!Hash::check(request()->input('confirm'),Hash::make(request()->input('password')))){
        return response()->json([
            'message' => 'Password and Confirm password must match',
            'status' => 'error'
        ]);
       }
       DB::table('users')->insert([
        'name' => request()->input('name'),
        'username' => request()->input('username'),
        'email' => request()->input('email'),
        'password' => Hash::make(request()->input('password')),
        'last_online' => Carbon::now(),
        'date' => Carbon::now(),
        'balance' => '50'

       ]);
       DB::table('transactions')->insert([
                    'uniqid' => strtoupper(uniqid('trx-')),
                    'user_id' => DB::table('users')->where('username',request()->input('username'))->where('email',request()->input('email'))->first()->id,
                    'type' => 'bonus',
                    'class' => 'credit',
                    'amount' => 50,
                    'head' => 'Registration Bonus',
                    'body' => json_encode([
                        'user' => 'Registration Bonus',
                        'admin' => 'Registration Bonus'
                    ]),
                    'status' => 'success',
                    'date' => Carbon::now()
                ]);
       if(request()->has('ref')){
        DB::table('users')->where('username',request()->input('username'))->where('email',request()->input('email'))->update([
          'ref->username' => request()->input('ref')
        ]);
       }
      //  notifications
      DB::table('notifications')->insert([
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>',
          'head' => json_encode([
            'user' => 'Account Signup',
            'admin' => 'Account Signup'
          ]),
          'body' => json_encode([
            'user' => 'you joined the platform',
            'admin' => '@'.request()->input('username').' just registered on the site'
          ]),
          'status' => json_encode([
            'user' => 'unread',
            'admin' => 'unread'
          ]),
          'date' => Carbon::now()
      ]);
       return response()->json([
        'message' => 'Registration successfull',
        'status' => 'success',
        'url' => url('login')
       ]);
    }
    // LOGIN
    public function Login(){
      
      if(DB::table('users')->where('email',str_replace(' ','_',request()->input('id')))->orWhere('username',str_replace(' ','_',request()->input('id')))->count() <= 0){
        return response()->json([
          'message' => 'User not found',
          'status' => 'error'
        ]);
      }
      $select=DB::table('users')->where('username',str_replace(' ','_',request()->input('id')))->orWhere('email',str_replace(' ','_',request()->input('id')))->first();
     
      if(!Hash::check(request()->input('password'),$select->password)){
        return response()->json([
          'message' => 'Invalid Password',
          'status' => 'error'
        ]);
      }

      Auth::guard('users')->loginUsingId($select->id);
      DB::table('logs')->insert([
        'user_id'=> $select->id,
       
          'ip' =>request()->ip(),
          'date' => Carbon::now()
          
       
      ]);
      return response()->json([
        'message' => 'Login Successfull',
        'status' => 'success',
        'url' => url('users/dashboard')
      ]);

    }
    // complete deposit
    public function CompleteDeposit($uniqid){
      if(DB::table('transactions')->where('uniqid',$uniqid)->where('status','initiated')->count() == 0){
        return response()->json([
          'message' => 'Invalid transaction reference',
          'status' => 'error'
        ]);
      }
       else{
        DB::table('transactions')->where('uniqid',$uniqid)->where('status','initiated')->update([
          'status' => 'pending',
          'date' => Carbon::now(),
          'json' => json_encode([
            'AccountName' => request()->input('AccountName'),
            'BankName' => request()->input('BankName')
          ])
          ]);
          //  notifications
      DB::table('notifications')->insert([
        'user_id' => Auth::guard('users')->user()->id,
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M232,198.65V240a8,8,0,0,1-16,0V198.65A74.84,74.84,0,0,0,192,144v58.35a8,8,0,0,1-14.69,4.38l-10.68-16.31c-.08-.12-.16-.25-.23-.38a12,12,0,0,0-20.89,11.83l22.13,33.79a8,8,0,0,1-13.39,8.76l-22.26-34-.24-.38c-.38-.66-.73-1.33-1.05-2H56a8,8,0,0,1-8-8V96A16,16,0,0,1,64,80h48v48a8,8,0,0,0,16,0V80h48a16,16,0,0,1,16,16v27.62A90.89,90.89,0,0,1,232,198.65ZM128,35.31l18.34,18.35a8,8,0,0,0,11.32-11.32l-32-32a8,8,0,0,0-11.32,0l-32,32A8,8,0,0,0,93.66,53.66L112,35.31V80h16Z"></path></svg>',
          'head' => json_encode([
            'user' => 'Deposit Request',
            'admin' => 'Deposit Request'
          ]),
          'body' => json_encode([
            'user' => 'You submitted a deposit request',
            'admin' => '@'.Auth::guard('users')->user()->username.' just submitted a deposit request'
          ]),
          'status' => json_encode([
            'user' => 'unread',
            'admin' => 'unread'
          ]),
          'date' => Carbon::now()
      ]);
          return response()->json([
            'message' => 'Deposit Request submitted successfully',
            'status' => 'success',
            'url' => url('users/deposit/receipt?uniqid='.$uniqid.'')
          ]);
       }
    }
    // add bank
    public function AddBank(){
      if(DB::table('banks')->where('user_id',Auth::guard('users')->user()->id)->count() >= 5){
        return response()->json([
          'message' => 'You can link a maximum of 5 bank accounts',
          'status' => 'error'
        ]);
      }
       if(DB::table('banks')->where('json->BankName',request()->input('BankName'))->where('json->AccountNumber',request()->input('AccountNumber'))->where('json->AccountName',request()->input('AccountName'))->count() > 0){
        return response()->json([
          'message' => 'Bank account already exist',
          'status' => 'error'
        ]);

       }
       DB::table('banks')->insert([
        'user_id' => Auth::guard('users')->user()->id,
         'uniqid' => strtoupper(uniqid('BNK-')),
        'json' => json_encode([
         
          'AccountNumber' => request()->input('AccountNumber'),
          'BankName' => request()->input('BankName'),
          'AccountName' => request()->input('AccountName')
        ]),
        'date' => Carbon::now()
      ]);
        //  notifications
      DB::table('notifications')->insert([
        'user_id' => Auth::guard('users')->user()->id,
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208ZM16.3,98.18a8,8,0,0,1,3.51-9l104-64a8,8,0,0,1,8.38,0l104,64A8,8,0,0,1,232,104H208v64h16a8,8,0,0,1,0,16H32a8,8,0,0,1,0-16H48V104H24A8,8,0,0,1,16.3,98.18ZM144,160a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Zm-48,0a8,8,0,0,0,16,0V112a8,8,0,0,0-16,0Z"></path></svg>',
          'head' => json_encode([
            'user' => 'Bank Account',
            'admin' => 'bank Account'
          ]),
          'body' => json_encode([
            'user' => 'You linked a bank account',
            'admin' => '@'.Auth::guard('users')->user()->username.' just linked a bank account'
          ]),
          'status' => json_encode([
            'user' => 'unread',
            'admin' => 'unread'
          ]),
          'date' => Carbon::now()
      ]);
      return response()->json([
        'message' => 'Bank account linked successfully',
        'status' => 'success',
        'url' => url('users/bank')
      ]);
    }
    // update password
    public function PasswordUpdate(){
      if(!Hash::check(request()->input('current'),Auth::guard('users')->user()->password)){
        return response()->json([
          'message' => 'Invalid account password',
          'status' => 'error'
        ]);
      }
      if(!Hash::check(request()->input('confirm'),Hash::make(request()->input('new')))){
        return response()->json([
          'message' => 'New password and Confirm password must match',
          'status' => 'error'
        ]);
      }
      DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'password' => Hash::make(request()->input('new'))
      ]);
       //  notifications
      DB::table('notifications')->insert([
        'user_id' => Auth::guard('users')->user()->id,
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm29.52,146.39a4,4,0,0,1-3.66,5.61H102.14a4,4,0,0,1-3.66-5.61L112,139.72a32,32,0,1,1,32,0Z"></path></svg>',
          'head' => json_encode([
            'user' => 'Password Update',
            'admin' => 'Password Update'
          ]),
          'body' => json_encode([
            'user' => 'You updated your account password',
            'admin' => '@'.Auth::guard('users')->user()->username.' just updated account password'
          ]),
          'status' => json_encode([
            'user' => 'unread',
            'admin' => 'unread'
          ]),
          'date' => Carbon::now()
      ]);
      return response()->json([
        'message' => 'Account Password updated success',
        'status' => 'success'
      ]);
    }
    // update profile photo 
    public function UpdateProfilePhoto(){
      $name=time().'.'.request()->file('photo')->getClientOriginalExtension();
      if(request()->file('photo')->move(public_path('images/users'),$name)){
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
          'photo' => $name
        ]);
        //  notifications
      DB::table('notifications')->insert([
        'user_id' => Auth::guard('users')->user()->id,
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#fcfcfc" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40ZM156,88a12,12,0,1,1-12,12A12,12,0,0,1,156,88Zm60,112H40V160.69l46.34-46.35a8,8,0,0,1,11.32,0h0L165,181.66a8,8,0,0,0,11.32-11.32l-17.66-17.65L173,138.34a8,8,0,0,1,11.31,0L216,170.07V200Z"></path></svg>',
          'head' => json_encode([
            'user' => 'Profile photo update',
            'admin' => 'Profile photo update'
          ]),
          'body' => json_encode([
            'user' => 'You updated your profile photo',
            'admin' => '@'.Auth::guard('users')->user()->username.' just updated his/her profile photo'
          ]),
          'status' => json_encode([
            'user' => 'unread',
            'admin' => 'unread'
          ]),
          'date' => Carbon::now()
      ]);
        return response()->json([
          'message' => 'Profile picture updated successfully',
          'status' => 'success',
          'url' => url('users/profile'),
          'pix' => asset('images/users/'.$name.'')
        ]);
      }
    
    }
    // live chat
    public function SendMessage(){
    
      if(!request()->has('chat_id')){
        $uniqid=strtoupper(uniqid('CHT-'));

        DB::table('chats')->insert([
          'uniqid' => $uniqid,
          'user_id' => Auth::guard('users')->user()->id,
          'status' => 'active',
          'updated' => Carbon::now(),
          'date' => Carbon::now(),
          'typing' => json_encode([
            'admin' => Carbon::now(),
            'user' => Carbon::now()
          ])
        ]);
         DB::table('messages')->insert([
        'chat_id' => DB::table('chats')->where('uniqid',$uniqid)->where('user_id',Auth::guard('users')->user()->id)->first()->id,
         'sender_id' => Auth::guard('users')->user()->id,
         'sender_type' => 'user',
         'message' => request()->input('message'),
         'status' => 'unread',
         'date' => Carbon::now()
      ]);
      DB::table('messages')->insert([
        'chat_id' => DB::table('chats')->where('uniqid',$uniqid)->where('user_id',Auth::guard('users')->user()->id)->first()->id,
         'sender_type' => 'bot',
         'message' => 'Hi '.Auth::guard('users')->user()->username.'! 👋, Thanks for reaching out to us.We have received your message and one of our support agents will be with you shortly. ',
         'status' => 'unread',
         'date' => Carbon::now()
      ]);
      $chat_id=DB::table('chats')->where('uniqid',$uniqid)->where('user_id',Auth::guard('users')->user()->id)->first()->id;
      $messages=DB::table('messages')->where('chat_id',$chat_id)->orderBy('date','desc')->limit(100)->get();
     $messages->transform(function($each){
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        return $each;
      });
     
    $chats=view('components.api',[
        'ChatMessages' => true,
        'messages' => $messages
    ])->render();
    $admin_id=DB::table('chats')->where('id',$chat_id)->first()->admin_id ?? '0';
      if($admin_id == 0){
       $head='<img src="'.asset('images/bot.svg').'"> <b>PayPro AI</b>';
      } else{
        $admin=DB::table('admins')->where('id',$admin_id)->first();
$head='<img src="'.asset('images/admins/'.$admin->photo.'').'"> <b>'.$admin->name.'</b>';
      }
    return response()->json([
      'chats' => $chats,
      'chat_id' => $chat_id,
      'head' => $head
    ]);
      } else{
         DB::table('messages')->insert([
        'chat_id' => DB::table('chats')->where('id',request()->input('chat_id'))->where('user_id',Auth::guard('users')->user()->id)->first()->id,
         'sender_id' => Auth::guard('users')->user()->id,
         'sender_type' => 'user',
         'message' => request()->input('message'),
         'status' => 'unread',
         'date' => Carbon::now()
      ]);
      $chat_id=request()->input('chat_id');
      $messages=DB::table('messages')->where('chat_id',$chat_id)->orderBy('date','asc')->limit(100)->get();
      $messages->transform(function($each){
        $each->frame=Carbon::parse($each->date)->diffForHumans();
        return $each;
      });
      $admin_id=DB::table('chats')->where('id',$chat_id)->first()->admin_id ?? '0';
      if($admin_id == 0){
       $head='<img src="'.asset('images/bot.svg').'"> <b>PayPro AI</b>';
      } else{
        $admin=DB::table('admins')->where('id',$admin_id)->first();
$head='<img src="'.asset('images/admins/'.$admin->photo.'').'"> <b>'.$admin->name.'</b>';
      }
     
    $chats=view('components.api',[
        'ChatMessages' => true,
        'messages' => $messages
    ])->render();
    return response()->json([
      'chats' => $chats,
      'chat_id' => $chat_id,
      'head' => $head
    ]);
      
      }
     
    }
    // forgot password validate mail
    public function ValidateMail(){
     $select=DB::table('users')->where('username',request()->input('id'))->orWhere('email',request()->input('id'));
     if($select->count() > 0){
      $user=$select->first();
      $email=$user->email;
      $id=$user->id;
      $otp=random_int(1000,9999);
      DB::table('otp')->insert([
        'user_id' => $id,
        'otp' => $otp,
        'email' => $email,
        'date' => Carbon::now()
      ]);
      $mail=Mail::send('mail.forgot',[
        'otp' => $otp
      ],function($message) use($email){
        $message->to($email)->subject('Forgot Password');
      });
      return response()->json([
        'message' => 'OTP sent successfully,please check your spam folder if you did not see it',
        'status' => 'success',
        'url' => url('forgot/otp?email='.$email.'')
      ]);
      
      
     } else{
      return response()->json([
        'message' => 'User not Found',
        'status' => 'error'
      ]);
     }
    }
    // validate otp
    public function ValidateOTP(){
      $otp=request()->input('otp1').request()->input('otp2').request()->input('otp3').request()->input('otp4');
      $select=DB::table('otp')->where('otp',$otp)->where('status','active')->where('email',request()->input('email'));
      if($select->count() > 0){
        $date=$select->first()->date;
        if(Carbon::parse($date)->diffInMinutes() > 10){
          return response()->json([
            'message' => "Expired OTP Code",
            'status' => 'error'
          ]);
        }
        
        return response()->json([
          'message' => 'OTP Verified successfully',
          'status' => 'success',
          'url' => url('forgot/reset?otp='.$otp.'&email='.request()->input('email').'')
        ]);
      } else{
        return response()->json([
          'message' => 'Invalid or Expired OTP',
          'status' => 'error'
        ]);
      }
    }
    // reset password 
    public function ResetPassword(){
      $select=DB::table('otp')->where('otp',request()->input('otp'))->where('status','active');
      if($select->count() == 0){
         return response()->json([
          'message' => 'Invalid Session',
          'status' => 'error'
        ]); 
      }
      $select=$select->first();
      if(Carbon::parse($select->date)->diffInMinutes() > 10){
        return response()->json([
          'message' => 'Invalid Session',
          'status' => 'error'
        ]);
      }
       if(!Hash::check(request()->input('confirm'),Hash::make(request()->input('new')))){
        return response()->json([
          'message' => 'New Password and Confirm Password must match',
          'status' => 'error'
        ]);
       }
       $update=DB::table('users')->where('email',request()->input('email'))->update([
        'password' => Hash::make(request()->input('new'))
       ]);
      if($update){
        DB::table('otp')->where('otp',request()->input('otp'))->update([
          'status' => 'redeemed'
        ]);
         return response()->json([
        'message' => 'Password reset successfully',
        'status' => 'success',
        'url' => url('login')
       ]);
      }
    }
    // submit task
    public function SubmitTask(){
      if(DB::table('proofs')->where('task_id',request()->input('id'))->count() > 0){
        return response()->json([
          'message' => 'You have performed this task before',
          'status' => 'error'
        ]);
      }

    $name=time().'.'.request()->file('screenshot')->getClientOriginalExtension();
    if(request()->file('screenshot')->move(public_path('proofs'),$name)){
      $task=DB::table('tasks')->where('id',request()->input('id'))->first();
      DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'balance' => DB::raw('balance + '.$task->reward.'')
      ]);
      DB::table('tasks')->where('id',request()->input('id'))->update([
        'done' => DB::raw('done + 1')
      ]);
       DB::table('transactions')->insert([
                    'uniqid' => strtoupper(uniqid('trx-')),
                    'user_id' => Auth::guard('users')->user()->id,
                    'type' => 'task',
                    'class' => 'credit',
                    'amount' => $task->reward,
                    'head' => 'Task Reward',
                    'body' => json_encode([
                        'user' => 'Task Reward',
                        'admin' => 'Task Reward'
                    ]),
                    'status' => 'success',
                    'date' => Carbon::now()
                ]);
      
        DB::table('users')->where('username',request()->input('username'))->where('email',request()->input('email'))->update([
          'ref->username' => request()->input('ref')
        ]);
      DB::table('proofs')->insert([
        'user_id' => Auth::guard('users')->user()->id,
        'task_id' => request()->input('id'),
        'uniqid' => strtoupper(uniqid('PRF-')),
        'json' => json_encode([
          'screenshot' => $name,
          'reward' => $task->reward
        ]),
        'status' => 'active',
        'date' => Carbon::now()
      ]);
      return response()->json([
        'message' => 'Task performed success',
        'status' => 'success',
        'url' => url('users/tasks')
      ]);
    }
    }
}
