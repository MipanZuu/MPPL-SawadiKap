<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Ormawa;
use App\Models\Petunjuk;
use App\Models\Mhsormawa;
use App\Models\Divisi;
use App\Models\Panitia;
use App\Models\NilaiPanitia;
use App\Models\KegiatanPanitia;
use App\Models\Kegiatan;
use App\Models\Tahap;
use App\Models\NilaiOrmawa;
use Illuminate\Support\Facades\Hash;
use App\Models\Article;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;
use PDF;
use Response;

class AdminController extends Controller
{

    // public function handle($request, Closure $next)
    // {
    //     if(Auth::user())
    //     {
    //         return $next($request);
    //     }
    //     return redirect('/');
    // }

    public function listUser(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
        $data = User::where([
            ['user_id','!=',NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nama','LIKE','%'. $term .'%')->orWhere('username','LIKE','%'. $term .'%')->orWhere('role','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderBy('user_id','asc')->paginate(10);
        return view('listUser',['listOfUsers' => $data]);
    }


    public function listManajemenKegiatan(Request $request)
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
        $data = User::where([
            ['user_id','!=',NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('nama','LIKE','%'. $term .'%')->orWhere('username','LIKE','%'. $term .'%')->orWhere('role','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderBy('user_id','asc')->paginate(10);
        return view('listUser',['listOfUsers' => $data]);
    }


    public function tambahUser()
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
        return view('tambahUser');
    }

    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            $users = User::count();
            $post = article::count();
            // $panitias = Panitia::count();
            // $ormawas = Ormawa::count();
            // $kegiatanpanitias = KegiatanPanitia::count();
            // $kegiatans = Kegiatan::count();
            if ($user->role == 'Admin'){
                return view('admin.admin',compact('post'));
            }
            else if($user->role == 'User'){
                return redirect('ormawa');
            }
            if($user->role == 'Community'){
                return redirect('community');
            }
        }
        return redirect('welcome');
    }

    public function loginpage()
    {
        return view('welcome');

    }
    

    public function viewMalayAdmin(Request $request)
    {
        $articles = DB::table('articles')->where([
            ['lang','ms'],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title','LIKE','%'. $term .'%')->orWhere('description','LIKE','%'. $term .'%')->paginate(10);
                }
            }]
        ])->orderby('id','asc')->paginate(10);

       
        
        return view('admin.admin-malay',['articles' => $articles]);
    }

    public function viewJavaAdmin(Request $request)
    {
        $articles = DB::table('articles')->where([
            ['lang','jv'],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title','LIKE','%'. $term .'%')->orWhere('description','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderby('id','asc')->get();
        
        return view('admin.admin-jawa',['articles' => $articles]);
    }

    public function viewSundaAdmin(Request $request)
    {
        $articles = DB::table('articles')->where([
            ['lang','su'],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title','LIKE','%'. $term .'%')->orWhere('description','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderby('id','asc')->get();
        
        return view('admin.admin-Sunda',['articles' => $articles]);
    }

    public function viewProfile()
    {
        return view('profile');
    }

    public function viewIndoAdmin(){
        return view('admin.admin');
    }

    public function addposting(){
        return view('admin.addpost');
    }


    public function adminManagePost(Request $request)
    {

        $articles = DB::table('articles')->where([
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('lang','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderby('id','asc')->get();
        return view('admin.admin-manage-post',['articles' => $articles]);
    }


    public function adminEditPost($id){
        $articels = article::where('id',$id)->first();
        return view('admin.admin-edit-post',['articels' => $articels]);
    }


    public function deletePost(Request $request){
        $id = $request['id'];
		if (article::where('id', '=', $id)->exists()) {
            $articles = article::where('id',$id)->delete();
            return redirect()->route('admin.admin-manage-post')->with('success', 'Post Berhasil Dihapus');
        }
		return redirect('admin.admin-manage-post')->withErrors('Post tidak ditemukan');
    }

    public function RequestedTopics(){
        return view('admin.admin-topic',[
            "topics" => Topic::all()
        ]);
    }

    
    public function login(Request $request){
       $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $cridentials = $request->only('username','password');
        // dd($cridentials);
        // dd(Auth::attempt($cridentials));
        if(Auth::attempt($cridentials)){
            // dd("salah");
            return redirect()->route('admin')->withSuccess('Signed in');
        }
        return redirect('login')->withErrors('Login details are not valid');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function userUpdate(Request $request){
        // dd($request);
        $request->validate([
            'user_id' => 'required',
            'username' => 'required|unique:users,username',
            'nama' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::where('user_id',$request->user_id)->update([
			'username' => $request->username,
			'nama' => $request->nama,
			'password' => Hash::make($request['password']),
            'role' => $request->role,
		]);
        return redirect()->route('getUser', [$request->user_id])->with('success', 'User Berhasil Diupdate');
    }

    public function addUser(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
        $request->validate([
            'username' => 'required|unique:users,username',
            'nama' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::create([
            'username' => $request['username'],
            'nama' => $request['nama'],
            'role' => $request['role'],
            'password' => Hash::make($request['password'])
        ]);
        return redirect()->route('tambahUser')->with('success', 'User Berhasil Ditambahkan');
    }

    public function getUser($id){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
		$user = User::where('user_id',$id)->first();
        return view('edituser',['user' => $user]);
    }

    public function destroy(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Ormawa'){
                return redirect('ormawa');
            }
            if($user->role == 'Panitia'){
                return redirect('panitia');
            }
        }
        else return redirect('login');
        $id = $request['user_id'];
		if (User::where('user_id', '=', $id)->exists()) {
            $user = User::where('user_id',$id)->delete();
            return redirect()->route('listUser')->with('success', 'User Berhasil Dihapus');
        }
		return redirect('listUser')->withErrors('User tidak ditemukan');
    }
    
}