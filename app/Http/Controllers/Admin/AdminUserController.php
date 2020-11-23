<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Http\Controllers\Controller;
use App\Http\Traits\Admin\AdminTraits;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    use AdminTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name')->get();
        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $info = $this->userInfo($id);
        // return $info;
        return view('admin.user.single', ['user' => $user])->with('info', $info);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $year = explode('-', $request->dob)[0];
        $valid = date('Y') - 18;

        if($year > $valid ){
            return back()->with('error', 'User\'s age must be more than 18');
        }else{

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->dob = $request->dob;
            $user->state = $request->state;
            $user->status = $request->status;
            $user->nationality = $request->country;
            $user->balance = $request->balance;

            if($request->password != null){
                $user->password = Hash::make($request->password);
            }

            $user->save();
            return back()->with('success', 'User updated successfully');            
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if($request->action == 'ban'){
            $user->banned = 1;               
            $user->save();
            return back()->with('success', 'User banned successfully');
        }elseif($request->action == 'unban'){
            $user->banned = 0;  
            $user->save();
            return back()->with('success', 'User unbanned successfully');
        }
    }
}
