<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Visitors\VisitorsController;
use App\Http\Controllers\User\KYCcontroller;
use App\Http\Controllers\User\PlansController;
use App\Http\Controllers\User\ProfileUpdate;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\PaymentController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::domain('youvatrade.net')->group(function(){
    Route::get("/", [VisitorsController::class, 'index'])->name('index');
    Route::view("/about-us", 'visitors.about-us')->name('about');
    Route::view("/services", 'visitors.services')->name('services');
    Route::get("/pricing", [VisitorsController::class, 'pricing'])->name('pricing');
    Route::view("/contact", 'visitors.contact')->name('contact');
    Route::view("/faq", 'visitors.faqs')->name('faq');
    Route::view("/terms-of-services", 'visitors.terms')->name('terms');
    Route::view("/404", 'errors.404')->name('404');
    Route::view("/503", 'errors.503')->name('503');
    Route::post("contact", [VisitorsController::class, 'contact'])->name('contact');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// });


Route::middleware(['guest'])->prefix('auth')->group(function(){
    Route::get('register/{referral?}', function($referral = null){
        return view('auth.register', ['referral' => $referral]);
    })->name('register');
    Route::view('login', 'auth.login')->name('login');
    Route::view('verify_email', 'auth.emailverify')->name('email.verify.view');
    Route::view("forgot-password", 'auth.forgot_password')->name('password.request');
    Route::get("/reset-password/{token}", function($token){
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');
    Route::post('forgot-password', [LoginController::class, 'forgot_request'])->name('password.email');
    Route::post('reset-password', [LoginController::class, 'reset_password'])->name('password.update');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

Route::view('verify_email', 'auth.emailverify')->middleware(['auth'])->name('verification.notice');
Route::get('verify_email/{id}/{hash}', [LoginController::class, 'email_verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('verify_email', [LoginController::class, 'resend_verification_email'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified'])->prefix('user')->group(function(){
    Route::middleware(['kychandler','planshandler'])->group(function(){
        Route::get("/", [UserController::class, 'dashboard'])->name('user.dashboard');
        Route::get("/settings", [ProfileUpdate::class, 'personal_show'])->name('user.settings');
        Route::get("/referrals", [UserController::class, 'referrals'])->name('user.referrals');
        Route::get("/payments", [UserController::class, 'payments'])->name('user.payments');
        Route::view("/withdraw", "user.payments.withdraw")->name('user.withdraw');
        Route::post("/settings/personal", [ProfileUpdate::class, 'personal'])->name('user.update.personal');
        Route::post("/settings/payment", [ProfileUpdate::class, 'payment'])->name('user.update.payment');
        Route::post("/settings/password", [ProfileUpdate::class, 'password'])->name('user.update.password');
    });

    Route::middleware(['kychandler'])->group(function(){
        Route::get("/checkout", [PaymentController::class, 'checkout'])->name('user.checkout');
        Route::get("/plan/{product_id}", [PaymentController::class, 'plan'])->name('user.plan');
        Route::get("/plans", [PlansController::class, 'plans'])->name('user.plans');
        Route::post("/plan", [PaymentController::class, 'planPost'])->name('user.plan.post');
    });
    Route::get("/welcome", [UserController::class, 'welcome'])->name('user.welcome');
    Route::get("/kyc/init", [KYCcontroller::class, 'index'])->name('user.kyc.init');
    Route::post("/kyc", [KYCcontroller::class, 'kyc'])->name('user.kyc.upload');
    Route::put("/kyc", [KYCcontroller::class, 'kycUpdate'])->name('user.kyc.update');
    Route::get("/kyc/new", [KYCcontroller::class, 'show'])->name('user.kyc.new');
});

Route::get('test', function(){
    // $plan = new App\Models\Plans_meta();
    // $plan->plan_name = "vip plan d";
    // $plan->ROI = 50;
    // $plan->initial_minimum_fee = 40000;
    // $plan->initial_maximum_fee = 100000;
    // $plan->time_rate = 43200;
    // $plan->save();

    // return $plan;
    return auth()->user();
});

Route::get("mailable/admin", function(){
    $data = App\Models\contact_form_submits::find(6);

    return new App\Mail\Contact($data);
});

Route::get("mailable/user", function(){
    $data = App\Models\User::find(3);

    return new App\Mail\PasswordReset($data);
});