<?php $title = "List all Categories";?>
@extends('knowledge-base::layouts.backend')

@section('content')
<div class="col-md-2">
    @include('knowledge-base::layouts.partial.sidebar')
</div>

<div class="col-md-8">
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
        </div>
    @endif
    <div id="response-message" class="d-none"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="float-right mb-4">
                        <a href="{{ route('article.create') }}" class="btn btn-sm btn-primary pull-right"> Add Category</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Article Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                @forelse($articles as $article)
                    <tr id="article_{{ $article->id }}">
                    <th scope="row">{{ $i++ }}</th>
                    <td width = "50%">{{ $article->article_name }}</td>
                    <td width = "30%">{{ $article->author }}</td>
                    <td>{{ $article->updated_at->format('Y-m-d H:i:s') }}</td>
                    <td width = "20%">
                        <a class="btn btn-outline btn-warning" href="{{ route('article.edit',$article->id) }}" rel="nofollow">Edit</a>
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-outline btn-danger action-delete" data-url="{{ route('article.destroy',$article->id) }}" data-id="{{ $article->id }}" rel="nofollow">Delete</a>
                    </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="4">No data found</td>
                    </tr>
                @endforelse
                </tbody>
                </table>
            
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('vendor/athulya/js/article.js') }}"></script>
@endsection