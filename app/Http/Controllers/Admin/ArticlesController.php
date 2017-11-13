<?php

namespace App\Http\Controllers\Admin;

use App\Articles;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::latest()->paginate(20);
        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $imagesUrl = $this->uploadImages($request->file('images'));
        $imagesUrl = serialize($imagesUrl);

        $body = strip_tags($request->body);
        $desc = mb_substr($body,0,200,"utf-8");
        if(count($desc) > 210){
            $desc = $desc . "...";
        }
        $req = array_merge($request->all() , [ 'images' => $imagesUrl, 'description' => $desc]);
        auth()->user()->article()->create($req);

        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Articles $article
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Articles $article)
    {
        $img = unserialize($article->images);
        return view('admin.articles.edit',compact('article','img'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest|Request $request
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(ArticleRequest $request,$id)
    {
        $imagesUrl = null;
        if($request->file('images') != null){
            $imagesUrl = $this->uploadImages($request->file('images'));
            $imagesUrl = serialize($imagesUrl);
        }


        $body = strip_tags($request->body);
        $desc = mb_substr($body,0,200,"utf-8");
        if(strlen($desc) > 210){
            $desc = $desc . "...";
        }

        $req = array_merge($request->all() , [ 'images' => $imagesUrl, 'description' => $desc]);
        unset($req['_token']);
        unset($req['_method']);
        auth()->user()->article()->where('id',$id)->update($req);
        return redirect(route('articles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $article)
    {
        $article->delete();
        return redirect(route('articles.index'));
    }
}
