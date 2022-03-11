@extends('layouts.main')

@section('title', 'Ideas')

@section('custom-css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div>
                <h4 class="title d-inline">LASTEST IDEA</h4>
                <button class="btn btn-success d-inline float-md-end" data-toggle="modal" data-target="#exampleModal">CREATE NEW IDEA</button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
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
                                        <input type="text" class="form-control" id="idea-title" name="title">
                                        @if ($errors->has('idea-title'))
                                        <span>
                                            @error('idea-title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
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
                                    <div class="form-group ">
                                        <label for="idea-category">Category:</label> <br />
                                        <select class="form-control" id="idea-category">
                                            <option value="IT">IT</option>
                                            <option value="BU">BUSINESS</option>
                                            <option value="GD">GRAPHIC DESIGN</option>
                                        </select>
                                        @if ($errors->has('idea-category'))
                                        <span>
                                            @error('idea-category')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="choosen-file" class="col-form-label">Choose file:</label><br />
                                        <input type="file" class="form-control-file" id="choosen-file">
                                    </div><br>
                                    <div class="form-check">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-lg-3">
                <div class="card">
                    <div class="card-body ">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('ideas._search')
        </div>
    </div>
</div>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection


