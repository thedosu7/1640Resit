@extends('layouts.admin')
@section('custom-css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /><!-- CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<!-- Default theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
@endsection

@section('content')
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">List Ideas</li>
                </ol>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="card-body">
            <table id="users-table" class="table table-responsive" style="width:100%">
                <thead class="thread-light">
                    <tr class="col">
                        <th class="col-1">Title</th>
                        <th class="col-1">Content</th>
                        <th class="col-1">User</th>
                        <th class="col-1">Like</th>
                        <th class="col-1">DisLike</th>
                        <th class="col-1">Mission</th>
                    </tr>
                </thead>
            </table>
        </div>

@endsection
@section('custom-js')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('/admin/ideas/dt-row-data')}}',
            columns: [{
                    data: 'title',  
                },
                {
                    data: 'content',
                },
                {
                    data: 'user',
                },
                {
                    data: 'like',
                },
                {
                    data: 'dislike',
                },
                {
                    data: 'mission',
                }

            ]
        });
        $('#users-table_wrapper').removeClass('form-inline');
    });
</script>
@endsection

