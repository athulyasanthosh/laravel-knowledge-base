<?php

namespace Athulya\LaravelKnowledgeBase\Http\Livewire;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Articles extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $articleId;
    public $articleName;
    public $author;
    public $categoryId;
    public $content;
    public $status;
    public $message = '';

    public function create()
    {
        $this->articleName = '';
        $this->author = '';
        $this->categoryId = 0;
        $this->content = '';
        $this->status = 0;
        $this->articleId = 0;
    }

    public function store()
    {
        $this->validate([
            'articleName' => 'required',
            'author' => 'required',
            'content' => 'required',
            'categoryId' => 'required',
        ]);
        $slug = $this->slugGenerator($this->articleName);
        
        Article::updateOrCreate(['id' => $this->articleId], [
            'article_name' => $this->articleName,
            'author' => $this->author,
            'category_id' => $this->categoryId,
            'content' => $this->content,
            'slug' => $slug,
            'status' => $this->status,
        ]);
        session()->flash('message', 'Article Successfully Added');
        $this->emit('articleSaved');
        $this->articleName = '';
        $this->author = '';
        $this->categoryId = 0;
        $this->articleId = 0;
        $this->content = '';
        $this->status = 0;
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $this->articleName = $article->article_name;
        $this->author = $article->author;
        $this->categoryId = $article->category_id;
        $this->articleId = $article->id;
        $this->content = $article->content;
        $this->status = $article->status;
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        Session()->flash('message', 'Article Deleted Successfully');
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

    public function render()
    {
        $categories = Category::all();
        $articles = Article::latest()->paginate(5);

        return view('knowledge-base::livewire.article.article', compact('articles', 'categories'))->layout('knowledge-base::layouts.livewire.app');
    }
}
