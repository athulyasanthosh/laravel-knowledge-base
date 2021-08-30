@section('style')
    <style type="text/css">
        #list{
            font-size: 20px;
        }  
        .category-select {
            margin-right: 5px;
        }  
        .list-container {
            margin-top: 20px;
        } 
        .category-heading {
            display: block
        }   
        .data-inline {
            display: inline;
        }
    </style>
@endsection

@php 
$title = config('knowledge-base.home_page_title');
$sidebar = config('knowledge-base.show_sidebar');
@endphp

<div class="col-md-12 test-class">
    <div class="container bg-light">
        <div class="row">
            @if($sidebar)
            <div class="col-md-8">
            @else
            <div class="col-md-12">
            @endif
                <div class="row">
                    <div class="col-md-12">
                        <h4> {{ $title }}</h4>
                    <hr>
                    </div>                            
                </div>
                <div class="row">
                    <div class="col-md-12"> 
                       
                            <div class="input-group">
                                <select class="form-select form-control category-select" name="category_id" wire:model="categoryId">
                                    <option value="">Select Category</option>                            
                                    @foreach($categories as $category)                            
                                    <option value="{{$category->id}}" {{ (old('category_id') == $category->id )? 'selected': ''; }}>{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="keyword" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" wire:model="keyword" />
                                <span class="input-group-text border-0" id="search-addon">
                                <button type="button" class="btn btn-default" wire:click="search"><i class="fas fa-search"></i></button>                                        
                                </span>
                            </div>
                    </div>
                </div>
                <div class="row list-container">
                    @php $i = 0; @endphp
                    @if(empty($articleList))
                        @forelse($categories as $category)
                            @if($category->article->count() > 0)
                                <div class="col-md-4">
                                    @if(config('knowledge-base.category_title_show') == true)
                                    <div class="category-heading">
                                        <h5 class="data-inline">{{ strToUpper($category->category_name) }}</h5>
                                        @if(config('knowledge-base.article_count_show') == true)
                                        <small>{{ '('.$category->article->count().')' }}</small>
                                        @endif
                                    </div>
                                    @endif
                                    <ul>
                                        @php $urlPart = Str::slug($category->category_name); @endphp
                                        @forelse($category->article as $articleData)  
                                            @if($articleData->status == 0)                                              
                                                <li><a href="{{ route('livewire.article.details',[$urlPart,$articleData->slug]) }}">{{ $articleData->article_name }}</a></li>
                                            @endif
                                        @empty
                                            <div class="text-muted">No records found.</div>
                                        @endforelse
                                    </ul>
                                </div>
                                @php $i++;                      
                                @endphp
                                @if($i % 2 == 0)
                                    </div><div class="row">
                                @endif
                            @endif
                        @empty
                            <div class="text-muted">No records found.</div>
                        @endforelse
                    @else
                    @forelse($articleList as $article)
                    @php $urlPart = Str::slug($article->category->category_name); @endphp
                    <div class="col-md-12">
                        <li><a href="{{ route('article.details',[$urlPart,$article->slug]) }}">{{ $article->article_name }}</a></li>
                    </div>                            
                    @empty
                        <div class="text-muted">No records found.</div>
                    @endforelse
                    <?php /*
                    <div class="col-md-12" style="margin-top: 20px;">{{ $articleList->links() }}</div>
                    */?>
                    @endif
                </div>
                
            </div>
            @if($sidebar)
            <div class="col-md-4">
                <h6>Latest Articles</h6>
                <ul>
                @forelse($latestArticle as $articleData)
                @php $urlPart = Str::slug($articleData->category->category_name); @endphp
                    <li><a href="{{ route('article.details',[$urlPart,$articleData->slug]) }}">{{ $articleData->article_name }}</a></li>
                @empty
                    <div class="text-muted">No records found.</div>
                @endforelse
                </ul>
            </div>
            @endif
        </div>        
    </div>
 </div> 