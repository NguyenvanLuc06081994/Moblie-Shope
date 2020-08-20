<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(Request  $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email =  $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');
    }

    public function showFormLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $data = [
          'username'=>$request->username,
          'password'=>$request->password
        ];

        if (!Auth::attempt($data)){
            Session::flash('isLogin','dang nhap khong thanh cong. tai khoan hoac mat khau khong dung');
            return redirect()->route('login');
        }
        return redirect()->route('products.list');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
