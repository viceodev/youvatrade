<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Mail\PasswordReset;

class LoginController extends Controller
{

    public function Login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->get();

        if(count($user) > 0){
            if($request->remember){
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                    return redirect()->intended(auth()->user()->role);
                }else{
                    return back()->withInput()->with('error', 'Your password is incorrect');
                }
            }else{
                if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    return redirect()->intended(auth()->user()->role);
                 }else{
                     return back()->withInput()->with('error', 'Your password is incorrect');
                 }               
            }
        }else{
            return back()->withInput()->with('error', 'User does not exist');
        }
    }

    public function email_verify(EmailVerificationRequest $request){
        $request->fulfill();

        return redirect()->intended(auth()->user()->role."/welcome")->with('success', 'Your email has been verified successfully');
    }

    public function resend_verification_email(Request $request){
        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Email verification link sent successfully');
    }

    public function forgot_request(Request $request){
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['success' => __($status)])
                : back()->withErrors(['error' => __($status)]);
    }


    public function reset_password(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
    
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
    
                $user->setRememberToken(Str::random(60));
    
            }
        );

        $user = User::where('email', $request->email)->get()[0];
        Mail::to($user['email'])->send(new PasswordReset($user));
    
        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', __($status))
                    : back()->withErrors(['error' => __($status)]);
    }


    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();

        // return $request;
        return redirect()->route('login');
    }
}
