<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\referrals;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Welcome;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function checkInput($request){
        $validate = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'terms' => 'required',
            'password' => 'required|min:8|not_regex:/^[a-z0-9]*$/i',
            'password_confirmation' => 'required|same:password',
        ]);

        return $validate;
    }

    public function referral_Generate(){
        $rand = Str::random(10);

        $users = User::all();;

        foreach($users as $user){
            while($rand == $user->referral_code){
                $rand = Str::random(10);
            }
        }

        return $rand;
    }

    public function referral_bonus($referral, $referral_id){
        $user = User::where('referral_code', $referral)->get();

        if(count($user) > 0){
            $refer = new referrals();
            $refer->user_id = $user[0]->id;
            $refer->referral_user_id = $referral_id;
            $refer->bonus = 0;
            $refer->save();       
            
            $current = User::find(auth()->user()->id);
            $current->referral = $user[0]->name;
            $current->save();
        }
    }

    public function register(Request $request){
        $validate = $this->checkInput($request);
        $rand = $this->referral_Generate();

        if($validate != true){
            return $validate;
        }else{
            $users = User::where('email', $request->email)->get();

            if(count($users) > 0){
                return back()->withInput()->with('error', 'Email exists on our site already!');
            }else{
                $user  =  new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->referral_code = $rand;
                $user->role = 'user';
                $user->save();

                event(new Registered($user));
                Auth::login($user);

                if($request->referral != null){
                    $this->referral_bonus($request->referral, auth()->user()->id);
                }

                Mail::to($user->email)->send(new Welcome($user));


                return redirect()->intended(auth()->user()->role."/welcome");                
            }

        }
    }
}
