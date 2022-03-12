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
                        <!--div class="row gx-3 mb-3"-->
                            <div class="mb-3">
                                <label class="small mb-1" for="role">* Role:</label>
                                <input class="form-control" id="role" type="text" value="{{$user_role}}" disabled>
                            </div>
                            <!-- div class="col-md-6">
                                <label class="small mb-1" for="position">Position:</label>
                                <input class="form-control" id="position" type="text" value="Academic" disabled>
                            </!-->
                        </!--div> 
                            <div class="mb-3">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <!-- button class="btn btn-info" type="button">Edit my profile</!-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

