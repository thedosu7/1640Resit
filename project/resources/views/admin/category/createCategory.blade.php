<button class="btn btn-success btn-small d-inline float-md-end" data-toggle="modal" data-target="#exampleModal">CREATE
    NEW CATEGORY </button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new category</h5>
                <button type="button" class="btn close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.category.createCate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group @error('name') is-invalid @enderror">
                            <label for="name">Category name:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="">
                        </div>
                        @if ($errors->has('name'))
                        <span>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </span>
                        @endif
                    </div>
                    <div class="modal-body">
                        <div class="form-group @error('description') is-invalid @enderror">
                            <label for="name">Description:</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="">
                        </div>
                        @if ($errors->has('description'))
                        <span>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    @if ($errors->has('name')||$errors->has('description'))
        var delayInMilliseconds = 1000;
        setTimeout(function() {
        $("#exampleModal").modal('show');
        }, delayInMilliseconds);
    @endif
</script>