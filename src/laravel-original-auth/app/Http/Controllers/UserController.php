<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(StoreUserRequest $request)
    {

        $user = new User();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->area = 'required';
        $user->experience = 'required';

        $user->save();

        return redirect()->route('user.profile');
    }

    public function getProfile()
    {
        return view('user.profile');
    }

    public function getSignin()
    {
        return view('user.signin');
    }

    public function postSignin(CheckUserRequest $request)
    {
        // Auth::attempt() → DBからユーザーを見つけ出し、存在していればtrue,存在していなければfalseを返却する　これでユーザー認証を手軽にできる
        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect()->route('user.profile');
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        // ログアウトできます
        Auth::logout();

        return redirect()->route('user.signin');
    }
}
