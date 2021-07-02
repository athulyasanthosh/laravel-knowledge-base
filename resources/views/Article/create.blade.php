<?php $title = "Add new FAQ Category";?>
@extends('knowledge-base::layouts.backend')

@section('content')
    <div class="offset-md-4 col-md-4">
        @if(count($errors) > 0)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('article.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 cl-md-12 mb-2 p-2">
                    <div class="form-group">
                        <label for="article_name">Article Name<span class="text-danger">*</span>:</label>                        
                        <input type="text" name="article_name" id="article_name" placeholder="Article Name" class="form-control" value="{{ old('article_name') }}">
                    </div>
                    <div class="form-group">
                        <label for="author">Author<span class="text-danger">*</span>:</label>                        
                        <input type="text" name="author" id="author" placeholder="Author" class="form-control" value="{{ old('author') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 cl-md-12">
                    <button type="submit" class="btn btn-primary w-25">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection