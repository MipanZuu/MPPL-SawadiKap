<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\article;

class ArticleController extends Controller
{
    public function show()
    {
        return "Artikel berhasil ditambahkan";
    }
    public function add_process_admin(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'language'=> 'required',
            'artikel'=> 'required',
        ]);
        article::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'language' => $request['language'],
            'artikel' => $request['artikel']
        ]);
        return redirect()->route('admin')->with('success', 'Artikel Berhasil Ditambahkan');

    }
}
