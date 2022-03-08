@extends('layouts.main')

@section('title', 'Ideas')

@section('custom-css')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div>
                    <h4 class="title d-inline">LASTEST IDEA</h4>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Launch demo modal
                      </button>
                    <button class="btn btn-success d-inline float-md-end">CREATE NEW IDEA</button>
                </div>
                <div class="my-lg-3">
                    <div class="card">
                        <div class="card-body ">
                            <div class="row">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('ideas._search')
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
