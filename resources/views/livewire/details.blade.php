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
                <a href="{{ route('frontend.knowledgebase.livewire') }}" class="btn btn-secondary">Go Back</a>
            </div>
            <?php $likeAndDislike = config('knowledge-base.like_and_dislike');?>
            <?php if($likeAndDislike): ?>
            <div class="col-md-4">
                <?php 
                $type = Cookie::get('vote-'.$article->id);                
                $like = ($type == 'like')? 'disabled' : '';
                $disLike = ($type == 'dislike')? 'disabled' : '';
                ?>
                <span>{{ $article->likes }}</span><button {{ $like }}  class="btn btn-success like-btn" wire:click="voting({{$article->id}}, 'like')"><i class="fa fa-thumbs-up" aria-hidden="true"></i></button>
                <span>{{ $article->dislikes }}</span><button  {{ $disLike }} class="btn btn-danger dislike-btn" wire:click="voting({{$article->id}}, 'dislike')"><i class="fa fa-thumbs-down" aria-hidden="true"></i></button>                                
            </div>
            <?php endif; ?>
            
            <div class="col-md-6">               
                @if($previous)
                   @php $urlPart = Str::slug($previous->category->category_name); @endphp
                   <a class="btn btn-primary" href="{{ route('livewire.article.details',[$urlPart,$previous->slug]) }}">Previous</a>
                @endif                              
            
                @if($next)
                   @php $urlPart = Str::slug($next->category->category_name); @endphp
                   <a class="btn btn-primary" href="{{ route('livewire.article.details',[$urlPart,$next->slug]) }}">Next</a>
                @endif                
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">            
        </div>
    </div>
</div>
<script>
    document.addEventListener('livewre:load', function() {
        livewire.on('disableLike', () => {
            $('.like-btn').prop("disabled", true);
            $('.dislike-btn').prop("disabled", false);
        });
    });
    document.addEventListener('livewre:load', function() {
        livewire.on('disableDislike', () => {
            $('.like-btn').prop("disabled", false);
            $('.dislike-btn').prop("disabled", true);
        });
    });
</script>