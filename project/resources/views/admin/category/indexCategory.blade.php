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
              <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
              <li class="breadcrumb-item active">List Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
<div class="container">
    <div class="card">
    <div class="card-body">
    <h5 class="card-title">List Category</h5>
    <p class="card-text">This is list of category available</p>
    <table class="table table-hover">
        <thead >
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $datas)
                <tr>
                    <td scope="row">{{$datas -> name}}</td>
                    <td scope="row">{{$datas -> description}}</td>
                    <td scope="row">
                    <a href="/admin/category/showCate/{{$datas -> id}}" title="Details Category"><button class="btn btn-primary btn-sm rounded-pill"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i>Show Details Category</button></a>
                    <a href="/admin/category/update/{{$datas -> id}}" title="Edit Category"><button class="btn btn-primary btn-sm rounded-pill"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i>Update Category</button></a>
                    <form  method="POST" action="{{ url('/admin/category/delete/'.$datas -> id)}}" accept-charset="UTF-8" style="display:inline-block">
                            
                            <!-- method_feild() will be create hidden input like below
                                <input type="hidden" name="_method" value="DELETE"> 
                            -->
                            {{ method_field('DELETE') }}
                            <!-- @method('DELETE') -->

                            <!-- Thay vì tạo token như vầy 
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                            -->
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm rounded-pill" title="Delete Category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Category</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>

@endsection
