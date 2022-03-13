@extends('layouts.main')

@section('title','Change password')

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
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Change password</div>
                <div class="card-body">
                    <form action="{{route('user.updatePassword')}}" method="POST">
                        <div class="mb-3">
                            <label class="small mb-1" for="old-password">Old password:</label>
                            <input class="form-control" id="old-password" type="password" placeholder="Enter old password">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="new-password">New password:</label>
                            <input class="form-control" id="new-password" type="password" placeholder="Enter new password">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="new-password-confirm">Confirm new password:</label>
                            <input class="form-control" id="new-password-confirm" type="password" placeholder="Enter new password again">
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-info" type="button">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection