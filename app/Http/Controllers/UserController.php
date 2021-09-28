<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function __construct()
    {
//        $this->middleware('user.login.check');
    }

    public function login_page(){
        return view("login");
    }
    public function registration_page(){
        return view("registration");
    }
    public function registration(Request $request): RedirectResponse
    {
        $password = $request->input('password');
        $confirm_password = $request->input('confirm_password');
        $email = $request->input('email');
        $gender = $request->input('gender');

        $user = User::all()->where('email', $email)->first();

        if ($user!=null){
            return redirect()->back()->with(['data'=>"User Already Exist with this Email"]);
        }
        if ($password!=$confirm_password){
            return redirect()->back()->with(['data'=>"Password dose Not Match!"]);
        }
        User::create([
            "first_name"=>$request->input('first_name'),
            "last_name"=>$request->input('last_name'),
            "email"=>$email,
            "gender"=>$gender,
            "password"=>Hash::make($password)
        ]);
        return redirect()-> route('user.login.page');
    }
    public function login(Request $request): RedirectResponse
    {
        $user = User::all()->where('email', $request->input('email'))->first();
        if ($user==null){
            return redirect()->back()->with(['data'=>"User dose not exist with this Email!"]);
        }
        if (!Hash::check($request->input('password'),$user->password)){
            return redirect()->back()->with(['data'=>"Password not match!"]);
        }
        $request->session()->put('user_id', $user->id);

        return redirect()->route('index')->with('user', $user);

    }
    public function logout(): RedirectResponse
    {
        session()->flash('user_id');
        return redirect()->route('user.login.page');
    }

}
