<?php

namespace Athulya\LaravelKnowledgeBase\Http\Livewire;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Models\Category;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class FrontendKnowledgeBase extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $categoryId;
    public $keyword;
    public $categories;
    public $latestArticle;
    public $articleList;

    public function search(Request $request)
    {
        $this->articleList = '';
        $this->categories = '';
        if (isset($this->categoryId) && isset($this->keyword)) {
            $this->articleList = Article::where('category_id', $this->categoryId)
                        ->where('article_name', 'like', '%'.$this->keyword.'%')
                        ->where('status', 0)
                        ->get();
        } elseif (isset($this->keyword)) {
            $this->articleList = Article::where('article_name', 'like', '%'.$this->keyword.'%')
                        ->where('status', 0)
                        ->get();
        } elseif (isset($this->categoryId)) {
            $this->articleList = Article::where('category_id', $this->categoryId)
                        ->where('status', 0)
                        ->get();
        }
    }

    public function articleDetails($id)
    {
        $this->emit('getDetails', $id);
    }

    public function render()
    {
        $this->categories = Category::all();
        $this->latestArticle = Article::orderBy('likes', 'DESC')
                        ->where('status', 0)
                        ->limit(5)
                        ->get();
        $categories = $this->categories;
        $articleList = $this->articleList;
        $latestArticle = $this->latestArticle;

        return view('knowledge-base::livewire.frontendknowledgebase', compact('categories', 'latestArticle', 'articleList'))->layout('knowledge-base::layouts.livewire.app');
    }
}
