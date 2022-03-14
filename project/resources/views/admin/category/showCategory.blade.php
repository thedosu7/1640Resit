@extends('layouts.admin')
@section('content')
<div class="card">
  <div class="card-header">Details Category</div>
  <div class="card-body">
  
        <div class="card-body">
        <h5 class="card-title">Name : {{ $data->name }}</h5>
        <p class="card-text">Description : {{ $data->description}}</p>
  </div>
      
    </hr>
  </div>
</div>
@endsection