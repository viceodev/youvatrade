<?php

namespace App\Http\Controllers\Visitors;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\contact_form_submits;
use App\Mail\Contact;
use App\Mail\contact_user;
use App\Models\Plans_meta;
use App\Models\Transaction;
use App\Models\User;
use App\Models\SiteDetails;

class VisitorsController extends Controller
{
    
    public function contact(Request $request){
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $user_id = Null;

        if(Auth::check()){
            $user_id = auth()->user()->id;
        }

        $request['id'] = $user_id;

        $contact = new contact_form_submits;
        $contact->user_id = $request->id;
        $contact->firstName = $request->firstname;
        $contact->lastName = $request->lastname;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->opened = 0;
        $contact->save();

        
        Mail::to('info@youvatrade.com')->send(new Contact($contact));
        Mail::to($contact['email'])->send(new contact_user($contact));

        return back()->with('success', 'Your message has been sent successfully');

    }

    public function pricingDB(){
        $plans = Plans_meta::all();

        return $plans;
    }

    public function contactUs(){
        $infos = SiteDetails::all();

        foreach($infos as $detail){
            $info[$detail['field']] = $detail['value'];
        }
        return view('visitors.contact', ['info' => $info]);
    }

    public function pricing(){
        $plan = $this->pricingDB();
        return view('visitors.pricing', ['plans' => $plan]);
    }

    public function index(){
        $plan = $this->pricingDB();
        $info['withdrawals'] = Transaction::where('type','withdrawal')->latest()->get()->take(10);
        $info['deposits'] = Transaction::where('type', 'deposit')->latest()->get()->take(10);

        foreach($info['withdrawals'] as $transact){
            $info['users'][$transact['ref']] = User::find($transact['user_id']);
        }

        foreach($info['deposits'] as $transact){
            $info['users'][$transact['ref']] = User::find($transact['user_id']);
        }

        return view('visitors.index', ['plans' => $plan])->with('info', $info);
    }
}
