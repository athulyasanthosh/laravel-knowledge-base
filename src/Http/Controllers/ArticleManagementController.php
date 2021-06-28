<?php

namespace Athulya\LaravelKnowledgeBase\Http\Controllers;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Illuminate\Routing\Controller;

class ArticleManagementController extends Controller
{
    public function index()
    {
        $articles = Article::all();        

        return view('knowledge-base::article.index', compact('articles'));
    }
}
