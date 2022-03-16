<button class="btn btn-success btn-small d-inline float-md-end" data-toggle="modal" data-target="#exampleModal">CREATE NEW IDEA</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            @if($missions->count() == 0)
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Can not submit idea right now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @else
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create new idea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('ideas.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="idea-title" class="col-form-label">Title:</label>
                        <input type="text" class="form-control @error('idea-title') is-invalid @enderror" id="idea-title" name="title">
                        @if ($errors->has('idea-title'))
                        <span>
                            @error('idea-title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </span>
                        @endif
                    </div>
                    <div class="form-group @error('idea-content') is-invalid @enderror">
                        <label for="idea-content" class="col-form-label" rows="5">Content:</label>
                        <textarea class="form-control" id="idea-content" name="content"></textarea>
                        @if ($errors->has('idea-content'))
                        <span>
                            @error('idea-content')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </span>
                        @endif
                    </div>
                    <div class="form-group @error('idea-category') is-invalid @enderror">
                        <label for="idea-category">Category:</label> <br />
                        <select name="mission_id" class="form-control" id="idea-category">
                            @foreach($missions as $m)
                                <option value="{{ $m->id }}">{{ $m->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('idea-category'))
                        <span>
                            @error('idea-category')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </span>
                        @endif
                    </div>
                    <div class="form-group @error('choosen-file') is-invalid @enderror">
                        <label for="choosen-file" class="col-form-label">Choose file:</label><br />
                        <input type="file" class="form-control-file" id="choosen-file">
                    </div><br>
                    <div class="form-check @error('form-check-input') is-invalid @enderror">
                        <input type="checkbox" class="form-check-input" id="is-agree">
                        <label class="form-check-label" for="is-agree">I agree with all terms and conditions</label>
                    </div>
                    @if ($errors->has('is-agree'))
                    <span>
                        @error('is-agree')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </span>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>