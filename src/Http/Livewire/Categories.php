<?php

namespace Athulya\LaravelKnowledgeBase\Http\Livewire;

use Athulya\LaravelKnowledgeBase\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class Categories extends Component
{
    public function create()
    {
        
    }
    public function render()
    {
        $categories = Category::latest()->paginate(5);
        return view('knowledge-base::livewire.category.categories', compact('categories'))->layout('knowledge-base::layouts.livewire.app')->slot('table');
    }
}
