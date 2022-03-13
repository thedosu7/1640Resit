<button class="btn btn-info d-inline float-md-end" data-toggle="modal" data-target="#exampleModal">Edit my profile</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.changePhoneNumber') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="new-phone-number" class="col-form-label">Phone number:</label>
                        <input type="tel" class="form-control @error('new-phone-number') is-invalid @enderror" id="new-phone-number" name="new-phone-number">
                        @if ($errors->has('new-phone-number'))
                        <span>
                            @error('new-phone-number')
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
        </div>
    </div>
</div>