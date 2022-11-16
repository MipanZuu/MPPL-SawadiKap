<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petunjuk;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home');
    }
    public function landing()
    {
        return view('mahasiswalanding');
    }
    public function petunjuk()
    {
        $petunjuk = Petunjuk::orderBy('id', 'desc')->first();
        return view('mahasiswadownload',['petunjuk' => $petunjuk]);
    }
    
}
