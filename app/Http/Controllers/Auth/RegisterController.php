<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //middelware 
    public function __construct()
    {
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        //validate data
        $this->validate($request, [
            'name'=>'required|max:222',
            'username'=>'required|max:222',
            'email'=>'required|email|max:222',
            'password'=>'required|confirmed',
        ]);

        //create user
            User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'username'=>$request->username,
                'password'=>Hash::make($request->password),
            ]);
                    auth()->attempt($request->only('email', 'password'));
            //whene the user sign in redirect the page
            return redirect()->route('dashboard');
    }
}