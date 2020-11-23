<?php

namespace App\Http\Traits\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Models\Transaction;
use App\Models\referrals;
use App\Models\User;
use App\Models\Plans_meta;
use App\Mail\Transactions\AdminUserTransact;
use App\Mail\Admin\Personalized;
use App\Mail\Admin\BulkEmails;

trait AdminTraits{

    public function userInfo($id){
        $transactions = Transaction::where('user_id', $id)->get();
        $info['referrals'] = referrals::where('user_id', $id)->get();
        $info['deposit'] = 0;
        $info['return'] = 0;
        $info['bonus'] = 0;
        $info['withdrawal'] = 0;
        $info['investment'] = 0;
        $info['transactions'] = $transactions;
        $info['plans'] = Plans_meta::all();

        foreach($transactions as $transaction){
            if($transaction['type'] == 'deposit' && $transaction['status'] == 1){
                $info['deposit'] += $transaction['amount']; 
            }
        }

        foreach($transactions as $transaction){
            if($transaction['type'] == 'return' && $transaction['status'] == 1){
                $info['return'] += $transaction['amount']; 
            }
        }

        foreach($transactions as $transaction){
            if($transaction['type'] == 'bonus' && $transaction['status'] == 1){
                $info['bonus'] += $transaction['amount']; 
            }
        }

        foreach($transactions as $transaction){
            if($transaction['type'] == 'withdrawal' && $transaction['status'] == 1){
                $info['withdrawal'] += $transaction['amount']; 
            }
        }

        foreach($transactions as $transaction){
            if($transaction['type'] == 'investment' && $transaction['status'] == 1){
                $info['investment'] += $transaction['amount']; 
            }
        }

        return $info;
    }


    public function UserTransact(Request $request, $id){
        $request->validate([
            'amount' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        $ref = str_shuffle("0123456789");

        $payment = Transaction::where('ref', $ref)->get();

        while(count($payment) > 0 ){
            $ref = str_shuffle("0123456789");
        }

        $transaction = new Transaction();
        $user = User::find($id);

        if($request->type == 'deposit'){
            $user->balance = $user->balance + $request->amount;
            ;
            $transaction->user_id = $id;
            $transaction->ref = $ref;
            $transaction->type = 'deposit';
            $transaction->amount = $request->amount;
            $transaction->description = 'Deposit of $'.$request->amount." to ".$user['name']." from youvatrade admin";
            $transaction->payment_channel = 'website wallet';
            $transaction->payment_address = 'website wallet';
            $transaction->status = 1; 

        }elseif($request->type == 'investment'){
            if(isset($request->plan)){
                $plan = Plans_meta::find($request->plan);

                if($request->amount < $plan->initial_minimum_fee || $request->amount > $plan->initial_maximum_fee){
                    return back()->withInput()->with('error', 'The given amount is not in the range of the choosen plan');
                }else{
                    $user->plan = $plan['id'];
                    $user->last_payed = strtotime('now');

                    $transaction->user_id = $id;
                    $transaction->ref = $ref;
                    $transaction->type = 'investment';
                    $transaction->amount = $request->amount;
                    $transaction->description = 'Payment for investment plan worth $'.$request->amount." to ".$user['name']." from youvatrade admin";
                    $transaction->payment_channel = 'website wallet';
                    $transaction->payment_address = 'website wallet';
                    $transaction->status = 1; 
                }
            }else{
                return back()->withInput()->with('error', 'Please choose a plan');
            }
        }elseif($request->type == 'withdrawal'){
            $user->balance = $user->balance - $request->amount;

            $transaction->user_id = $id;
            $transaction->ref = $ref;
            $transaction->type = 'withdrawal';
            $transaction->amount = $request->amount;
            $transaction->description = 'Request for withdrawal of $'.$request->amount." to ".$user['name']." from youvatrade admin";
            $transaction->payment_channel = 'website wallet';
            $transaction->payment_address = 'website wallet';
            $transaction->status = 1; 

        }elseif($request->type == 'charges'){
            $user->balance = $user->balance - $request->amount;

            $transaction->user_id = $id;
            $transaction->ref = $ref;
            $transaction->type = 'charges';
            $transaction->amount = $request->amount;
            $transaction->description = $request->description;
            $transaction->payment_channel = 'website wallet';
            $transaction->payment_address = 'website wallet';
            $transaction->status = 1;

        }elseif($request->type == 'referral bonus'){
            $user->balance = $user->balance + $request->amount;

            $transaction->user_id = $id;
            $transaction->ref = $ref;
            $transaction->type = 'referral bonus';
            $transaction->amount = $request->amount;
            $transaction->description = $request->description;
            $transaction->payment_channel = 'website wallet';
            $transaction->payment_address = 'website wallet';
            $transaction->status = 1;
        }elseif($request->type == 'bonus'){
            $user->balance = $user->balance + $request->amount;

            $transaction->user_id = $id;
            $transaction->ref = $ref;
            $transaction->type = 'bonus';
            $transaction->amount = $request->amount;
            $transaction->description = 'Bonus worth $'.$request->amount." given to ".$user['name']." from youvatrade admin";
            $transaction->payment_channel = 'website wallet';
            $transaction->payment_address = 'website wallet';
            $transaction->status = 1;
        }elseif($request->type == 'capital'){
            $user->balance = $user->balance + $request->amount;

            $transaction->user_id = $id;
            $transaction->ref = $ref;
            $transaction->type = 'capital';
            $transaction->amount = $request->amount;
            $transaction->description = 'Capital worth  $'.$request->amount." given to ".$user['name']." from youvatrade admin";
            $transaction->payment_channel = 'website wallet';
            $transaction->payment_address = 'website wallet';
            $transaction->status = 1;
        }elseif($request->type == 'purchase'){
            $user->balance = $user->balance - $request->amount;

            $transaction->user_id = $id;
            $transaction->ref = $ref;
            $transaction->type = 'withdrawal';
            $transaction->amount = $request->amount;
            $transaction->description = 'Purchase charge of $'.$request->amount." to ".$user['name']." from youvatrade admin";
            $transaction->payment_channel = 'website wallet';
            $transaction->payment_address = 'website wallet';
            $transaction->status = 1;
        }


        $user->save();
        $transaction->save();
        Mail::to($user['email'])->send(new AdminUserTransact($user, $transaction, $request->description));
        return back()->with('success', 'Transaction added successfully');
    }

    public function personalized(Request $request, $email){
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        Mail::to($email)->send(new Personalized($request->subject, $request->message));
        return back()->with('success', 'Message sent successfully');
    }


    public function bulkEmails(Request $request){
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        $users = User::cursor()->filter(function($user){
            return $user->role != 'admin';
        });

        foreach($users as $user){
            Mail::to($user['email'])->send(new BulkEmails($request->subject, $request->message, $user));
        }

        return back()->with('success', 'Message sent successfully');
    }

}