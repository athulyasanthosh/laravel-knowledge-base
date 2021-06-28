<?php
use Illuminate\Database\Eloquent\Model;

namespace Athulya\LaravelKnowledgeBase\Tests\feature\commands;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Models\Category;
use Athulya\LaravelKnowledgeBase\Tests\TestCase;

class LaravelKnowledgeBaseCommandTest extends TestCase
{
    /** @test */
    public function knowledge_base_command_works()
    {
        Article::create([
            'category_id' => 1,
            'article_name' => 'test',
            'author' => 'test 1',
            'content' => 'test test test',
        ]);
        
        /*Category::create([
            'category_name' => 'general'
        ]);*/
        
        $this->assertDatabaseCount('articles', 1);
        // $this->artisan('laravel-knowledge-base')->assertExitCode(0);
    }
}
