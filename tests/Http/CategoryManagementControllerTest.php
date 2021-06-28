<?php

namespace Athulya\LaravelKnowledgeBase\Tests\Http;

use Athulya\LaravelKnowledgeBase\Models\Category;
use Athulya\LaravelKnowledgeBase\Tests\TestCase;
use Illuminate\Support\Facades\Route;

class CategoryManagementControllerTest  extends TestCase
{
    /** @test */
    public function it_can_create_and_list_categories()
    {
        Category::create([
            'category_name' => 'general'
        ]);        
       
        //$this->assertDatabaseCount('categories', 1);

        Route::category('');
        $this->get('/')->assertOk();
    }
}
