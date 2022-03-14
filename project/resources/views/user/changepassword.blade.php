@extends('layouts.main')

@section('title','Change password')

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
                    <img class="img-account-profile rounded-circle img-thumbnail mb-2" 
                    src="{{asset('/storage/images/'.Auth::user()->avatar)}}" 
                    alt="profile_image" style="width: 300px; height: 300px; object-fit: cover;">
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card border-info mb-4">
                <div class="card-header" style="background-color: #5DBAE8;">Change password</div>
                <div class="card-body" style="background-color: #FFFED1;">
                    <form action="{{route('user.updatePassword')}}" method="POST">
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold" for="old-password">* Old password:</label>
                            <input class="form-control @error('old-password') is-invalid @enderror" id="old-password" name="old-password" type="password" placeholder="Enter old password" style="background-color: #CBF3F9;">
                            @if ($errors->has('old-password'))
                            <span>
                                @error('old-password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold" for="new-password">* New password:</label>
                            <input class="form-control @error('new-password') is-invalid @enderror" id="new-password" name="new-password" type="password" placeholder="Enter new password" style="background-color: #CBF3F9;">
                            @if ($errors->has('new-password'))
                            <span>
                                @error('new-password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1 fw-bold" for="new-password_confirmation">* Confirm new password:</label>
                            <input class="form-control @error('new-password_confirmation') is-invalid @enderror" id="new-password_confirmation" name="new-password-confirm" type="password" placeholder="Enter new password again" style="background-color: #CBF3F9;">
                            @if ($errors->has('new-password-confirmation'))
                            <span>
                                @error('new-password-confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </span>
                            @endif
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-info d-grid" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection