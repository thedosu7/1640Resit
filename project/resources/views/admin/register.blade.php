@extends('layouts.admin')
@section('content')
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Account</title>
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/edit.css')}}">
</head>
<body>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Welcome to Admin!</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Create Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
    <div class="registration-form">
        <form>
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" id="phone-number" placeholder="Phone Number">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" id="password" placeholder="Confirm Password">
            </div>
            
            <!-- Choose role -->
            <div class="form-group">
            <button type="button" class="btn btn-outline-info dropdown-toggle form-control" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Choose Role
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Button 1</a>
                <a class="dropdown-item" href="#">Button 2</a>
                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-block create-account">Create New Account Testing</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="{{ asset('https://code.jquery.com/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js') }}"></script>
</body>
</html>

@endsection
