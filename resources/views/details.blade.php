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
                <a href="{{ URL::previous() }}" class="btn btn-secondary">Go Back</a>
            </div>
            <div class="col-md-10">
                <?php 
                $type = Cookie::get('vote');
                $like = ($type == 'like')? 'disabled' : '';
                $disLike = ($type == 'dislike')? 'disabled' : '';
                //dd($type);
                ?>
                <button data-url ="{{ route('home.voting') }}" {{ $like }}  class="btn btn-success like-btn" data-id="{{ $article->id }}"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                <button data-url ="{{ route('home.voting') }}" {{ $disLike }} class="btn btn-danger dislike-btn" data-id="{{ $article->id }}"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>
                
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('vendor/athulya/js/details.js') }}"></script>
@endsection