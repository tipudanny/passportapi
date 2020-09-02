<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\User;

class loginController extends Controller
{
    public function index()
    {
        if (!Auth::check()){

            return response(['message' => 'You are not Authorized User.']);
        }
        $users = User::all();
        return response(['users'=>$users]);
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'email'     => 'required|string',
            'password'  => 'required|string',
        ]);

        if(!Auth::attempt($login)){
            return response(['message' => 'Invalid Lofin Credentials.']);
        }
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response(['user'=>Auth::user(), 'access_token' => $accessToken]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
        // return response(['users'=>$users]);
    }
}
