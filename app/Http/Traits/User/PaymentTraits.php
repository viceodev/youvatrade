<?php

namespace App\Http\Traits\User;

use App\Models\Transaction;
use App\Models\sitePaymentOptions;
use App\Models\User;
use App\Models\referrals;
use Illuminate\Support\Facades\Mail;
use App\Mail\Transactions\Investment;
use App\Mail\Transactions\InvestmentWallet;

trait PaymentTraits{

    public function investWallet($request){
        $request->validate([
            'amount' => 'required',
            'ref' => 'required',
        ]);

        if(auth()->user()->balance < $request->amount){
            return back()->with('error', 'You have insufficient balance');
        }else{
            $time = strtotime('now');

            $user = Transaction::where('ref', $request->ref)->get()[0];
            $user->payment_channel = 'website wallet';
            $user->payment_address = 'website wallet';
            $user->status = 1;
            $current = User::find(auth()->user()->id);
            $current->balance = $current->balance - $request->amount;
            $current->plan = $user->plan;
            $current->last_payed = $time;
            $current->save();
            $user->save();

            $this->ReferralCheck(auth()->user()->id, $user['amount']);
            Mail::to(auth()->user()->email)->send(new InvestmentWallet($user));

            
            session()->forget('cart');
            return redirect()->route('user.dashboard')->with('success', 'Your plan has been updated successfully. You will start recieving your returns in due time');            
        }
    }

    public function investCrypto($request){
        $request->validate([
            'method' => 'required',
            'amount' => 'required',
            'ref' => 'required',
        ]);

        $wallet = sitePaymentOptions::where('wallet_type', $request->method)->get()[0];
        
        $ref = str_shuffle("0123456789");

        $payment = Transaction::where('ref', $ref)->get();

        while(count($payment) > 0 ){
            $ref = str_shuffle("0123456789");
        }


        $user = Transaction::where('ref', $request->ref)->get()[0];
        $user->payment_channel = $wallet['wallet_type'];
        $user->payment_address = $wallet['wallet_address'];
        if(auth()->user()->role != 'user'){
            $user->status = 1;
            $current = User::find(auth()->user()->id);
            $current->balance = $current->balance - $request->amount;
            $current->save();
        }else{
            $user->status = 2;
        }
        
        $user->save();
        $this->ReferralCheck(auth()->user()->id, $user['amount']);
        Mail::to(auth()->user()->email)->send(new Investment($user));
        session()->forget('cart');
        return view('user.payments.depo', ['wallet' => $wallet])->with('ref', $ref);
    }
    
    public function ReferralCheck($user_id, $amount){
        $check = referrals::where('referral_user_id', $user_id)->get();

        if(count($check) > 0){
            if($check[0]['bonus'] == 0){
                $bonus = (5 / 100) * $amount;

                $ref = str_shuffle("0123456789");
        
                $payment = Transaction::where('ref', $ref)->get();
                
                while(count($payment) > 0 ){
                    $ref = str_shuffle("0123456789");
                }

                $user = User::find($check[0]['user_id']);
                $user->balance = $user->balance + $bonus;
                $user->save();

                $payment = new Transaction();
                $payment->user_id = $user['id'];
                $payment->ref = $ref;
                $payment->amount = $bonus;
                $payment->type = 'referral bonus';
                $payment->description = "Wallet credited with $".$bonus." for referring a user ";
                $payment->payment_channel = 'website wallet';
                $payment->payment_address = 'website wallet';
                $payment->status = 1;            
                $payment->save();         
                
                $referral = referrals::find($check[0]['id']);
                $referral->bonus = $bonus;
                $referral->save();
            }

        }
    }
}