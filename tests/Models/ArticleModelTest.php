<?php

namespace Athulya\LaravelKnowledgeBase\Tests\Models;

use Athulya\LaravelKnowledgeBase\Models\Article;
use Athulya\LaravelKnowledgeBase\Models\Category;
use Athulya\LaravelKnowledgeBase\Tests\TestCase;

class ArticleModelTest extends TestCase
{
    /** @test */
    public function this_will_create_a_faq_model()
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
    }

    /** @test */
    public function it_will_fetch_category_of_article()
    {
        Category::create(['category_name' => 'General']);
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
        $category = Article::first()->category->category_name;
        $this->assertEquals($category, 'General');
    }
}
