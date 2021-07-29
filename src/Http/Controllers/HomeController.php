<?php
namespace Athulya\LaravelKnowledgeBase\Http\Controllers;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

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
                        ->simplePaginate(2);
            $articleList->appends(['category_id' => $request->category_id, 'article_name' => $request->keyword]);
            dd($articleList);
        //$articleList->appends(['search' => $request->category_id]);
                        //->get();
        } elseif (isset($request->keyword)) {
            $articleList = Article::where('article_name', 'like', '%'.$request->keyword.'%')
                        ->simplePaginate(2);
            $articleList->appends(['article_name' => $request->keyword]);
        //->get();
        } elseif (isset($request->category_id)) {
            $articleList = Article::where('category_id', $request->category_id)
                        ->simplePaginate(2);
            $articleList->appends(['category_id' => $request->category_id]);
            // ->get();
        }
        $categories = Category::latest()->get();
        $latestArticle = Article::orderBy('created_at', 'DESC')
                        ->limit(5)
                        ->get();

        return view('knowledge-base::home', compact('categories', 'articleList', 'latestArticle'));
    }

    public function articleDetail($category, $slug)
    {
        $article = Article::where('slug', $slug)->first();
        
        $previous = Article::where('id', '<', $article->id)->where('category_id', $article->category_id)->orderBy('id', 'desc')->first();
        $next = Article::where('id', '>', $article->id)->where('category_id', $article->category_id)->first();
                
        return view('knowledge-base::details', compact('article', 'previous', 'next'));
    }

    public function voting(Request $request)
    {
        $id = $request->id;
        $vote = $request->vote;
        $cookie = Cookie::forever('vote-'.$id, $vote);
        $article = Article::find($id);
        $type = Cookie::get('vote-'.$id);
        if ($type) {
            if ($vote == "like" && $type == 'dislike') {
                $data = [
                    'likes' => $article->likes + 1,
                    'dislikes' => $article->dislikes - 1,
                ];
            } elseif ($vote == "dislike" && $type == "like") {
                $data = [
                    'likes' => $article->likes - 1,
                    'dislikes' => $article->dislikes + 1,
                ];
            }
        } else {
            if ($vote == "like") {
                $data = [
                    'likes' => $article->likes + 1,
                ];
            } elseif ($vote == "dislike") {
                $data = [
                    'dislikes' => $article->likes + 1,
                ];
            }
        }
        
        Article::where('id', $id)->update($data);

        return response('view')->withCookie($cookie);
    }
}
