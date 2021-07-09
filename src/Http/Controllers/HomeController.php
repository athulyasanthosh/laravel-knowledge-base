<?php
namespace Athulya\LaravelKnowledgeBase\Http\Controllers;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;

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
                        ->paginate(2);
            $articleList->appends(['category_id' => $request->category_id, 'article_name' => $request->keyword]);
            dd($articleList);
        //$articleList->appends(['search' => $request->category_id]);
                        //->get();
        } elseif (isset($request->keyword)) {
            $articleList = Article::where('article_name', 'like', '%'.$request->keyword.'%')
                        ->paginate(2);
            $articleList->appends(['article_name' => $request->keyword]);
        //->get();
        } elseif (isset($request->category_id)) {
            $articleList = Article::where('category_id', $request->category_id)
                        ->paginate(2);
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

        return view('knowledge-base::details', compact('article'));
    }

    public function voting(Request $request) {      
        
        $id = $request->id;
        $vote = $request->vote;
        $cookie = Cookie::forever('vote', $vote);
        return response('view')->withCookie($cookie);
        

        //cookie()::queue('vote', $vote, time() + ( 365 * 24 * 60 * 60));
       // cookie('vote', $vote, time() + ( 365 * 24 * 60 * 60));
       // $type = $request->cookie('vote');
        //dd($type);
        //$this->setCookie();
        $article = Article::find($id);
        //Cookie::queue('vote', $vote, time() + ( 365 * 24 * 60 * 60));
        //Cookie::forever('vote', $vote);
        //$type = Cookie::get('vote');
        $type = Cookie::get('vote');
        
        
        if($vote = "like") {
            $data = [
                'likes' => $request->likes + 1
            ];
        } else {            
            $data = [
                'dislikes' => $request->dislikes + 1
            ];
        }
        Article::where('id', $id)->update($data);
        return response('view')->withCookie($cookie);
    }

    public function setCookie(Request $request){
        //dd('hi');
        $response = new Response('Hello World');
        $response->withCookie(cookie('vote', 'hello'));
        return $response;
     }
}
