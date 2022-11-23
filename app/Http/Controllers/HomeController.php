<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home');
    }
    public function landing()
    {
        return view('welcome');
    }
    public function petunjuk()
    {
        // $petunjuk = Petunjuk::orderBy('id', 'desc')->first();
        // return view('mahasiswadownload',['petunjuk' => $petunjuk]);
    }
    
    public function signupPage()
    {
        return view('signup');
    }

    public function signupUser(Request $request){
        $request->validate([
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::create([
            'username' => $request['username'],
            'name' => $request['name'],
            'role' => $request['role'],
            'password' => Hash::make($request['password'])
        ]);
        return redirect()->route('landing')->with('success', 'Sign Up Success');
    }
    
}
