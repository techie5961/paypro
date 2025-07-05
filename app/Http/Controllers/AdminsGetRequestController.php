<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminsGetRequestController extends Controller
{
    // Action transactions
    public function ActionTransactions($action){
        $trx=DB::table('transactions')->where('id',request()->input('id'))->first();
        return view('components.api',[
            'TrxActionConfirm' => true,
            'action' => $action,
            'amount' => number_format($trx->amount,2),
            'username' => DB::table('users')->where('id',$trx->user_id)->first()->username,
            'type' => $trx->type,
            'ConfirmURL' => url('admins/get/transaction/confirm/'.$action.'?id='.request()->input('id').'')
        ]);
    }
    // Confirm Transaction
    public function ConfirmTransaction($action){
        if(Auth::guard('admins')->user()->role !== 'Master Admin'){
            return response()->json([
                'message' => 'You dont have the privileges to approve transactions',
                'status' => 'error'
            ]);
        }
        $trx=DB::table('transactions')->where('id',request()->input('id'))->first();
        $type=$trx->type;
        switch($action){
            case 'approve':
                $status='success';
                $actioned='approved';
                break;
            default:
                $status='rejected';
                $actioned='Rejected';

        }
        DB::table('transactions')->where('id',request()->input('id'))->update([
            'status' => $status,
            'date' => Carbon::now()
        ]);
        if($type == 'deposit' && $action == 'approve'){
            DB::table('users')->where('id',$trx->user_id)->update([
                'balance' => DB::raw('balance + '.$trx->amount.'')
            ]);
        }
        if($type == 'withdrawal' && $action == 'reject'){
            DB::table('users')->where('id',$trx->user_id)->update([
                'balance' => DB::raw('balance + '.$trx->amount.'')
            ]);
        }
        return response()->json([
            'message' => ''.ucfirst($type).' Request '.$actioned.' successfully',
            'status' => 'success'
        ]);
    }
    // login as user
    public function LoginAsUser(){
        Auth::guard('users')->loginUsingId(request()->input('id'));
        return redirect()->to('users/dashboard');
    }
    // mark as read
    public function MarkAsRead(){
        DB::table('notifications')->where('id',request()->input('id'))->update([
            'status->admin' => 'read'
        ]);
        return redirect()->to('admins/notifications');
    }
    // mark all as read
    public function MarkAllAsRead(){
          DB::table('notifications')->update([
            'status->admin' => 'read'
        ]);
        return redirect()->to('admins/notifications');
    }
    // mark as promoter
    public function MarkAsPromoter(){
        $user=DB::table('users')->where('id',request()->input('id'))->first();
        if($user->type == 'promoter'){
            DB::table('users')->where('id',request()->input('id'))->update([
                'type' => 'user'
            ]);
            return response()->json([
                'message' => 'User unmarked successfully',
                'status' => 'success'
            ]);
        }
         else{
             DB::table('users')->where('id',request()->input('id'))->update([
                'type' => 'promoter'
            ]);
            return response()->json([
                'message' => 'User marked successfully',
                'status' => 'success'
            ]);
         }
    }
     // delete task
    public function DeleteTask(){
        DB::table('tasks')->where('id',request()->input('id'))->delete();
        return redirect()->to('admins/tasks/manage');
    }
}
