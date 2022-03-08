@extends('layouts.admin')
@section('content')
<html lang="en">
<head>
	<title>List Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS only -->
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
  
</head>
<body style= "background-color: #1111" >
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">List Account</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
  <div class="container">
    <h4>Welcome to Admin!</h4>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">List Account</h5>
        <p class="card-text">This is list of account available</p>
      <table class="table table-dark">
        <thead class="thread-light">
          <tr>
            <th scope="col">User Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td scope="row">Mark</td>
            <td scope="row">Otto</td>
            <td scope="row">Admin</td>
            <td scope="row">
              <button type="button" class="btn btn-outline-info rounded-pill">Details</button>
              <button type="button" class="btn btn-outline-light rounded-pill">Edit</button>
              <button type="button" class="btn btn-outline-warning rounded-pill">Delete</button>
            </td>
          </tr>
          <tr>
            <td scope="row">Mark</td>
            <td scope="row">Otto</td>
            <td scope="row">Admin</td>
            <td scope="row">
              <button type="button" class="btn btn-outline-info rounded-pill">Details</button>
              <button type="button" class="btn btn-outline-light rounded-pill">Edit</button>
              <button type="button" class="btn btn-outline-warning rounded-pill">Delete</button>
            </td>
          </tr>
          <tr>
            <td scope="row">Mark</td>
            <td scope="row">Otto</td>
            <td scope="row">Admin</td>
            <td scope="row">
              <button type="button" class="btn btn-outline-info rounded-pill">Details</button>
              <button type="button" class="btn btn-outline-light rounded-pill">Edit</button>
              <button type="button" class="btn btn-outline-warning rounded-pill">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
</div>
</div>
</div>
</body>
</html>
@endsection



