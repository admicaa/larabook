<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('index');
        $this->middleware('guest')->except('index');
    }

    public function register(){
        return view('user.signup');
    }


    public function store(){
        $this->validate(request(),[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
        $user = User::create([
            'name'=>request()->name,
            'email'=>request()->email,
            'password'=>bcrypt(request()->password)
            
        ]);
        auth()->login($user);
        return redirect('/');
    }

    public function index(){
        return view('user.profile');
    }
}
