<?php

namespace App\Http\Scripts;

use App\Models\User;
use App\Models\Plans_meta;
use App\Models\Transaction;
use App\Models\Payout;
use Illuminate\Support\Facades\Storage;


class InvestmentReturn{
    public function __invoke(){
        $user = User::find(auth()->user()->id);
        $payout = new Payout();
        $payout->save();
    }
}