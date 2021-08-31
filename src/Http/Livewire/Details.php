<?php

namespace Athulya\LaravelKnowledgeBase\Http\Livewire;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class Details extends Component
{    
    public $category;
    public $slug;
    public $article;
    public $cookie;
    public $votingCountLike;
    public $votingCountDislike;
    public $previous;
    public $next;

    public function mount($category, $slug)
    {
        $this->article = Article::where('slug', $slug)->first();
        $this->previous = Article::where('id', '<', $this->article->id)->where('status', 0)->where('category_id', $this->article->category_id)->orderBy('id', 'desc')->first();
        $this->next = Article::where('id', '>', $this->article->id)->where('status', 0)->where('category_id', $this->article->category_id)->first();
    }

    public function voting($id, $vote)
    {
        Cookie::queue('vote-'.$id, $vote);
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
                    'dislikes' => $article->dislikes + 1,
                ];
            }
        }
        Article::where('id', $id)->update($data);
        $articleLikesCount = Article::select('likes','dislikes')->find($id);
        // $this->votingCountLike = $articleLikesCount->likes;
        // $this->votingCountDislike = $articleLikesCount->dislikes;
        if($vote == "like") {
            $this->emit('disableLike');
        } else {
            $this->emit('disableDislike');
        }
    }

    public function render()
    {
        return view('knowledge-base::livewire.details')->layout('knowledge-base::layouts.livewire.app');
    }
}
