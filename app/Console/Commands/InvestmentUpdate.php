<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\referrals;
use App\Models\Plans_meta;
use App\Models\Transaction;
use App\Mail\Transactions\investmentReturn;
use Illuminate\Support\Facades\Mail;


class InvestmentUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'investment:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        foreach($users as $user){
            if(isset($user['plan'])){
                $plan_metas = Plans_meta::find($user['plan']);
                $currentDate = strtotime('now');
                $due = $user['last_payed'] + $plan_metas['time_rate'];
                if($due < $currentDate){
                    $investments = Transaction::where('user_id', $user['id'])->latest()->cursor()->filter(function($transaction){
                        return $transaction->type == 'investment';
                    })->first();

                    $bonus = ($plan_metas['ROI'] / 100) * $investments['amount'];
                    $current = User::find($user['id']);
                    $current->plan = null;
                    $current->balance = $current->balance + $bonus;
                    $current->last_payed = $currentDate;
                    $current->save();

                    $updateTransact = $this->updateTransaction($user['id'], $bonus, $user['name'], $user['email']);
                    
                    $this->info($investments);
                    $this->info('updated successfully');
                }
            }
        }
    }


    public function updateTransaction($id, $amount, $name, $email){
        $ref = str_shuffle("0123456789");

        $payment = Transaction::where('ref', $ref)->get();

        while(count($payment) > 0 ){
            $ref = str_shuffle("0123456789");
        }

        $transact = new Transaction();
        $transact->user_id = $id;
        $transact->ref = $ref;
        $transact->type = 'return';
        $transact->amount = $amount;
        $transact->description = $name." has been credited with ".$amount." as regards their choosen investment plan";
        $transact->payment_channel = 'website wallet';
        $transact->payment_address = 'website wallet';
        $transact->status = 1;
        $transact->save();

        Mail::to($email)->send(new investmentReturn($transact));
    }
}
