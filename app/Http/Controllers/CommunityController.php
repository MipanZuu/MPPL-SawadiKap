<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\article;
use App\Models\Topic;
use Illuminate\Support\Facades\DB;

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

    public function viewSundaCommunity(Request $request)
    {
        $articles = DB::table('articles')->where([
            ['lang','su'],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title','LIKE','%'. $term .'%')->orWhere('description','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderby('id','asc')->get();
        
        return view('community.community-Sunda',['articles' => $articles]);
    }

    public function viewMalayCommunity(Request $request)
    {
        $articles = DB::table('articles')->where([
            ['lang','ms'],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title','LIKE','%'. $term .'%')->orWhere('description','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderby('id','asc')->get();
        
        return view('community.community-malay',['articles' => $articles]);
    }

    public function viewJawaCommunity(Request $request)
    {
        $articles = DB::table('articles')->where([
            ['lang','jv'],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('title','LIKE','%'. $term .'%')->orWhere('description','LIKE','%'. $term .'%')->get();
                }
            }]
        ])->orderby('id','asc')->get();
        
        return view('community.community-jawa',['articles' => $articles]);
    }

    public function addTopicCommunity(){

        return view('community.addTopic');
    }

    public function addTopic(Request $request){
           
        $topic = $request->validate([
            'topic'=> 'required'
        ]);
        Topic::create($topic);
        return redirect()->route('community')->with('success', 'Topic Berhasil Ditambahkan');

        
    }

}
