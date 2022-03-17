@extends('layouts.main')

@section('title','Profile User')

@section('content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  {{session('message')}}
</div>
@endif
<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card border-info mb-4 mb-xl-0">
                <div class="card-header" style="background-color: #5DBAE8;">Profile Picture</div>
                <div class="card-body text-center" style="background-color: #FFFED1;">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle img-thumbnail mb-2" src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="profile_image" style="width: 300px; height: 300px; object-fit: cover;">
                    <!-- Profile picture upload button-->
                    @include('user.uploadimg')
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card border-info mb-4">
                <div class="card-header" style="background-color: #5DBAE8;">Account Details</div>
                <div class="card-body" style="background-color: #FFFED1;">
                    <form action="{{ route('user.changePhoneNumber') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold" for="name">* Username:</label>
                            <input class="form-control" id="name" type="text" value="{{$user->name}}" style="background-color: #E1F5FE;" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold" for="email">* Email address:</label>
                            <input class="form-control" id="email" type="email" value="{{$user->email}}" style="background-color: #E1F5FE;" disabled>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold" for="new-phone-number">* Phone number:</label>
                            <input class="form-control" class="form-control @error('new-phone-number') is-invalid @enderror" id="new-phone-number" name="new-phone-number" value="{{$user->phone_number}}" style="background-color: #E1F5FE;">
                        </div>
                        @if ($errors->has('new-phone-number'))
                        <span>
                            @error('new-phone-number')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </span>
                        @endif
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold" for="role">* Role:</label>
                            <input class="form-control" id="role" type="text" value="{{$user_role}}" style="background-color: #E1F5FE;" disabled>
                        </div>
                        <button type="submit" class="btn btn-primary">Edit my profile</button>
                    </form>
                </div>
                <!-- @include('user.changeinfo') -->
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