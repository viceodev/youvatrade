<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sitePaymentOptions;
use App\Models\UserPaymentMeta;
use Illuminate\Support\Facades\Mail;
use App\Mail\Wallets\WalletAdd;
use App\Mail\Wallets\WalletDeactivate;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info['site_wallets'] = sitePaymentOptions::all();
        $info['user_wallets'] = UserPaymentMeta::where('user_id', auth()->user()->id)->get();

        return view('user.payments.wallet', ['info' => $info]);
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
        $request->validate([
            'wallet_type' => 'required',
            'address' => 'required',
        ]);

        $user = new UserPaymentMeta();
        $user->user_id = auth()->user()->id;
        $user->wallet_type = $request->wallet_type;
        $user->wallet_address = $request->address;
        $user->status = 1;
        $user->save();

        Mail::to(auth()->user()->email)->send(new WalletAdd($user));

        return back()->with('success', 'Wallet archive updated successfully');
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
        $user = UserPaymentMeta::find($id);

        if($request->action == 'activate'){
            $user->status = 1;
            $user->save();
            return back()->with('success', 'Wallet archive updated successfully');
        }elseif($request->action == 'deactivate'){
            $user->status = 0;
            $user->save();
            
            Mail::to(auth()->user()->email)->send(new WalletDeactivate($user));
            
            return back()->with('success', 'Wallet archive updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UserPaymentMeta::find($id);
        $user->delete();
        return back()->with('success', 'Wallet deleted successfully');
    }
}
