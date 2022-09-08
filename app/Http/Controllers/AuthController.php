<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function index(){
        return view('welcome');
    }

    function login(){
        return view('login');
    }

    function registration(){
        return view('registration');
    }

    function profile(){
        return view('profile');
    }

    function validate_registration(Request $request){
        $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
            ]);

        $data = $request->all();
        
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        
        return redirect('login')->with('success','Registartion successful, now you can login!');
    }

    function validate_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request -> only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect('dashboard');
        }

        return redirect('login')->with('success','Login details are not valid');
    }

    function dashboard(){
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect('login')->with('success','You arenot allowed to access');
    }

    function edit($id)
    {
        $data = User::find($id);
        return view('profile', ['User'=>$data]);
    }


    function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->password = $request->password;  
        $data->save();
        return redirect(route('dashboard'))->with('status', 'Profile Updated!');
    }

    function logout(){

        Auth::logout();

        return Redirect('login')->with('success','Logout Successfully');

    }



}



