<?php

namespace Athulya\LaravelKnowledgeBase\Tests\Http;

use Athulya\LaravelKnowledgeBase\Models\Category;
use Athulya\LaravelKnowledgeBase\Tests\TestCase;
use Illuminate\Support\Facades\Route;

class CategoryManagementControllerTest extends TestCase
{
    /** @test */
    public function it_can_create_and_list_categories()
    {
        Category::create([
            'category_name' => 'general',
        ]);
        // Route::category('test');
        // $this->get('/test/create')->assertOk();
        $this->assertDatabaseCount('categories', 1);

        /*$first = Category::first();
        $first->update(['category_name' => 'politics']);

        $this->assertDatabaseCount('categories', 1);
        $this->get('/')->assertOk()->assertSee('politics');*/
    }
}
