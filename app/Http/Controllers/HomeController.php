<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;
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

    public function viewJavaUser(Request $request)
    {
        $articles = DB::table('articles')->where([
            ['lang','jv'],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title','LIKE','%'. $term .'%')->orWhere('description','LIKE','%'. $term .'%')->paginate(10);
                }
            }]
        ])->orderby('id','asc')->paginate(10);
        
        return view('home-jawa',['articles' => $articles]);
    
    }

    public function viewSundaUser(Request $request)
    {
        $articles = DB::table('articles')->where([
            ['lang','su'],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title','LIKE','%'. $term .'%')->orWhere('description','LIKE','%'. $term .'%')->paginate(10);
                }
            }]
        ])->orderby('id','asc')->paginate(10);
        
        return view('User-Sunda',['articles' => $articles]);
    
    }

    public function viewMalayUser(Request $request)
    {
        $articles = DB::table('articles')->where([
            ['lang','ms'],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title','LIKE','%'. $term .'%')->orWhere('description','LIKE','%'. $term .'%')->paginate(10);
                }
            }]
        ])->orderby('id','asc')->paginate(10);
        
        return view('User-Malay',['articles' => $articles]);
    
    }
}
