<?php

namespace Athulya\LaravelKnowledgeBase\Tests\Http;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Tests\TestCase;
use Illuminate\Support\Facades\Route;

class ArticleManagementControllerTest extends TestCase
{
    /** @test */
    public function it_can_create_and_list_articles()
    {
        Article::create([

            'category_id' => 1,
            'article_name' => 'movies',
            'slug' => 'test',
            'status' => 0,
            'likes' => 0,
            'dislikes' => 0,
            'author' => 'athulya',
            'content' => 'Test content',
        ]);

        $this->assertDatabaseCount('articles', 1);

        // Route::article('');
        //$this->get('/')->assertOk();

        // $first = Article::first();
        // $first->update(['article_name' => 'virus']);
        // $this->assertDatabaseCount('articles', 1);
        // $this->get('/')->assertOk()->assertSee('virus');
    }
}
