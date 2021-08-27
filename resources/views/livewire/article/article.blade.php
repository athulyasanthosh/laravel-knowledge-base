<div class="row">
    <div class="col-md-12">
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>{{ $message }}</p>
            </div>
        @endif
        <div id="response-message" class="d-none"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="float-right mb-4">
                    <button class="btn btn-sm btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#article" wire:click="create">Add Article</button>                    
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Article Name</th>
                    <th scope="col">Category</th>
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
                <td width = "25%">{{ $article->article_name }}</td>
                <td width = "25%">{{ $article->category->category_name }}</td>
                <td width = "30%">{{ $article->author }}</td>
                <td>{{ $article->updated_at->format('Y-m-d H:i:s') }}</td>
                <td width = "20%">
                    <a class="btn btn-outline btn-warning" href="javascript:void(0)" wire:click="edit({{$article->id}})" data-bs-toggle="modal" data-bs-target="#article" rel="nofollow">Edit</a>
                    <a class="btn btn-outline btn-danger action-delete" href="javascript:void(0)" wire:click="destroy({{$article->id}})" rel="nofollow">Delete</a>                     
                </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="4">No data found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">{{ $articles->links() }}</div>
        
    </div>
    @include('knowledge-base::livewire.article.popup')
</div>
<script>
    document.addEventListener('livewre:load', function() {
        livewire.on('articleSaved', () => {
            $('#article').modal('hide');
        })
    })
</script>