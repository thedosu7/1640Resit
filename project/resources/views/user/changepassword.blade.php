@extends('layouts.main')

@section('title', 'Change password')

@section('content')

    <div class="container-xl">
        <div class="row">
            <div class="col-xl-4">
                @include('user._avatar');
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Change password</div>
                    <div class="card-body">
                        <form action="{{ route('user.updatePassword') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="small mb-1 fw-bold" for="old-password">* Old password:</label>
                                <input class="form-control @error('old-password') is-invalid @enderror" id="old-password"
                                    name="old-password" type="password" placeholder="Enter old password"
                                    >
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
                                <input class="form-control @error('new-password') is-invalid @enderror" id="new-password"
                                    name="new-password" type="password" placeholder="Enter new password"
                                    >
                                @if ($errors->has('new-password'))
                                    <span>
                                        @error('new-password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label class="small mb-1 fw-bold" for="new-password_confirmation">* Confirm new
                                    password:</label>
                                <input class="form-control @error('new-password_confirmation') is-invalid @enderror"
                                    id="new-password_confirmation" name="new-password_confirmation" type="password"
                                    placeholder="Enter new password again" >
                                @if ($errors->has('new-password_confirmation'))
                                    <span>
                                        @error('new-password_confirmation')
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
