<?php

use Athulya\LaravelKnowledgeBase\Http\Livewire\Articles;
use Athulya\LaravelKnowledgeBase\Http\Livewire\Categories;
use Athulya\LaravelKnowledgeBase\Http\Livewire\FrontendKnowledgeBase;
use Illuminate\Support\Facades\Route;

Route::macro('knowledgelivewire',function(string $prefix){
    Route::prefix($prefix)->group(function(){
        Route::get('/categories', Categories::class)->name('backend.category.livewire');
        Route::get('/articles', Articles::class)->name('backend.article.livewire');
        Route::get('/knowledge-base', FrontendKnowledgeBase::class)->name('frontend.knowledgebase.livewire');
    });
});

?>