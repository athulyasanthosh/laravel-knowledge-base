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
                    <button class="btn btn-sm btn-primary pull-right" data-bs-toggle="modal" data-bs-target="#category" wire:click="create">Add Category</button>                    
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Category Name</th>
                <th scope="col">Updated At</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
            @forelse($categories as $category)
                <tr id="category_{{ $category->id }}">
                <th scope="row">{{ $i++ }}</th>
                <td width = "50%">{{ $category->category_name }}</td>
                <td>{{ $category->updated_at->format('Y-m-d H:i:s') }}</td>
                <td width = "20%">
                    <a class="btn btn-outline btn-warning" href="javascript:void(0)" wire:click="edit({{$category->id}})" data-bs-toggle="modal" data-bs-target="#category" rel="nofollow">Edit</a>
                    <a class="btn btn-outline btn-danger action-delete" href="javascript:void(0)" wire:click="destroy({{$category->id}})" rel="nofollow">Delete</a>                    
                </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="4">No data found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-center">{{ $categories->links() }}</div>
        
    </div>
    @include('knowledge-base::livewire.category.popup')
</div>
<script>
    document.addEventListener('livewre:load', function() {
        livewire.on('categorySaved', () => {
            $('#category').modal('hide');
        })
    })
</script>