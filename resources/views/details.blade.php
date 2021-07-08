<?php $title = config('knowledge-base.home_page_title');?>
@extends('knowledge-base::layouts.backend')
@section('content')
<div class="col-md-12">
    <div class="container bg-light">
        <div class="row">
            <div class="col-md-12">
                <h5><strong>{{ $article->article_name }}</strong></h5>
                <p>{{ $article->content }}</p>
                <div>Author: {{ $article->author }}</div>
            </div>
        </div>
    </div>
</div>
@endsection