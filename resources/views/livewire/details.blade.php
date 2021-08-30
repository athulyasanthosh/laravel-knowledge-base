<div class="col-md-12">
    <div class="container bg-light">
        <div class="row">
            <div class="col-md-12">
                <h5><strong>{{ $article->article_name }}</strong></h5>
                <p>{!! $article->content !!}</p>
                <div>Author: {{ $article->author }}</div>
            </div>            
        </div>
        <div class="row">
            <div class="col-md-2">
                <a href="{{ route('home.index') }}" class="btn btn-secondary">Go Back</a>
            </div>
            <?php $likeAndDislike = config('knowledge-base.like_and_dislike');?>
            <?php if($likeAndDislike): ?>
            <div class="col-md-4">
                <?php 
                $type = Cookie::get('vote-'.$article->id);                
                $like = ($type == 'like')? 'disabled' : '';
                $disLike = ($type == 'dislike')? 'disabled' : '';
                ?>
                <span>{{ $article->likes }}</span><button data-url ="{{ route('home.voting') }}" {{ $like }}  class="btn btn-success like-btn" data-id="{{ $article->id }}"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                <span>{{ $article->dislikes }}</span><button data-url ="{{ route('home.voting') }}" {{ $disLike }} class="btn btn-danger dislike-btn" data-id="{{ $article->id }}"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>                                
            </div>
            <?php endif; ?>
            <div class="col-md-6">               
                @if($previous)
                   @php $urlPart = Str::slug($previous->category->category_name); @endphp
                   <a class="btn btn-primary" href="{{ route('article.details',[$urlPart,$previous->slug]) }}">Previous</a>
                @endif                              
            
                @if($next)
                   @php $urlPart = Str::slug($next->category->category_name); @endphp
                   <a class="btn btn-primary" href="{{ route('article.details',[$urlPart,$next->slug]) }}">Next</a>
                @endif                
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            
        </div>
    </div>
</div>