<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    
    public function destroy(){
    
        auth()->logout();
    
        return redirect('/');
    
    }
    public function login(){
        
        return view('user.signin');
    
    }
    public function store(){
        $this->validate(request(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
        
        if(! auth()->attempt(request(['email','password']))){
        
            return back()->withErrors(
                ['message'=>'Invalid E-mail adress Or password']
            );
        
        }

        session()->flash('my','Wlecome '.auth()->user()->name);
    
        return redirect('/');
    
    }
}
