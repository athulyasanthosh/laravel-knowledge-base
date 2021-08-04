<?php
namespace Athulya\LaravelKnowledgeBase\Http\Controllers;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $articleList = '';
        $categories = '';
        if (isset($request->category_id) && isset($request->keyword)) {
            $articleList = Article::where('category_id', $request->category_id)
                        ->where('article_name', 'like', '%'.$request->keyword.'%')
                        ->where('status', 0)
                        ->simplePaginate(2);
            $articleList->appends(['category_id' => $request->category_id, 'article_name' => $request->keyword]);
        } elseif (isset($request->keyword)) {
            $articleList = Article::where('article_name', 'like', '%'.$request->keyword.'%')
                        ->where('status', 0)
                        ->simplePaginate(2);
            $articleList->appends(['article_name' => $request->keyword]);
        } elseif (isset($request->category_id)) {
            $articleList = Article::where('category_id', $request->category_id)
                        ->where('status', 0)
                        ->simplePaginate(2);
            $articleList->appends(['category_id' => $request->category_id]);
        }
        $categories = Category::latest()->get();
        $latestArticle = Article::orderBy('likes', 'DESC')
                        ->where('status', 0)
                        ->limit(5)
                        ->get();
        
        if ($request->expectsJson()) {
            $datas = [
                'categories' => $categories,
                'articleList' => $articleList,
                'latestArticle' => $latestArticle,
            ];
            $response = [
                'success' => true,
                'data' => $datas,
                'message' => 'Success',
            ];

            return response()->json($response, 200);
        } else {
            return view('knowledge-base::home', compact('categories', 'articleList', 'latestArticle'));
        }
    }

    public function articleDetail($category, $slug, Request $request)
    {
        $article = Article::where('slug', $slug)->first();
        $previous = Article::where('id', '<', $article->id)->where('status', 0)->where('category_id', $article->category_id)->orderBy('id', 'desc')->first();
        $next = Article::where('id', '>', $article->id)->where('status', 0)->where('category_id', $article->category_id)->first();
        
        if ($request->expectsJson()) {
            $datas = [
                'article' => $article,
                'previous' => $previous,
                'next' => $next,
            ];
            $response = [
                'success' => true,
                'data' => $datas,
                'message' => 'Success',
            ];

            return response()->json($response, 200);
        } else {
            return view('knowledge-base::details', compact('article', 'previous', 'next'));
        }
    }

    public function voting(Request $request)
    {
        $id = $request->id;
        $vote = $request->vote;
        $cookie = Cookie::forever('vote-'.$id, $vote);
        $article = Article::find($id);
        $type = Cookie::get('vote-'.$id);
        $data = [];
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
            } elseif ($vote == $type) {
                $response = [
                    'success' => false,
                    'message' => 'Same vote request',
                ];

                return response()->json($response, 200);
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
        if (! $request->ajax() && $request->expectsJson()) {
            $response = [
                'success' => true,
                'message' => 'Voting has been done!',
            ];

            return response()->json($response, 200)->withCookie($cookie);
        }

        return response('view')->withCookie($cookie);
    }
    
    public function popular()
    {
        $latestArticle = Article::orderBy('likes', 'DESC')
                        ->where('status', 0)
                        ->limit(5)
                        ->get();
                        
        $response = [
            'success' => true,
            'data' => $latestArticle,
            'message' => 'Success',
        ];

        return response()->json($response, 200);
    }
}
