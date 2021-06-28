<?php
namespace Athulya\LaravelKnowledgeBase\Http\Controllers;

use Athulya\LaravelKnowledgeBase\Models\Category;
use Illuminate\Routing\Controller;

class CategoryManagementController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $categories = 'Hello';

        return view('knowledge-base::category.index', compact('categories'));
    }
}
