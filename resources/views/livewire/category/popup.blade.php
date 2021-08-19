  <!-- Modal -->
<div wire:ignore.self class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control mt-2" name="name" id="name" aria-describedby="name" placeholder="Enter Category Name" wire:model="name">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" wire:click="store">Save changes</button>
        </div>
      </div>
    </div>
</div>