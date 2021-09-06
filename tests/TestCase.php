<?php

namespace Athulya\LaravelKnowledgeBase\Tests;

use Athulya\LaravelKnowledgeBase\LaravelKnowledgeBaseServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Livewire\Livewire;
use Livewire\Component;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Athulya\\LaravelKnowledgeBase\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelKnowledgeBaseServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        
        include_once __DIR__.'/../database/migrations/create_category_table.php.stub';
        include_once __DIR__.'/../database/migrations/create_article_table.php.stub';
        (new \CreateCategoryTable())->up();
        (new \CreateArticleTable())->up();
    }
}
