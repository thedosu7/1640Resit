@extends('layouts.admin')

@section('content')
@section('admin-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endsection
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
  <!--Add Cateogry Modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create new Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('admin/category/index') }}" method="post">
          @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputCategory">Category Name:</label>
              <input type="text" name="name" class="form-control" id="exampleInputCategory" placeholder="Input Category Name*">
            </div>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="exampleInputCategory">Description:</label>
              <input type="text" name="description" class="form-control" id="exampleInputCategory" placeholder="Input Category Description*">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-warning">Add</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- End Add Model category-->


  <!-- Star Edit Modal category -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('/admin/category/index/')}}" method="POST" id="editForm">
          {{csrf_field() }}
          {{method_field('PUT') }}

          <div class="modal-body">
            <div class="mb-3">
              <label>Name Category</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter New Name Category">
            </div>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label>Description Category</label>
              <input type="text" name="description" id="description" class="form-control" placeholder="Enter New Description Category">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-warning">Update</button>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- End Edit Model -->

  <div class="container">
    <h1>Create Category</h1>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
    @endif

    @if(\Session::has('success'))
    <div class="alert alert-success">
      <p>{{ \Session::get('success') }}</p>
    </div>
    @endif

    <button class="btn btn-primary d-inline float-md-end" data-toggle="modal" data-target="#exampleModal">
      CREATE NEW CATEGORY
    </button>


  </div>
  <br></br>
  <div>
    <table id="datatable" class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $data)
        <tr>
          <td>{{$loop -> iteration}}</td>
          <td scope="row">{{$data -> name}}</td>
          <td scope="row">{{$data -> description}}</td>
          <td>
            <a href="#" class="btn btn-warning btn-sm rounded-pill edit"><i class="fa-solid fa-pen-to-square"></i></a>
            <form method="POST" action="{{ url('/admin/category/delete/'.$data -> id)}}" accept-charset="UTF-8" style="display:inline-block">

              <!-- method_feild() will be create hidden input like below
                                <input type="hidden" name="_method" value="DELETE"> 
                            -->
              {{ method_field('DELETE') }}
              <!-- @method('DELETE') -->

              <!-- Thay vì tạo token như vầy 
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                            -->
              {{ csrf_field() }}
              <button type="submit" class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Do you want to delete this category ?')"><i class="fa-solid fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endsection
  @section('admin-js')
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script src="{{asset('https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{asset('https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var table = $('#datatable').DataTable();

      //Start Edit Record
      table.on('click', '.edit', function() {

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
          $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#name').val(data[1]);
        $('#description').val(data[2]);

        $('#editForm').attr('action', '/admin/category/index/'+data[0]);
        $('#editModal').modal('show');
      });
      // End Edit Record
    });
  </script>
  @endsection