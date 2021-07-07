<?php
namespace Athulya\LaravelKnowledgeBase\Http\Controllers;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //dd($request->category_id);
        $articleList = '';
        $categories = '';
        if (isset($request->category_id) && isset($request->keyword)) {
            $articleList = Article::where('category_id', $request->category_id)
                        ->where('article_name', 'like', '%'.$request->keyword.'%')
                        ->get();
        } elseif (isset($request->keyword)) {
            $articleList = Article::where('article_name', 'like', '%'.$request->keyword.'%')
                        ->get();
        } elseif (isset($request->category_id)) {
            $articleList = Article::where('category_id', $request->category_id)
                        ->get();
        }
        $categories = Category::latest()->get();
        $latestArticle = Article::orderBy('created_at', 'DESC')
                        ->limit(5)
                        ->get();

        return view('knowledge-base::home', compact('categories', 'articleList', 'latestArticle'));
    }

    public function articleDetail($slug)
    {
        dd($slug);
        $article = Article::where('slug', $slug)->first();
        dd($article);

        return view('knowledge-base::details', compact('article'));
    }
}
