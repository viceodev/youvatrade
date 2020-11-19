<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        $users = User::cursor()->filter(function($user){
            return $user->role == 'user';
        });
        return view('admin.dashboard', ['users' => $users]);
    }
}
