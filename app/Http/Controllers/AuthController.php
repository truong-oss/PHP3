<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function login()
    {
        return view('auth.login');
    }

   

    // Hiển thị form đăng ký
    public function showregister()
    {
        return view('auth.register');
    }
    public function loginpost(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=> 'required',
        ]);
        if(Auth::attempt($credentials)){
            // dd(Auth::user()); //hiển thị thông tin chi tiết tk ddawng nhập
            return redirect()->route('admin.dashboard');

        }
        return back()->withErrors(['email' => 'thông tin đăng nhập ko chính xác']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');

    }
    public function register(  Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' =>'required|email|unique:users,email',
            'password' =>'required|min:8|confirmed'
        ]);
       $user = User::create([
        'name' =>$data['name'],
        'email' =>$data['email'],
        'password' =>$data['password'],
        'role' =>User::ROLE_USER



       ]);
       Auth::login($user);
       return redirect()->route('admin.dashboard');
    }

    
}
