@extends('layouts.main')

@section('title','Ideas')

@section('custom-css')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div>
                <h4 class="title d-inline">LASTEST IDEA</h4>
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
@endsection