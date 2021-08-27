  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="article" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="article_name">Article Name</label>
                <input type="text" class="form-control mt-2" name="articleName" id="article_name" aria-describedby="name" placeholder="Enter Article Name" wire:model="articleName">
                @error('articleName')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control mt-2" name="author" id="author" aria-describedby="name" placeholder="Enter Author Name" wire:model="author">
                @error('author')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
              <label for="category_id">Category<span class="text-danger">*</span>:</label>
              <select class="form-select form-control" name="categoryId" wire:model="categoryId">
                  <option value="">Select Category</option>                            
                  @foreach($categories as $category)                            
                  <option value="{{$category->id}}" {{ (old('categoryId') == $category->id )? 'selected': ''; }}>{{$category->category_name}}</option>
                  @endforeach
              </select>
              @error('categoryId')
                <div class="text-danger">{{ $message }}</div>
              @enderror
          </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" aria-describedby="content" wire:model="content"></textarea>
                @error('content')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status<span class="text-danger">*</span>:</label>                        
                <label><input type="radio" value="0" wire:model="status">Active</label>
                <label><input type="radio" value="1" wire:model="status">Inactive</label>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" wire:click="store">Save changes</button>
        </div>
      </div> 
    </div>
</div>