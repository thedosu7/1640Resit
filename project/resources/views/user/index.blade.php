@extends('layouts.main')

@section('title','Profile User')

@section('content')

<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                    <!-- Profile picture upload button-->
                    <!--button class="btn btn-success" type="button">Upload new image</!--button-->
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="small mb-1" for="name">* Username:</label>
                            <input class="form-control" id="name" type="text" value="{{$user->name}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="email">* Email address:</label>
                            <input class="form-control" id="email" type="email" value="{{$user->email}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="phone">* Phone number:</label>
                            <input class="form-control" id="phone" type="tel" placeholder="Enter your phone number" value="{{$user->phone_number}}" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="role">* Role:</label>
                            <input class="form-control" id="role" type="text" value="{{$user_role}}" disabled>
                        </div>
                    </form>
                </div>
                <!-- Save changes button-->
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