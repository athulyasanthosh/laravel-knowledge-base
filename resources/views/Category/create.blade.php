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
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 cl-md-12 mb-2 p-2">
                    <div class="form-group">
                    <label for="category_name">Category Name<span class="text-danger">*</span>:</label>                        
                        <input type="text" name="category_name" id="category_name" placeholder="Category Name" class="form-control" value="{{ old('category_name') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 cl-md-12">
                    <button type="submit" class="btn btn-primary w-25">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection