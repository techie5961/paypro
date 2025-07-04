<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// users notifications
function UserNotifications(){
    $total=DB::table('notifications')->where('user_id',Auth::guard('users')->user()->id)->where('status->user','unread')->count();

    if($total > 0){
        if($total >= 1000){
            $total='1k+';
        }
        if(strlen($total) <= 2){
return '<b style="padding:2px 10px">'.$total.'</b>';
        } else{
            return '<b style="padding:2px 5px">'.$total.'</b>';
        }
       
    } 
}
// admin notifications
function AdminNotifications(){
    $total=DB::table('notifications')->where('status->admin','unread')->count();
  
    if($total > 0){
        if($total >= 1000){
            $total='1k+';
        }
        if(strlen($total) <= 2){
return '<b style="padding:2px 10px">'.$total.'</b>';
        } else{
            return '<b style="padding:2px 5px">'.$total.'</b>';
        }
    } 
}
// banks
function Banks(){
    $banks=[
    'First Bank' =>[
        'code' => '001',
        'name' => 'First Bank PLC',
        'icon' => 'First Bank Nigeria Logo.svg' 
    ],
    'Access Bank' =>[
        'code' => '002',
        'name' => 'Access Bank PLC',
        'icon' => 'Access Bank PLC Logo.svg'
    ],
    'Alat by Wema' => [
        'code' => '003',
        'name' => 'Alat By Wema',
        'icon' => 'ALAT by Wema Logo.svg'
    ],
    'Barter' => [
        'name' => 'Barter by Flutterwave',
        'code' => '004',
        'icon' => 'Barter Logo.svg'
    ],
    'Ecobank' =>[
        'name' => 'Ecobank PLC',
        'code' => '005',
        'icon' => 'Ecobank Logo.svg'
    ],
    'Econdo Microfinance Bank' => [
        'name' => 'Eknodo Microfinance Bank',
        'code' => '006',
        'icon' => 'Ekondo Microfinance Bank Logo.svg'
    ],
    'Eyowo' => [
        'name' => 'Eyowo',
        'code' => '007',
        'icon' => 'Eyowo Logo.svg'
    ],
    'Fidelity Bank' => [
        'name' => 'Fidelity Bank PLC',
        'code' => '008',
        'icon' => 'Fidelity Bank Nigeria Logo.svg'
    ],
    'First City Monument Bank' => [
        'name' => 'First City Monument Bank',
        'code' => '009',
        'icon' => 'First City Monument Bank Ltd Logo.svg'
    ],
    'Flutterwave' => [
        'name' => 'Flutterwave',
        'code' => '010',
        'icon' => 'Flutterwave Logo.svg'
    ],
    'Guaranty Trust Bank' => [
        'name' => 'Guarantee Trust Bank',
        'code' => '011',
        'icon' => 'Guaranty Trust Bank Logo.svg'
    ],
    'Heritage Bank' => [
        'code' => '012',
        'name' => 'Heritage Bank PLC',
        'icon' => 'Heritage Bank PLC Logo.svg'
    ],
    'Keystone Bank' => [
        'name' => 'Keystone Bank',
        'code' => '013',
        'icon' => 'Keystone Bank Limited Logo.svg'
    ],
    'Kuda Bank' => [
        'name' => 'Kuda Micrfinance Bank',
        'code' => '014',
        'icon' => 'Kuda Bank Logo.svg'
    ],
    'Mainstreet Bank' => [
        'name' => 'Mainstreet Bank',
        'code' => '015',
        'icon' => 'Mainstreet Bank Logo.svg'
    ],
    'Moniepoint' => [
        'name' => 'Moniepoint Microfinance Bank',
        'code' => '016',
        'icon' => 'Moniepoint Logo.svg'
    ],
    'Opay' => [
        'name' => 'Opay',
        'code' => '017',
        'icon' => 'opay.png'
    ],
    'Paga' => [
        'name' => 'Paga',
        'code' => '018',
        'icon' => 'Paga Logo.svg'
    ],
    'Paystack' => [
        'name' => 'Paystack',
        'code' => '019',
        'icon' => 'Paystack Logo.svg'
    ],
    'Polaris' => [
        'name' => 'Polaris Bank',
        'code' => '020',
        'icon' => 'Polaris Bank Logo.svg'
    ],
    'Stanbic IBTC' => [
        'name' => 'Stanbic IBTC Bank',
        'code' => '021',
        'icon' => 'Stanbic IBTC Bank Logo.svg'
    ],
    'Standard Chartered' => [
        'name' => 'Standard Chartered Bank',
        'code' => '022',
        'icon' => 'Standard Chartered Logo.svg'

    ],
    'Sterling Bank' => [
        'name' => 'Sterlink Bank PLC',
        'code' => '023',
        'icon' => 'Sterling Bank Plc Logo.svg'
    ],
    'Union Bank' => [
        'name' => 'Union Bank PLC',
        'code' => '024',
        'icon' => 'Union Bank Nigeria Logo.svg'
    ],
    'UBA' => [
        'name' => 'United Bank for Africa',
        'code' => '025',
        'icon' => 'United Bank for Africa Logo.svg'
    ],
    'Wema' => [
        'name' => 'Wema Bank PLC',
        'icon' => 'Wema Bank Logo.svg',
        'code' => '026'
    ],
    'Zenith' => [
        'name' => 'Zenith Bank PLC',
        'code' => '027',
        'icon' => 'Zenith Bank Logo.svg'
    ],
    'Palmpay' => [
        'name' => 'Palmpay',
        'code' => '028',
        'icon' => 'palmpay.jpeg'
    ]

  ];
  ksort($banks);
  return json_decode(json_encode($banks));
}


?>