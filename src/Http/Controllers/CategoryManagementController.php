<?php
namespace Athulya\LaravelKnowledgeBase\Http\Controllers;

use Athulya\LaravelKnowledgeBase\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryManagementController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('knowledge-base::category.index', compact('categories'));
    }

    public function create()
    {
        return view('knowledge-base::category.create');
    }

    public function store(Request $request)
    {
        $category = $request->validate([
            'category_name' => 'required',
        ]);
        
        Category::create($category);

        return redirect()->route('category.index')
                         ->with('success', 'Category added successfully');
    }

    public function edit(Category $category)
    {
        return view('knowledge-base::category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'category_name' => 'required',
        ]);

        $category->update($data);

        return redirect()->route('category.index')
                         ->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if($category) {
            $category->delete();
            $status = [
                'status' => 'ok',
                'message' => 'success',
                'data' => "Category deleted successfully ",
            ];

            return response()->json($status);
        }        
    }
}
