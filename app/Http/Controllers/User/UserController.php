<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plans_meta;
use App\Models\referrals;
use App\Models\User;
use App\Models\sitePaymentOptions;
use App\Models\Transaction;
use App\Models\UserPaymentMeta;

class UserController extends Controller
{
    
    public function welcome(){
        return view('user.welcome');
    }


    public function payments(){
        $payments = Transaction::where('user_id', auth()->user()->id)->latest()->get();
        return view('user.payments.payments', ['payments' => $payments]);
    }

    public function referrals(){
        $referrals = referrals::where('user_id', auth()->user()->id)->get();
        $info['referrals'] =$referrals;

        foreach($referrals as $referral){
            $info['users'][] = User::find($referral['referral_user_id']);
        }

        return view('user.plans.referrals', ['info' => $info]);
    }

    public function dashboard(){
        $info['plan'] = Plans_meta::find(auth()->user()->plan);
        $info['referrals'] = referrals::where('user_id', auth()->user()->id)->latest()->get();
        $referralUsers = null;

        if(count($info['referrals']) > 0){
            foreach($info['referrals'] as $referral){
                $referralUsers = User::find($referral['referral_user_id']);
            }
        }

        $info['referUsers'] = $referralUsers;

        return view('user.dashboard', ['info' => $info]);
    }

    public function deposit(){
        $infos = sitePaymentOptions::all();
        return view("user.payments.deposit" ,['infos' => $infos]);
    }

    public function withdraw(){
        $info['wallets'] = UserPaymentMeta::all();
        $info['site_wallets'] = sitePaymentOptions::all();
        return view("user.payments.withdraw", ['info' => $info]);
    }



}
