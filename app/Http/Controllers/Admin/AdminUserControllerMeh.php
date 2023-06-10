<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
