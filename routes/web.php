<?php

use Athulya\LaravelKnowledgeBase\Http\Controllers\ArticleManagementController;
use Athulya\LaravelKnowledgeBase\Http\Controllers\CategoryManagementController;
use Athulya\LaravelKnowledgeBase\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::macro('category',function(string $prefix){
    Route::prefix($prefix)->group(function(){
        Route::get('/', [CategoryManagementController::class,'index'])->name('category.index');
        Route::get('/create', [CategoryManagementController::class,'create'])->name('category.create');
        Route::post('/store', [CategoryManagementController::class,'store'])->name('category.store');
        Route::get('/edit/{category}', [CategoryManagementController::class,'edit'])->name('category.edit');
        Route::put('/update/{category}', [CategoryManagementController::class,'update'])->name('category.update');
        Route::delete('/destroy/{category}', [CategoryManagementController::class,'destroy'])->name('category.destroy');
    });
});

Route::macro('article',function(string $prefix){
    Route::prefix($prefix)->group(function(){
        Route::get('/', [ArticleManagementController::class,'index'])->name('article.index');
        Route::get('/create', [ArticleManagementController::class,'create'])->name('article.create');
        Route::post('/store', [ArticleManagementController::class,'store'])->name('article.store');
        Route::get('/edit/{article}', [ArticleManagementController::class,'edit'])->name('article.edit');
        Route::put('/update/{article}', [ArticleManagementController::class,'update'])->name('article.update');
        Route::delete('/destroy/{article}', [ArticleManagementController::class,'destroy'])->name('article.destroy');
    });
});

Route::macro('knowledgeBase',function(string $prefix){
    Route::prefix($prefix)->group(function(){
        Route::get('/', [HomeController::class,'index'])->name('home.index');   
        Route::post('/', [HomeController::class,'index'])->name('home.index');   
        Route::post('/search', [HomeController::class,'search'])->name('home.search');  
        Route::get('/articleDetail/{category}/{slug}', [HomeController::class,'articleDetail'])->name('article.details');
    });
});

?>