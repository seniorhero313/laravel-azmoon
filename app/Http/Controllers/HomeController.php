<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::latest()->paginate(10);
        return view('index',compact('articles'));
    }

    public function article($id)
    {
        $article = Articles::whereId($id)->first();
        $img = unserialize($article->images)['images'];
        $img = $img['600'];
        return view('article',compact('article','img'));
    }
}
