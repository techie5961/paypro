<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersAuthController;
use App\Http\Controllers\UsersPostRequestController;
use App\Http\Controllers\UsersDashboardController;
use App\Http\Controllers\AdminsAuthController;
use App\Http\Controllers\AdminsDashboardController;
use App\Http\Controllers\AdminsPostRequestController;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UsersGetRequestController;
use App\Http\Controllers\AdminsGetRequestController;
use App\Http\Controllers\AdminsSearchRequestController;


Route::get('forgot',[
   UsersAuthController::class,'Forgot'
]);
Route::get('users/forgot',[
   UsersAuthController::class,'Forgot'
]);
Route::get('forgot/otp',[
   UsersAuthController::class,'ForgotOTP'
]);
Route::get('users/forgot/otp',[
   UsersAuthController::class,'ForgotOTP'
]);
Route::get('forgot/reset',[
    UsersAuthController::class,'ResetPassword'
]);
Route::get('users/forgot/reset',[
    UsersAuthController::class,'ResetPassword'
]);
Route::get('register',[
    UsersAuthController::class,'Register'
]);
Route::get('users/register',[
    UsersAuthController::class,'Register'
]);
Route::get('login',[
    UsersAuthController::class,'Login'
]);
Route::get('/',[
    UsersAuthController::class,'Login'
]);
Route::get('users/login',[
    UsersAuthController::class,'Login'
]);
Route::prefix('users')->group(function(){
    Route::get('dashboard',[
       UsersDashboardController::class,'Dashboard'
    ]);
    Route::get('deposit',[
        UsersDashboardController::class,'Deposit'
    ]);
    Route::get('get/deposit/initiate',[
        UsersGetRequestController::class,'DepositInitiate'
    ]);
    Route::get('deposit/complete',[
        UsersDashboardController::class,'CompleteDeposit'
    ]);
    Route::get('deposit/receipt',[
        UsersDashboardController::class,'DepositReceipt'
    ]);
    Route::get('packages',[
        UsersDashboardController::class,'PurchasePackages'
    ]);
    Route::get('get/purchase/package/process',[
        UsersGetRequestController::class,'PurchasePackage'
    ]);
    Route::get('get/package/purchase/confirm',[
        UsersGetRequestController::class,'ConfirmPurchase'
    ]);
    Route::get('packages/active',[
        UsersDashboardController::class,'ActivePackages'
    ]);
    Route::get('bank',[
        UsersDashboardController::class,'AddBank'
    ]);
    Route::get('get/bank/delete',[
        UsersGetRequestController::class,'DeleteBank'
    ]);
    Route::get('withdraw',[
        UsersDashboardController::class,'Withdraw'
    ]);
    Route::get('get/Withdrawal/process',[
        UsersGetRequestController::class,'Withdrawal'
    ]);
   Route::get('withdrawal/receipt',[
        UsersDashboardController::class,'WithdrawalReceipt'
    ]);
    Route::get('transactions',[
        UsersDashboardController::class,'Transactions'
    ]);
    Route::get('receipt',[
        UsersDashboardController::class,'Receipt'
    ]);
    Route::get('profile',[
        UsersDashboardController::class,'Profile'
    ]);
    Route::get('get/online',[
        UsersGetRequestController::class,'OnlineStatus'
    ]);
    Route::get('chat',[
        UsersDashboardController::class,'Chat'
    ]);
      Route::get('send/message',[
        UsersPostRequestController::class,'SendMessage'
         ]);
         Route::get('support',[
            UsersDashboardController::class,'Support'
         ]);
         Route::get('refer',[
            UsersDashboardController::class,'ReferAndEarn'
         ]);
         Route::get('referrals',[
            UsersDashboardController::class,'Referrals'
         ]);
         Route::get('notifications',[
            UsersDashboardController::class,'Notifications'
         ]);
         Route::get('get/notifications/mark/as/read',[
            UsersGetRequestController::class,'MarkAsRead'
         ]);
          Route::get('get/notifications/mark/all/as/read',[
            UsersGetRequestController::class,'MarkAllAsRead'
         ]);
         Route::get('get/notifications',function(){
            return UserNotifications();
         });
         Route::get('logout',[
            UsersDashboardController::class,'Logout'
         ]);

   






    // USERS POST REQUEST
    Route::prefix('post')->group(function(){
        Route::post('register/process',[
            UsersPostRequestController::class,'Register'
        ]);
        Route::post('login/process',[
            UsersPostRequestController::class,'Login'
        ]);
        Route::post('deposit/confirm/{uniqid}',[
            UsersPostRequestController::class,'CompleteDeposit'
        ]);
        Route::post('add/bank/process',[
            UsersPostRequestController::class,'AddBank'
        ]);
        Route::post('password/update',[
            UsersPostRequestController::class,'PasswordUpdate'
        ]);
        Route::post('upload/profile/photo/process',[
            UsersPostRequestController::class,'UpdateProfilePhoto'
        ]);
         Route::post('send/message',[
        UsersPostRequestController::class,'SendMessage'
         ]);
          Route::post('forgot/validate/mail/process',[
        UsersPostRequestController::class,'ValidateMail'
    ]);
    Route::post('forgot/validate/otp/process',[
        UsersPostRequestController::class,'ValidateOTP'
    ]);
    Route::post('forgot/reset/password/process',[
        UsersPostRequestController::class,'ResetPassword'
    ]);
    });
   
    
});

// ADMINS
Route::prefix('admins')->group(function(){
     Route::get('/',[
        AdminsAuthController::class,'Login'
    ]);
    Route::get('login',[
        AdminsAuthController::class,'Login'
    ]);
    Route::get('dashboard',[
        AdminsDashboardController::class,'Dashboard'
    ]);
    Route::get('site/settings',[
        AdminsDashboardController::class,'SiteSettings'
    ]);
    Route::get('bank/details',[
        AdminsDashboardController::class,'BankDetails'
    ]);
    Route::get('deposits/{status}',[
       AdminsDashboardController::class,'Deposits'
    ]);
     Route::get('withdrawals/{status}',[
       AdminsDashboardController::class,'Withdrawals'
    ]);
    Route::get('transactions',[
        AdminsDashboardController::class,'Transactions'
    ]);
    Route::get('transactions/filter',[
        AdminsDashboardController::class,'FilterTransactions'
    ]);
    Route::get('get/transaction/{action}',[
        AdminsGetRequestController::class,'ActionTransactions'
    ]);
    Route::get('get/transaction/confirm/{action}',[
        AdminsGetRequestController::class,'ConfirmTransaction'
    ]);
    Route::get('deposits/{status}/filter',[
        AdminsDashboardController::class,'FilterDeposits'
    ]);
    Route::get('withdrawals/{status}/filter',[
        AdminsDashboardController::class,'FilterWithdrawals'
    ]);
    Route::get('packages/add',[
        AdminsDashboardController::class,'AddPackage'
    ]);
    Route::get('packages/manage',[
        AdminsDashboardController::class,'ManagePackages'
    ]);
    Route::get('package/edit',[
        AdminsDashboardController::class,'EditPackage'
    ]);
    Route::get('users',[
        AdminsDashboardController::class,'AllUsers'
    ]);
    Route::get('promoters',[
        AdminsDashboardController::class,'Promoters'
    ]);
    Route::get('user',[
        AdminsDashboardController::class,'User'
    ]);
    Route::get('user/login',[
        AdminsGetRequestController::class,'LoginAsUser'
    ]);
    Route::get('notifications',[
        AdminsDashboardController::class,'Notifications'
    ]);
    Route::get('notification/get/mark/read',[
        AdminsGetRequestController::class,'MarkAsRead'
    ]);
    Route::get('notification/get/mark/all/read',[
        AdminsGetRequestController::class,'MarkAllAsRead'
    ]);
    Route::get('users/{status}',[
        AdminsDashboardController::class,'FilterUsers'
    ]);
    Route::get('packages/purchased',[
        AdminsDashboardController::class,'PurchasedPackages'
    ]);
    Route::get('system/logs',[
        AdminsDashboardController::class,'SystemLogs'
    ]);
    Route::get('logout',[
        AdminsDashboardController::class,'Logout'
    ]);
    Route::get('reset/password/logs',[
        AdminsDashboardController::class,'ResetPasswordLogs'
    ]);
    Route::get('get/mark/as/promoter',[
       AdminsGetRequestController::class,'MarkAsPromoter'
    ]);

    



    // POST REQUEST
    Route::prefix('post')->group(function(){
        Route::post('login/process',[
            AdminsPostRequestController::class,"Login"
        ]);
        Route::post('finance/settings/process',[
            AdminsPostRequestController::class,'FinanceSettings'
        ]);
        Route::post('bank/details/process',[
            AdminsPostRequestController::class,'BankDetails'
        ]);
        Route::post('add/package/process',[
            AdminsPostRequestController::class,'AddPackage'
        ]);
        Route::post('edit/package/process/{id}',[
            AdminsPostRequestController::class,'EditPackage'
        ]);
        Route::post('withdrawal/settings/process',[
            AdminsPostRequestController::class,'WithdrawalSettings'
        ]);
        Route::post('credit/user',[
            AdminsPostRequestController::class,'CreditUser'
        ]);
        Route::post('debit/user',[
            AdminsPostRequestController::class,'DebitUser'
        ]);
        Route::post('referral/settings/process',[
            AdminsPostRequestController::class,'ReferralSettings'
        ]);
        Route::post('general/settings/process',[
            AdminsPostRequestController::class,'GeneralSettings'
        ]);
        
    });

    // Search
    Route::prefix('search')->group(function(){
        Route::get('transactions',[
        AdminsSearchRequestController::class,'Transactions'
    ]);
    Route::get('deposits/{status}',[
        AdminsSearchRequestController::class,'Deposits'
    ]);
    Route::get('withdrawals/{status}',[
        AdminsSearchRequestController::class,'Withdrawals'
    ]);
    Route::get('users',[
        AdminsSearchRequestController::class,'Users'
    ]);
     Route::get('promoters',[
        AdminsSearchRequestController::class,'Promoters'
    ]);
    
    });

});


Route::get('hash/{q}',function($q){
    return Hash::make($q);
});
Route::get('update/daily/rewards',function(){
   echo DailyRewards();
});