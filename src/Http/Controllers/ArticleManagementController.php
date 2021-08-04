<?php

namespace Athulya\LaravelKnowledgeBase\Http\Controllers;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class ArticleManagementController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('knowledge-base::article.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('knowledge-base::article.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $article = $request->validate([
            'article_name' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
       
        $slug = $this->slugGenerator($article['article_name']);
        $article['slug'] = $slug;
        Article::create($article);

        return redirect()->route('article.index')
                         ->with('success', 'Article added successfully');
    }

    public function edit(Article $article)
    {
        $categories = Category::all();

        return view('knowledge-base::article.edit', compact('article', 'categories'));
    }

    public function update(Request $request, Article $article)
    {
        $articleData = $request->validate([
            'article_name' => 'required',
            'author' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
        $article->update($articleData);

        return redirect()->route('article.index')
                         ->with('success', 'Article updated successfully');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            $status = [
                'status' => 'ok',
                'message' => 'success',
                'data' => "Article deleted successfully ",
            ];

            return response()->json($status);
        }
    }

    private function slugGenerator($name)
    {
        $slug = Str::slug($name);
        $article = Article::where('slug', $slug)->get();
        $allSlugs = Article::where('slug', 'like', $slug.'%')->pluck('slug')->toArray();
        
        if ($article->count() > 0 && in_array($slug, $allSlugs)) {
            $count = 0;
            while (in_array(($slug . '-' . ++$count), $allSlugs));
            $slug .= '-' . $count;
        }

        return $slug;
    }
}
