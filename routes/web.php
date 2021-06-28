<?php

use Athulya\LaravelKnowledgeBase\Http\Controllers\ArticleManagementController;
use Athulya\LaravelKnowledgeBase\Http\Controllers\CategoryManagementController;
use Illuminate\Support\Facades\Route;

Route::macro('category',function(string $prefix){
    Route::prefix($prefix)->group(function(){
        Route::get('/', [CategoryManagementController::class,'index'])->name('category.index');
        Route::get('/create', [CategoryManagementController::class,'create'])->name('category.create');
        /*Route::post('/store', [CategoryManagementController::class,'store'])->name('category.store');
        Route::get('/edit/{category}', [CategoryManagementController::class,'edit'])->name('category.edit');
        Route::put('/update/{category}', [CategoryManagementController::class,'update'])->name('category.update');
        Route::delete('/destroy/{category}', [CategoryManagementController::class,'destroy'])->name('category.destroy');*/
    });
});

Route::macro('article',function(string $prefix){
    Route::prefix($prefix)->group(function(){
        Route::get('/', [ArticleManagementController::class,'index'])->name('article.index');
        Route::get('/create', [ArticleManagementController::class,'create'])->name('article.create');
        /*Route::post('/store', [CategoryManagementController::class,'store'])->name('category.store');
        Route::get('/edit/{category}', [CategoryManagementController::class,'edit'])->name('category.edit');
        Route::put('/update/{category}', [CategoryManagementController::class,'update'])->name('category.update');
        Route::delete('/destroy/{category}', [CategoryManagementController::class,'destroy'])->name('category.destroy');*/
    });
});
?>