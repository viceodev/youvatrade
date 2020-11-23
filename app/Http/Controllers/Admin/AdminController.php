<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\referrals;
use App\Models\Transaction;
use App\Models\KYCModel;
use App\Models\Plans_meta;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\Admin\AdminTraits;

class AdminController extends Controller
{
    use AdminTraits;

    public function dashboard(){
        $info['investors'] = User::cursor()->filter(function($user){
            return $user->role == 'user';
        });
        
        foreach($info['investors'] as $user){
            $info['users'][] = $user;
        }

        $info['deposit'] = 0;
        $info['withdrawals'] = 0;
        $info['returns'] = 0;

        $transactions =  Transaction::all();

        foreach($transactions as $transaction){
            if($transaction['type'] == 'deposit' && $transaction['status'] == 1){
                $info['deposit'] += $transaction['amount'];
            }
        }

        foreach($transactions as $transaction){
            if($transaction['type'] == 'withdrawal' && $transaction['status'] == 1){
                $info['withdrawals'] += $transaction['amount'];
            }
        }

        foreach($transactions as $transaction){
            if($transaction['type'] == 'return' && $transaction['status'] == 1){
                $info['returns'] += $transaction['amount'];
            }
        }

        // return $info;
        return view('admin.dashboard', ['info' => $info]);
    }


    public function kycs(){
        $kycs = KYCModel::all();

        foreach($kycs as $kyc){
            $users[$kyc['user_id']] = User::find($kyc['user_id']);
        }


        return view('admin.kycall', ['kycs' => $kycs])->with('users', $users);
    }

    public function kyc($id){
        $kyc = KYCModel::find($id);
        $info['user'] = User::find($kyc['user_id']);
        $info['storage'] = Storage::allFiles("kycs/".$kyc['folder']);

        return view('admin.kyc', ['kyc' => $kyc])->with('info', $info);
    }

    public function kycVerify($id){
        $kyc = KYCModel::find($id);
        $user = User::find($kyc['user_id']);
        $user->status = 'verified';
        $user->save();

        return back()->with('success', 'User kyc updated successfully');
    }

    public function kycUnverify($id){
        $kyc = KYCModel::find($id);
        $user = User::find($kyc['user_id']);
        $user->status = 'unverified';
        $user->save();

        return back()->with('success', 'User kyc updated successfully');
    }

    public function kycCancel($id){
        $kyc = KYCModel::find($id);
        $user = User::find($kyc['user_id']);
        $user->status = 'active';
        $user->save();

        return back()->with('success', 'User kyc updated successfully');
    }

    public function DownloadKyc(Request $request){
        return Storage::download($request->file); 
    }

    public function investments(){
        $info['transactions'] = Transaction::where('type', 'investment')->latest()->get();
        $dummy = Plans_meta::all();

        foreach($info['transactions'] as $transaction){
            $info['users'][$transaction['user_id']] = User::find($transaction['user_id']);
            
        }

        foreach($dummy  as $plan){
            $info['plans'][$plan['id']] = $plan;
        }

        return view('admin.investment', ['info' => $info]);
    }

    public function bulkEmails(){
        return view('admin.emails');
    }
}
