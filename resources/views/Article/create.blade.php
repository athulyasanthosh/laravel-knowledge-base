<?php $title = "Add new Article";?>
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
                    <div class="form-group">
                        <label for="category_id">Category<span class="text-danger">*</span>:</label>                        
                        <select class="form-select form-control" name="category_id">
                            <option value="">Select Category</option>                            
                            @foreach($categories as $category)                            
                            <option value="{{$category->id}}" {{ (old('category_id') == $category->id )? 'selected': ''; }}>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="content">Content<span class="text-danger">*</span>:</label>                        
                        <textarea type="text" name="content" id="content" placeholder="content" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status<span class="text-danger">*</span>:</label>                        
                        <label><input type="radio" name="status" value="0">Active</label>
                        <label><input type="radio" name="status" value="1">Inactive</label>
                    </div>
                    
                </div>
                <div class="col-xs-12 col-sm-12 cl-md-12">
                    <button type="submit" class="btn btn-primary w-25">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'content' );
        CKEDITOR.editorConfig = function( config )
        {
        config.language = 'en';
        enterMode : CKEDITOR.ENTER_BR;
        };
</script>
@endsection