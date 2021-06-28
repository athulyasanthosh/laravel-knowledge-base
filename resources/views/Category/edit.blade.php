<?php $title = "Edit FAQ Category";?>
@extends('knowledge-base::layouts.backend')

@section('content')
    <div class="offset-md-4 col-md-4">
        <form action="{{ route('category.update',$category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 p-2">
                    <div class="form-group">
                    <label for="category_name">Category Name<span class="text-danger">*</span>:</label>
                        <input type="text" name="category_name" id="category_name" placeholder="Category Name" class="form-control" value="{{ $category->category_name }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 cl-md-12">
                    <button type="submit" class="btn btn-primary w-25">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection