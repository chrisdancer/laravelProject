<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest()->paginate(5);

        return view('layouts.articles.index',compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);
        $newArticle = Article::create($request->except('user_id'));
        $theme_id = $newArticle->theme_id;
        return redirect()->route('articles.show',  $theme_id)
            ->with('success','Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($relatedThemeID)
    {
        $articles = Article::where('theme_id', $relatedThemeID)->get()->toArray();
        $theme_names = Theme::where('id',$relatedThemeID)->get('name')->toArray();

        return view('layouts.articles.related', compact('articles'))
            ->with(['relatedThemeID' => $relatedThemeID,
                    'articles' => $articles,
                    'themes' =>  $theme_names]
            );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('layouts.articles.edit',compact('article'));
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
            'title' => 'required',
            'text' => 'required',
            'theme_id' => 'required'
        ]);

        $article->update($request->all());

        $articles = Article::latest()->paginate(5);

        return view('layouts.articles.index',compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        $articles = Article::latest()->paginate(5);

        return view('layouts.articles.index',compact('articles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function createRelatedArticle($relatedThemeID)
    {
        return view('layouts.articles.create')
            ->with('relatedThemeID',$relatedThemeID);
    }
}
