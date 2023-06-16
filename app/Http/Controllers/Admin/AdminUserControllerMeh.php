<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserControllerMeh extends Controller
{
    public function verified(){
        $users = User::whereNotNull('email_verified_at') -> get();
        return view('admin.usersVerified', compact('users'));
    }
    public function unverified(){
        $users = User::whereNull('email_verified_at') -> get();
        return view('admin.usersUnverified', compact('users'));
    }

    public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function userData($uid){
        $user = User::find($uid);
        $userOrders = Order::where('userId',$uid)->get();
        return view('admin.userData', compact('user','userOrders'));
    }
}
