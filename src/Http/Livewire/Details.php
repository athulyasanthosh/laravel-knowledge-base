<?php

namespace Athulya\LaravelKnowledgeBase\Http\Livewire;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Details extends Component
{
    //public $articleId;
    // protected $listeners = ['getDetails' => 'getDetails'];
    public $category;
    public $slug;
    public $article;

    public function mount($category, $slug)
    {
        $this->article = Article::where('slug', $slug)->first();
    }

    public function voting($id, $vote)
    {
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
    }

    public function render()
    {
        $article = $this->article;
        
        return view('knowledge-base::livewire.details', compact('article'))->layout('knowledge-base::layouts.livewire.app');
    }
}
