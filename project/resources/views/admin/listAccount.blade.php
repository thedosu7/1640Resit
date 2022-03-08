
@extends('layouts.admin')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">ListAccount</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
<html lang="en">
<head>
	<title>List Account</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
<!--===============================================================================================-->
<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
</head>
<body style= "background-color: #1111" >
  <div class="container">
    <h4>Welcome to Admin!!</h4>
  
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



<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});
			
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>


@endsection



