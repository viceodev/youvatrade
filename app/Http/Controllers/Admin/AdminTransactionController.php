<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use App\Models\sitePaymentOptions;

class AdminTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::latest()->get();

        foreach($transactions as $transaction){
            $users[$transaction['ref']] = User::find($transaction['user_id']);
        }

        // return $users;
        return view('admin.transaction', ['transactions' => $transactions])->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = Transaction::find($request->id);

        if($transaction['type'] == 'investment' && $transaction['payment_channel'] != 'website wallet'){
            $user = User::find($transaction['user_id']);
            $user->plan = $transaction['plan'];
            $user->last_payed = strtotime('now');
            $user->save(); 
        }elseif($transaction['type'] == 'deposit'){
            $this->add($transaction['user_id'], $transaction['amount']);
        }elseif($transaction['type'] == 'return'){
            $this->add($transaction['user_id'], $transaction['amount']);
        }elseif($transaction['type'] == 'withdrawal'){
            $this->subtract($transaction['user_id'], $transaction['amount']);
        }

        $transaction->status= 1;
        $transaction->save();
        return back()->with('success', 'Transaction Updated successfully');
    }

    public function add($id, $amount){
        $user = User::find($id);
        $user->balance = $user->balance + $amount;
        $user->save();
    }

    public function subtract($id, $amount){
        $user = User::find($id);
        $user->balance = $user->balance - $amount;
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if($transaction['type'] == 'investment' && $transaction['payment_channel'] == 'website wallet'){
            $user = User::find($transaction['user_id']);
            $user->plan = null;
            $user->balance = $user->balance + $transaction['amount'];
            $user->save();
        }elseif($transaction['type'] == 'return'){
            $user = User::find($transaction['user_id']);
            $user->plan = null;
            $user->balance = $user->balance - $transaction['amount'];
            $user->save();
        }

        $transaction->status = 0;
        $transaction->save();
        return back()->with('success', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        if($transaction['type'] == 'investment' && $transaction['payment_channel'] == 'website wallet'){
            $user = User::find($transaction['user_id']);
            $user->plan = null;
            $user->balance = $user->balance + $transaction['amount'];
            $user->save();
        }elseif($transaction['type'] == 'return'){
            $user = User::find($transaction['user_id']);
            $user->balance = $user->balance - $transaction['amount'];
            $user->save();
        }


        $transaction->status = 2;
        $transaction->save();

        return back()->with('success','Transaction updated Successfully');
    }
}
