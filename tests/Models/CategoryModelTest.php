<?php

namespace Athulya\LaravelKnowledgeBase\Tests\Models;

use Athulya\LaravelKnowledgeBase\Models\Category;
use Athulya\LaravelKnowledgeBase\Tests\TestCase;

class CategoryModelTest extends TestCase
{
    /** @test */
    public function this_will_create_a_categoy_model()
    {
        Category::create(['category_name' => 'General']);

        $this->assertDatabaseCount('categories', 1);
    }
}
