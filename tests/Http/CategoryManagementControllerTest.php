<?php
namespace Athulya\LaravelKnowledgeBase\Tests\Http;

use Athulya\LaravelKnowledgeBase\Models\Category;
use Athulya\LaravelKnowledgeBase\Tests\TestCase;

class CategoryManagementControllerTest extends TestCase
{
    /** @test */
    public function it_can_create_and_list_categories()
    {
        Category::create([
            'category_name' => 'general',
        ]);
        
        $this->assertDatabaseCount('categories', 1);        
    }

    /** @test */
    public function get_config()
    {
        $home_page_title = config('knowledge-base.home_page_title');
        $this->assertSame($home_page_title, 'Knowledge Base');
        $category_title_show = config('knowledge-base.category_title_show');
        $this->assertSame($category_title_show, true);
        $article_count_show = config('knowledge-base.article_count_show');
        $this->assertSame($article_count_show, true);
        $like_and_dislike = config('knowledge-base.like_and_dislike');
        $this->assertSame($like_and_dislike, true);
        $show_sidebar = config('knowledge-base.show_sidebar');
        $this->assertSame($show_sidebar, true);
    }
}
