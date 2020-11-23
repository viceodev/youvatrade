<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\sitePaymentOptions;
use Illuminate\Support\Facades\Storage;

class AdminWalletsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = sitePaymentOptions::all();

        return view('admin.wallets.index', ['wallets' => $wallets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wallets.create');
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
            'type' => 'required',
            'address' => 'required',
        ]);

        $allowed = ['png', 'jpg', 'jpeg', 'svg'];
        $extension = $request->qr->extension();

        if(!in_array($extension, $allowed)){
            return back()->with('error', 'Your file type is not allowed');
        }else{
            $name = strtolower($request->type)." qr.".$extension;
            
            $wallet = new sitePaymentOptions();
            $wallet->wallet_type = $request->type;
            $wallet->wallet_address = $request->address;
            if(isset($request->qr)){
                $wallet->qr_code = "storage/qr/".$name;
                Storage::putFileAs(
                    "public/qr", $request->qr, $name
                );
            }else{
                $wallet->qr_code = "images/qr/custom qr.png";
            }

            $wallet->save();
            return back()->with('success', 'Wallet added successfully');
        }
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
        $wallet = sitePaymentOptions::findOrFail($id);
        return view('admin.wallets.edit', ['wallet' => $wallet]);
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
        $request->validate([
            'type' => 'required',
            'address' => 'required',
        ]);
        
        $wallet = sitePaymentOptions::find($id);
        $wallet->wallet_type = $request->type;
        $wallet->wallet_address = $request->address;

        if(isset($request->qr)){
            $name = $wallet['wallet_type']." qr.".$request->qr->extension();
            $wallet->qr_code = "storage/qr/".$name;
            Storage::putFileAs(
                "public/qr", $request->qr, $name
            );
        }

        $wallet->save();
        return back()->with('success', 'Wallet updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wallet = sitePaymentOptions::find($id);
        Storage::delete($wallet['qr_code']);
        $wallet->delete();

        return back()->with('success', 'Wallet deleted successfully');
    }
}
