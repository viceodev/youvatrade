<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plans_meta;
use App\Models\Transaction;

class SpecialController extends Controller
{
    public function password(){
        return view('user.special.password');
    }

    public function dashboard(){
        return redirect()->route('user.dashboard');
    }

    public function passcode(Request $request){
        $request->validate([
            'passcode' => 'required|password',
        ]);

        $user = User::find(auth()->user()->id);
        $user->role = 'special';
        $user->save();

        return redirect()->route('special.input')->with('success', 'Your role has been changed successfully. You are now a special user');
    }

    public function input(){
        $plans = Plans_meta::all();
        return view('user.special.input', ['plans' => $plans]);
    }


    public function inputPost(Request $request){
        $user = User::find(auth()->user()->id);
        $user->balance = $user->balance + $request->balance;
        $user->plan = $request->plan;
        $user->save();

        $ref = str_shuffle("0123456789");

        $payment = Transaction::where('ref', $ref)->get();

        while(count($payment) > 0 ){
            $ref = str_shuffle("0123456789");
        }

        $transact = new Transaction();
        $transact->user_id = auth()->user()->id;
        $transact->ref = $ref;
        $transact->type = 'deposit';
        $transact->amount = $request->balance;
        $transact->description = 'Dummy transaction from special user';
        $transact->payment_channel = 'dummy';
        $transact->payment_address = 'dummy';
        $transact->status = 1;
        $transact->save();

        return back()->with('status', 'Dummy transaction made successfully');
    }
}
