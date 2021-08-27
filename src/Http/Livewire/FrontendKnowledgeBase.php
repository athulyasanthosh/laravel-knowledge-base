<?php

namespace Athulya\LaravelKnowledgeBase\Http\Livewire;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Models\Category;
use Livewire\Component;

class FrontendKnowledgeBase extends Component
{
    public function render()
    {
        $categories = Category::all();
        $latestArticle = Article::orderBy('likes', 'DESC')
                        ->where('status', 0)
                        ->limit(5)
                        ->get();

        return view('knowledge-base::livewire.frontendknowledgebase', compact('categories', 'latestArticle'))->layout('knowledge-base::layouts.livewire.app');
    }
}
