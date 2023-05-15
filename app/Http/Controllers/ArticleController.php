<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create')
            ->with('url_form',url('/articles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name = null;
        $request->validate([
            'title' => 'required|string|max:50',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->file('image')){
            $image_name = $request->file('image')->store('images', 'public');
        }
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image' => $image_name,
        ]);
        return redirect('/articles')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
            return view('articles.create')
                ->with('url_form',url('/articles/'.$article->id))
                ->with('data',$article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

                $request->validate([
                    'title' => 'required|string|max:50',
                    'content' => 'required|string',
                    'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                if($request->file('image')){
                    if($article->featured_image && file_exists(storage_path('app/public/' . $article->featured_image))){
                        \Storage::delete('public/'.$article->featured_image);
                    }
                    $image_name = $request->file('image')->store('images', 'public');
                } else {
                    $image_name = $article->featured_image;
                }
                $article->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'featured_image' => $image_name,
                ]);
                return redirect('/articles')->with('success', 'Artikel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    public function cetak_pdf(){
        $articles = Article::all();
        $pdf = PDF::loadview('articles.articles_pdf',['articles'=>$articles]);
        return $pdf->stream();
    }
}
