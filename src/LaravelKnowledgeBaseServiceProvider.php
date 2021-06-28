<?php

namespace Athulya\LaravelKnowledgeBase;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Athulya\LaravelKnowledgeBase\Commands\LaravelKnowledgeBaseCommand;

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
            ->hasMigration('create_article_table')
            ->hasMigration('create_category_table')
            ->hasCommand(LaravelKnowledgeBaseCommand::class);
    }
}
