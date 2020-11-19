<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Plans_meta;
use App\Models\Payments;
use Illuminate\Support\Facades\Str;


class PaymentController extends Controller
{

    public function plan($product_id){
        $product = Plans_meta::findOrFail($product_id);
        return view('user.plans.plan', ['product' => $product]);
    }

    public function planPost(Request $request){
        $request->validate([
            'amount' => 'required',
            'product' => 'required',
        ]);
        $product = Plans_meta::findOrFail($request->product);

        if($request->amount < $product['initial_minimum_fee'] || $request->amount > $product['initial_maximum_fee']){
            return back()->with('error', 'Your investment amount should be in the range of the payment fee');
        }else{
            $product['ref'] = str_shuffle("0123456789");

            $payment = Payments::where('ref', $product['ref'])->get();

            while(count($payment) > 0 ){
                $product['ref'] = str_shuffle("0123456789");
            }


            $product['amount'] = $request->amount;

            session(['cart' => $product]);
            return redirect()->route('user.checkout');
        }
        
    }

    public function checkout(){
        if(!isset($_SESSION['cart'])){
            $cart = session()->get('cart');
            $payment = new Payments();
            $payment->user_id = auth()->user()->id;
            $payment->ref = $cart['ref'];
            $payment->amount = $cart['amount'];
            $payment->purpose = $cart['plan_name'];
            $payment->status = 0;
            $payment->user_plan = 0;
            $payment->save();
            $paymentSecret = $this->makePayment($cart);
            return view('user.payments.checkout', ['cart' => $cart])->with('secret', $paymentSecret);            
        }else{
            return redirect()->route('user.dashboard');
        }

    }

    public function makePayment($cart){
        if($cart){
            // $m_shop = 1209576839;
            // $m_orderid = $cart['ref'];
            // $m_amount = $cart['amount'].".00";
            // $m_curr = $cart['payment_currency'];
            // $m_desc = base64_encode("Plan Name:".$cart['plan_name']);
            // $m_key = 1209576839; 

            $m_shop = 1209576839;
            $m_orderid = 12345;
            $m_amount = 150.00;
            $m_curr = $cart['payment_currency'];
            $m_desc = 'VGVzdCBwYXltZW50IOKEljEyMzQ1';
            $m_sign = '195782300AEB65579BEA415ECB7D178930A8A9FF2A7926D071932DBC905E0B92';
            $m_key = 1209576839;  
            
            $array = array('m_shop' => $m_shop, 'm_orderid' => $m_orderid, 'm_amount' => $m_amount, 'm_curr' => $m_amount, 'm_desc' => $m_desc);

            return $array;
        }else{
            return null;
        }

    }
}
