@extends('layouts.main')

@section('title', 'Ideas')

@section('custom-css')
    <style>
        .idea-block {
            padding: 20px 70px;
        }

		.comment-block {
            margin: 0px 10px;
            padding-block: 0px 10px;
			width: 100%;
        }

        .comments-title {
            font-size: 16px;
            color: #262626;
            margin-bottom: 15px;
            font-family: 'Conv_helveticaneuecyr-bold';
        }

        .be-img-comment {
            width: 60px;
            height: 60px;
            float: left;
            margin-bottom: 15px;
        }

        .be-ava-comment {
            margin-top: 10px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .be-comment {

            margin-top: 10px;
        }

        .be-comment-content {
            margin-left: 80px;
        }

        .be-comment-content span {
            display: inline-block;
            width: 49%;
            margin-bottom: 15px;
        }

        .be-comment-name {
			padding-top: 10px;
            font-size: 13px;
            font-family: 'Conv_helveticaneuecyr-bold';
        }

        .be-comment-content a {
            color: #383b43;
        }

        .be-comment-content span {
            display: inline-block;
            width: 49%;    
			margin-bottom: 10px;
        }

        .be-comment-time {
            text-align: right;
        }

        .be-comment-time {
            font-size: 11px;
            color: #b4b7c1;
        }

        .be-comment-text {
            font-size: 13px;
            line-height: 18px;
        }

        .form-group.fl_icon .icon {
            position: absolute;
            top: 1px;
            left: 16px;
            width: 48px;
            height: 48px;
            background: #f6f6f7;
            color: #b5b8c2;
            text-align: center;
            line-height: 50px;
            -webkit-border-top-left-radius: 2px;
            -webkit-border-bottom-left-radius: 2px;
            -moz-border-radius-topleft: 2px;
            -moz-border-radius-bottomleft: 2px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }

        .form-group .form-input {
            font-size: 13px;
            line-height: 50px;
            font-weight: 400;
            color: #b4b7c1;
            width: 100%;
            height: 50px;
            padding-left: 20px;
            padding-right: 20px;
            border: 1px solid #edeff2;
            border-radius: 3px;
        }

        .form-group.fl_icon .form-input {
            padding-left: 70px;
        }

        .form-group textarea.form-input {
            height: 150px;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="idea-block">

            <h4>{{ $idea->title }}</h4>
            <p>{{ $idea->content }}</p>

            @livewire('react-component', [
            'model' => $idea
            ])
            <hr>
            <h1 class="comments-title">Comments</h1>
            <div class="be-comment mb-4">
                <form action="{{ url('/ideas/add-comment/' . $idea->id) }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control rounded-corner" name="content"
                            placeholder="Write a comment...">
                        <span class="input-group-btn p-l-10">
                            <button class="btn btn-primary f-s-12 rounded-corner pull-right" type="submit">Submit</button>
                        </span>
                    </div>
                </form>
            </div>
			@foreach ($comments as $comment)
            <div class="comment-block">
                <div class="be-img-comment">
                    <a href="blog-detail-2.html">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                    </a>
                </div>
                <div class="be-comment-content">

                    <span class="be-comment-name">
                        <a href="blog-detail-2.html">{{ $comment->user->name }}</a>
                    </span>
                    <span class="be-comment-time">
                        <i class="fa fa-clock-o"></i>
                        {{ $comment->created_at }}
                    </span>

                    <p class="be-comment-text">
                        {{ $comment->content }}
                    </p>
                </div>
            </div>
			@endforeach
			{{ $comments->links() }}

        </div>
    </div>
@endsection
