<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plans_meta;

class PlansController extends Controller
{
    
    public function plans(){
        $plans = Plans_meta::all();
        return view('user.plans.plans', ['plans' => $plans]);
    }
}
