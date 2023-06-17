<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdminUserControllerMeh extends Controller
{
    public function verified(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {

            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->whereNotNull('email_verified_at');
            })->get();
        } else {
            $users = User::whereNotNull('email_verified_at')->get();
        }
        return view('admin.usersVerified', compact('users'));
    }
    public function unverified(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {

            $users = User::where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->whereNull('email_verified_at');
            })->get();
        } else {
            $users = User::whereNull('email_verified_at')->get();
        }
        return view('admin.usersVerified', compact('users'));
    }

    public function users(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $users = User::where('name', 'LIKE', "%$search%")->orWhere('email', 'LIKE', "%$search%")->get();
        } else {
            $users = User::all();
        }
        return view('admin.users', compact('users'));
    }


    public function userData($uid){
        $user = User::find($uid);
        $userOrders = Order::where('userId', $uid)->get();
        return view('admin.userData', compact('user', 'userOrders'));
    }

}
