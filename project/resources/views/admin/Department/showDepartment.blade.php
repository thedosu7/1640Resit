@extends('layouts.admin')
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Welcome to Admin!</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.department.index') }}">Department</a></li>
          <li class="breadcrumb-item active">Detail Department</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<div class="card">
  <div class="card-header">Details Department</div>
  <div class="card-body">

    <div class="card-body">
      <h5 class="card-title">Name : {{ $item->name }}</h5>
    </div>

    </hr>
  </div>
</div>
@endsection