<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;
use App\Models\Snippet;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function add_process_admin(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'lang'=> 'required',
            'artikel'=> 'required',
        ]);
        article::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'lang' => $request['lang'],
            'artikel' => $request['artikel'],
        ]);
        return redirect()->route('admin')->with('success', 'Artikel Berhasil Ditambahkan');

    }
    public function edit_process_admin(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'lang'=> 'required',
            'artikel'=> 'required',
        ]);
        article::where('id',$request->id)->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'lang' => $request['lang'],
            'artikel' => $request['artikel'],
        ]);
        return redirect()->route('admin-manage-post')->with('success', 'Artikel Berhasil Ditambahkan');

    }

    public function getArticle($id){
		$articels = article::where('id',$id)->first();
        $snippets = Snippet::all()->random(1);
        // dd($snippets);
        return view('isi-artikel',['articels' => $articels], ['snippets' => $snippets]);
    }

    public function getArticleUser($id){
		$articels = article::where('id',$id)->first();
        return view('isi-artikelUser',['articels' => $articels]);
    }

    public function getLanguage($lang){
		$articels = article::where('lang',$lang)->first();
        return view('isi-artikel',['articels' => $articels]);
    }

   
}
