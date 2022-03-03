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
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-info" type="button">Upload new image</button>
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
                            <label class="small mb-1" for="inputUsername">Username</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="...">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="name@example.com">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="inputPhone">Phone number</label>
                            <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="555-123-4567">
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputRole">Role</label>
                                <input class="form-control" id="inputRole" type="text" placeholder="Enter your role" value="Staff">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPosition">Position</label>
                                <input class="form-control" id="inputPosition" type="text" placeholder="Enter your Position" value="Academic">
                            </div>
                        </div> 
                            <div class="mb-3">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-info" type="button">Edit my profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

