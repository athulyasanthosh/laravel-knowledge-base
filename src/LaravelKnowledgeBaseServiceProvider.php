<?php

namespace Athulya\LaravelKnowledgeBase;

use Athulya\LaravelKnowledgeBase\Commands\LaravelKnowledgeBaseCommand;
use Athulya\LaravelKnowledgeBase\Http\Livewire\Articles;
use Athulya\LaravelKnowledgeBase\Http\Livewire\Categories;
use Athulya\LaravelKnowledgeBase\Http\Livewire\Details;
use Athulya\LaravelKnowledgeBase\Http\Livewire\FrontendKnowledgeBase;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelKnowledgeBaseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-knowledge-base')
            ->hasConfigFile()
            ->hasViews()
            ->hasAssets()
            ->hasRoutes(['web', 'api'])
            ->hasMigration('create_article_table')
            ->hasMigration('create_category_table')
            ->hasCommand(LaravelKnowledgeBaseCommand::class);
    }    
}
