<?php

use Athulya\LaravelKnowledgeBase\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::macro('knowledgeApi',function(string $prefix){
    Route::prefix($prefix)->group(function(){
        Route::get('/', [HomeController::class,'index'])->name('api.home.index');   
        Route::post('/', [HomeController::class,'index'])->name('api.home.index'); 
        Route::get('/article-detail/{category}/{slug}', [HomeController::class,'articleDetail'])->name('api.article.details');
        Route::get('/popular-article', [HomeController::class,'popular'])->name('api.home.popular');   
        Route::post('/voting', [HomeController::class,'voting'])->name('api.home.voting');   
    });
});

?>
