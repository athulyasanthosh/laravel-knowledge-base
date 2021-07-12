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
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('home.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
            <?php $likeAndDislike = config('knowledge-base.like_and_dislike');?>
            <?php if($likeAndDislike): ?>
            <div class="col-md-10">
                <?php 
                $type = Cookie::get('vote-'.$article->id);                
                $like = ($type == 'like')? 'disabled' : '';
                $disLike = ($type == 'dislike')? 'disabled' : '';
                ?>
                <span>{{ $article->likes }}</span><button data-url ="{{ route('home.voting') }}" {{ $like }}  class="btn btn-success like-btn" data-id="{{ $article->id }}"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                <span>{{ $article->dislikes }}</span><button data-url ="{{ route('home.voting') }}" {{ $disLike }} class="btn btn-danger dislike-btn" data-id="{{ $article->id }}"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>                                
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('vendor/athulya/js/details.js') }}"></script>
@endsection