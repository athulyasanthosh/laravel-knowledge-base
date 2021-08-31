<?php

namespace Athulya\LaravelKnowledgeBase\Http\Livewire;

use Athulya\LaravelKnowledgeBase\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name;
    public $categoryId;

    public function create()
    {
        $this->name = '';
        $this->categoryId = 0;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Category::updateOrCreate(['id' => $this->categoryId], ['category_name' => $this->name]);
        session()->flash('message', 'Category Successfully Added');
        $this->emit('categorySaved');
        $this->name = '';
    }

    public function edit($id)
    {
        $category = Category::find($id);
        $this->name = $category->category_name;
        $this->categoryId = $category->id;
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        Session()->flash('message', 'Category Deleted Successfully');
    }

    public function render()
    {
        $categories = Category::latest()->paginate(2);

        return view('knowledge-base::livewire.category.categories', compact('categories'))->layout('knowledge-base::layouts.livewire.app');
    }
}
