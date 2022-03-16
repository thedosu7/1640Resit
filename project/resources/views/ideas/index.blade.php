@extends('layouts.main')

@section('title', 'Ideas')

@section('content')

<head>
    <style>
        .panel {
            margin-bottom: 30px;
            color: #696969;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.08);
        }

        .entry-content .gallery {
            margin: 0;
            list-style: none;
            padding: 0;
        }

        .activity__list__header a {
            color: #222;
            font-weight: 600;
        }

        .activity__list__footer {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            margin-top: 23px;
            margin-left: 43px;
            padding: 13px 8px 0;
            color: #999;
            border-top: 1px dotted #ccc;
        }

        .activity__list__footer a {
            color: inherit;
        }

        .activity__list__footer a+a {
            margin-left: 15px;
        }

        .activity__list__footer i {
            margin-right: 8px;
        }

        .activity__list__footer a:hover {
            color: #222;
        }

        .activity__list__footer span {
            margin-left: auto;
        }

        .panel-activity__list>li+li {
            margin-top: 51px;
        }

        .timeline-comment-box {
            margin-left: -25px;
            margin-right: -25px;
            padding: 20px 25px
        }

        .timeline-comment-box .user {
            float: left;
            width: 34px;
            height: 34px;
            overflow: hidden;
            border-radius: 30px
        }

        .timeline-comment-box .user img {
            max-width: 100%;
            max-height: 100%
        }

        .timeline-comment-box .user+.input {
            margin-left: 44px
        }

        .md-heading {
            font-size: 24px !important;
            line-height: 36px !important;
            margin-bottom: 15px !important;
        }
    </style>
</head>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div>
                <h4 class="title d-inline">LASTEST IDEA</h4>
                @include('ideas.create')
            </div>
            <div class="my-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <ul class=" panel-activity__list">
                                @foreach($ideas as $idea)
                                <li class="panel border border-secondary rounded list-unstyled">
                                    <div class="p-4">
                                        <div class="activity__list__header md-heading">
                                            <strong>{{$idea -> title}}</strong>
                                        </div>
                                        <div class="activity__list__body entry-content">
                                            <p>
                                                {{$idea -> content}}
                                            </p>
                                        </div>
                                        <div class="activity__list__footer">
                                            <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>
                                            <a href="#"> <i class="fa fa-thumbs-down"></i>123</a>
                                            <a href="#"> <i class="fa fa-comments"></i>23</a>
                                            <span> <i class="fa fa-clock"></i>2 hours ago</span>
                                        </div>
                                        <div class="timeline-comment-box">
                                            <div class="user"><img src="https://bootdey.com/img/Content/avatar/avatar3.png"></div>
                                            <div class="input">
                                                <form action="">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control rounded-corner" placeholder="Write a comment...">
                                                        <span class="input-group-btn p-l-10">
                                                            <button class="btn btn-primary f-s-12 rounded-corner" type="button">Comment</button>
                                                        </span>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="d-flex justify-content-center">
                                {{ $ideas->appends(Request::all())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('ideas.search')
        </div>
    </div>
</div>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection