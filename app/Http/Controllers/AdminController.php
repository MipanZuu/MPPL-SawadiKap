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
use Illuminate\Support\Facades\DB;
use PDF;
use Response;

class AdminController extends Controller
{

    public function handle($request, Closure $next)
    {
        if(Auth::user())
        {
            return $next($request);
        }
        return redirect('/');
    }

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
                return redirect('panitia');
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
                    $query->orWhere('title','LIKE','%'. $term .'%')->orWhere('description','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderby('id','asc')->get();
        
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
    public function listormawa(Request $request)
    {
        $data = Ormawa::join('users','ormawa.user_id','=','users.user_id')->select(
            'users.nama as namauser', 'id', 'ormawa.nama as namaormawa')->where([
            ['id','!=',NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('namaormawa','LIKE','%'. $term .'%')->orWhere('namauser','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderBy('id','asc')->paginate(10);
        return view('listormawa',['ormawas' => $data]);
    }
    public function tambahOrmawa()
    {
        $data = User::where('role','Ormawa')->get();
        return view('tambahormawa',['users' => $data]);
    }
    public function addOrmawa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'user_id'=> 'required'
        ]);
        Ormawa::create([
            'nama' => $request['nama'],
            'user_id'=> $request['user_id']
        ]);
        return redirect()->route('tambahormawa')->with('success', 'Ormawa Berhasil Ditambahkan');
    }
    public function editOrmawa($id){
		$ormawa = Ormawa::where('id',$id)->first();
        $data = User::where('role','Ormawa')->get();
        return view('editormawa',['ormawa' => $ormawa,'users' => $data]);
    }

    public function deleteOrmawa(Request $request){
        $id = $request['id'];
		if (Ormawa::where('id', '=', $id)->exists()) {
            $Ormawa = Ormawa::where('id',$id)->delete();
            return redirect()->route('listormawa')->with('success', 'Ormawa Berhasil Dihapus');
        }
		return redirect('listormawa')->withErrors('Ormawa tidak ditemukan');
    }
    
    public function updateOrmawa(Request $request){
        $request->validate([
            'nama' => 'required',
            'user_id'=> 'required'
        ]);
        Ormawa::where('id',$request->id)->update([
			'nama' => $request->nama,
            'user_id' => $request->user_id,
		]);
        return redirect()->route('ormawa.edit', [$request->id])->with('success', 'Ormawa Berhasil Diupdate');
    }

    public function listPanitia(Request $request)
    {
        $data = Panitia::join('users','panitia.user_id','=','users.user_id')->select(
            'users.nama as namauser', 'id', 'panitia.kelompok as kelompok')->where([
            ['id','!=',NULL]
        ])->where(function ($query) use ($request) {
            $query->where('users.nama', 'LIKE', '%' . $request->term . '%' )->orWhere('panitia.kelompok', 'LIKE', '%' . $request->term . '%' );
        })->orderBy('id','asc')->paginate(10);
        return view('listpanitia',['panitias' => $data]);
    }
    public function tambahPanitia()
    {
        $data = User::where('role','Panitia')->get();
        return view('tambahpanitia',['users' => $data]);
    }
    public function addPanitia(Request $request)
    {
        $request->validate([
            'kelompok' => 'required',
            'user_id'=> 'required'
        ]);
        Panitia::create([
            'kelompok' => $request['kelompok'],
            'user_id'=> $request['user_id']
        ]);
        return redirect()->route('tambahpanitia')->with('success', 'Panitia Berhasil Ditambahkan');
    }
    public function editPanitia($id){
		$panitia = Panitia::where('id',$id)->first();
        $data = User::where('role','Panitia')->get();
        return view('editpanitia',['panitia' => $panitia,'users' => $data]);
    }

    public function deletePanitia(Request $request){
        $id = $request['id'];
		if (Panitia::where('id', '=', $id)->exists()) {
            $Panitia = Panitia::where('id',$id)->delete();
            return redirect()->route('listpanitia')->with('success', 'Panitia Berhasil Dihapus');
        }
		return redirect('listpanitia')->withErrors('Panitia tidak ditemukan');
    }
    
    public function updatePanitia(Request $request){
        $request->validate([
            'kelompok' => 'required',
            'user_id'=> 'required'
        ]);
        Panitia::where('id',$request->id)->update([
			'kelompok' => $request->kelompok,
            'user_id' => $request->user_id,
		]);
        return redirect()->route('panitia.edit', [$request->id])->with('success', 'Panitia Berhasil Diupdate');
    }
    
    public function listDivisi(Request $request)
    {
        $data = Divisi::where([
            ['id','!=',NULL]
        ])->where(function ($query) use ($request) {
            $query->where('nama', 'LIKE', '%' . $request->term . '%' );
        })->orderBy('id','asc')->paginate(10);
        return view('listdivisi',['divisis' => $data]);
    }
    public function tambahDivisi()
    {
        return view('tambahdivisi');
    }
    public function addDivisi(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        Divisi::create([
            'nama' => $request['nama'],
        ]);
        return redirect()->route('tambahdivisi')->with('success', 'Panitia Berhasil Ditambahkan');
    }
    public function editDivisi($id){
        $divisi = Divisi::where('id',$id)->first();
        return view('editdivisi',['divisi' => $divisi]);
    }

    public function deleteDivisi(Request $request){
        $id = $request['id'];
		if (Divisi::where('id', '=', $id)->exists()) {
            $Divisi = Divisi::where('id',$id)->delete();
            return redirect()->route('listdivisi')->with('success', 'Divisi Berhasil Dihapus');
        }
		return redirect('listdivisi')->withErrors('Divisi tidak ditemukan');
    }
    
    public function updateDivisi(Request $request){
        $request->validate([
            'nama' => 'required',
        ]);
        Divisi::where('id',$request->id)->update([
			'nama' => $request->nama,
		]);
        return redirect()->route('divisi.edit', [$request->id])->with('success', 'Divisi Berhasil Diupdate');
    }

    public function listkegiatanpanitia(Request $request)
    {
        $data = KegiatanPanitia::join('tahap','kegiatan_panitia.tahap','=','tahap.id')->join('divisi','kegiatan_panitia.divisi','=','divisi.id')->select(
            'kegiatan_panitia.*', 'tahap.nama as nama_tahap','tahap.status as status', 'divisi.nama as nama_divisi' )->where([
            ['kegiatan_panitia.id','!=',NULL]
        ])->where(function ($query) use ($request) {
            $query->where('nama_kegiatan', 'LIKE', '%' . $request->term . '%' )->orWhere('tahap', 'LIKE', '%' . $request->term . '%' )->orWhere(
                'divisi', 'LIKE', '%' . $request->term . '%' );
        })->orderBy('kegiatan_panitia.id','asc')->paginate(10);
        return view('listkegiatanpanitia',['kegiatans' => $data]);
    }
    public function tambahkegiatanpanitia()
    {
        $divisi = Divisi::get();
        $tahap = Tahap::where([['tipe','=','0']])->get();
        return view('tambahkegiatanpanitia',['tahaps'=> $tahap, 'divisis' => $divisi]);
    }
    public function addkegiatanpanitia(Request $request)
    {
        $request->validate([
            'tahap'=> 'required',
            'nama_kegiatan'=> 'required',
            'divisi'=> 'required',
            'sn'=> 'required',
        ]);
        $keg = KegiatanPanitia::create([
            'tahap' => $request['tahap'],
            'nama_kegiatan' => $request['nama_kegiatan'],
            'divisi' => $request['divisi'],
            'sn' => $request['sn'],
        ]);
        $sn = $keg->sn;
        $mhs = Mahasiswa::get();
        foreach($mhs as $m){
            NilaiPanitia::create([
                'id_kegiatan' => $keg->id,
                'id_mhs'=> $m->id,
                'bn'=> 0,
                'tn'=> 0 * $sn,
            ]);
        }
        return redirect()->route('tambahkegiatanpanitia')->with('success', 'Kegiatan Berhasil Ditambahkan');
    }
    public function editkegiatanpanitia($id){
        $tahap = Tahap::where([['tipe','=','0']])->get();
        $divisi = Divisi::get();
        return view('editkegiatanpanitia',['tahaps' => $tahap,'divisis'=>$divisi,'id_kegiatan'=>$id]);
    }

    public function deletekegiatanpanitia(Request $request){
        $id = $request['id'];
		if (KegiatanPanitia::where('id', '=', $id)->exists()) {
            $Panitia = KegiatanPanitia::where('id',$id)->delete();
            $Nilai = NilaiPanitia::where('id_kegiatan',$id)->delete();
            return redirect()->route('listkegiatanpanitia')->with('success', 'Kegiatan Berhasil Dihapus');
        }
		return redirect('listkegiatanpanitia')->withErrors('Kegiatan tidak ditemukan');
    }
    
    public function updatekegiatanpanitia(Request $request){
        $request->validate([
            'tahap'=> 'required',
            'nama_kegiatan'=> 'required',
            'divisi'=> 'required',
            'sn'=> 'required',
        ]);
        KegiatanPanitia::where('id',$request->id)->update([
			'tahap' => $request['tahap'],
            'nama_kegiatan' => $request['nama_kegiatan'],
            'divisi' => $request['divisi'],
            'sn' => $request['sn'],
		]);
        $Nilai = NilaiPanitia::where('id_kegiatan',$request->id)->get();
        foreach($Nilai as $n){
            NilaiPanitia::where('id','=',$n->id)->update([
                'tn' => $request['sn'] * $n->bn
            ]);
        }
        return redirect()->route('kegiatanpanitia.edit', [$request->id])->with('success', 'Kegiatan Berhasil Diupdate');
    }

    public function uploadpetunjuk()
    {
        return view('mahasiswaimportpdf');
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|mimes:pdf|max:4096'
            ]);
            $request->file->store('petunjuk', 'public');
            $petunjuk = new Petunjuk([
                "file_path" => $request->file->hashName()
            ]);
            $petunjuk->save(); 
           
            
            return redirect()->back()->withSuccess('File succesfully uploaded');
        }
        else {
            return redirect()->back()->withErrors(['No file given']);
        }
    }
    public function tambahMahasiswa()
    {
        return view('tambahmahasiswa');
    }
    public function editMahasiswa($id){
        $mahasiswa = Mahasiswa::where('id','=',$id)->first();
        return view('editmahasiswa',['mahasiswa'=>$mahasiswa]);
    }
    public function addMahasiswa(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_cerebrum'=> 'required|unique:mahasiswa,id_cerebrum',
            'tanggal_lahir' => 'required',
            'kelompok' => 'required',
            'prodi' => 'required'
        ]);
        Mahasiswa::create([
            'nama' => $request['nama'],
            'id_cerebrum'=> $request['id_cerebrum'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'kelompok' => $request['kelompok'],
            'prodi' => $request['prodi'],
        ]);
        return redirect()->route('tambahmahasiswa')->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }
    public function updateMahasiswa(Request $request){
        $request->validate([
            'nama' => 'required',
            'id_cerebrum'=> 'required',
            'tanggal_lahir' => 'required',
            'kelompok' => 'required',
            'prodi' => 'required'
        ]);
        Mahasiswa::where('id',$request->id)->update([
			'nama' => $request['nama'],
            'id_cerebrum'=> $request['id_cerebrum'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'kelompok' => $request['kelompok'],
            'prodi' => $request['prodi'],
		]);
        return redirect()->route('listmahasiswa')->with('success', 'Mahasiswa Berhasil edit');
    }
    public function deleteMahasiswa(Request $request){
        $id = $request['id'];
		if (Mahasiswa::where('id', '=', $id)->exists()) {
            $Mahasiswa = Mahasiswa::where('id',$id)->delete();
            return redirect()->route('listmahasiswa')->with('success', 'Mahasiswa Berhasil Dihapus');
        }
		return redirect('listmahasiswa')->withErrors('Mahasiswa tidak ditemukan');
    }

    public function backup(Request $request){
        $mahasiswas = Mahasiswa::all();
        $all = collect();
        foreach($mahasiswas as $mahasiswa){
            $nilais = Tahap::leftJoin('kegiatan_ormawa','tahap.id','=','kegiatan_ormawa.jenis_kegiatan')->leftJoin(
                'kegiatan_panitia','tahap.id','=','kegiatan_panitia.tahap')->leftJoin(
                    'nilai_ormawa','kegiatan_ormawa.id','=','nilai_ormawa.id_kegiatan')->leftJoin(
                        'divisi','divisi.id','=','kegiatan_panitia.divisi')->leftJoin(
                        'mahasiswa','nilai_ormawa.id_mhs','=','mahasiswa.id')->leftJoin(
                            'nilai_panitia','kegiatan_panitia.id','=','nilai_panitia.id_kegiatan')->leftJoin('ormawa','ormawa.id','=','kegiatan_ormawa.id_ormawa')->where(
                                    'nilai_panitia.id_mhs','=',$mahasiswa->id)->orWhere('nilai_ormawa.id_mhs','=',$mahasiswa->id)->select('mahasiswa.nama as nama','mahasiswa.id_cerebrum as id_cerebrum',
                                        'nilai_panitia.*','kegiatan_panitia.sn as sn','kegiatan_panitia.nama_kegiatan as kegiatan',
                                        'divisi.nama as divisi','tahap.nama as tahap','nilai_ormawa.bn as bn2','nilai_ormawa.tn as tn2','kegiatan_ormawa.sn as sn2',
                                        'kegiatan_ormawa.nama_kegiatan as kegiatan2','ormawa.nama as nama_ormawa')->orderBy('tahap.id')->get();
            foreach($nilais as $nilai) {
                $nilai->nama = $mahasiswa->nama;
                $nilai->id_cerebrum = $mahasiswa->id_cerebrum;
                $all->add($nilai);
            }
        }
        
        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=backup.csv", // <- name of file
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
        ];
        $columns  = ['Nama', "ID Cerebrum", 'Divisi', 'Tahap', 'Kegiatan','SN','BN','TN'];
        $callback = function () use ($all, $columns) {
            $file = fopen('php://output', 'w'); //<-here. name of file is written in headers
            fputcsv($file, $columns);
            foreach ($all as $res) {
                if($res->sn!=null){
                    fputcsv($file, [$res->nama, $res->id_cerebrum, $res->divisi, $res->tahap, $res->kegiatan,$res->sn, $res->bn, $res->tn]);
                }
                else {
                    fputcsv($file, [$res->nama, $res->id_cerebrum, $res->nama_ormawa , $res->tahap, $res->kegiatan2,$res->sn2, $res->bn2, $res->tn2]);
                }
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);  
        
    }
    public function reset(){
       return view('reset');
    }
    public function deleteAll(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            if($user->role == 'Super User'){
                Divisi::whereNotNull('id')->delete();
                Kegiatan::whereNotNull('id')->delete();
                KegiatanPanitia::whereNotNull('id')->delete();
                Mahasiswa::whereNotNull('id')->delete();
                Mhsormawa::whereNotNull('id')->delete();
                NilaiOrmawa::whereNotNull('id')->delete();
                NilaiPanitia::whereNotNull('id')->delete();
                Tahap::whereNotNull('id')->delete();
            }
        }
        return redirect('admin');
    }
}