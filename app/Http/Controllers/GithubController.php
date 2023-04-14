<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        try{
            $user = Socialite::driver('github')->user();

            $gitUser = User::updateOrCreate([
                'github_id' => $user->id
            ], [

                'name' => $user->nickname,
                'nickname' => $user->nickname,
                'email' => $user->email,
                'github_token' => $user->token,
                'auth_type' => 'github',
                'password' => Hash::make(Str::random(Str::length(10))),
            ]);

            Auth::login($gitUser);
        } 
        catch(Exception $e)
        {

        }
    }
}
