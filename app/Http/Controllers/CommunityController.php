<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\article;

class CommunityController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $users = User::count();
        $post = article::count();
        // $panitias = Panitia::count();
        // $ormawas = Ormawa::count();
        // $kegiatanpanitias = KegiatanPanitia::count();
        // $kegiatans = Kegiatan::count();
            return view('community.community',compact('post'));
        
    }

    public function loginpage()
    {
        return view('welcome');

    }

}
