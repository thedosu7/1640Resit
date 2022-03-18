@extends('layouts.main')

@section('title', 'Ideas')

@section('custom-css')
<style>
	body {
		margin-top: 20px;
	}

	.be-comment-block {
		margin-bottom: 50px !important;
		border: 1px solid #edeff2;
		border-radius: 2px;
		padding: 50px 70px;
		border: 1px solid #ffffff;
	}

	.comments-title {
		font-size: 16px;
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
		width: 60px;
		height: 60px;
		border-radius: 50%;
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
		font-size: 13px;
		font-family: 'Conv_helveticaneuecyr-bold';
	}

	.be-comment-content span {
		display: inline-block;
		width: 49%;
		margin-bottom: 15px;
	}

	.be-comment-time {
		text-align: right;
	}

	.be-comment-time {
		font-size: 11px;
	}

	.be-comment-text {
		font-size: 13px;
		line-height: 18px;
		display: block;
		background: #f6f6f7;
		border: 1px solid #edeff2;
		padding: 15px 20px 20px 20px;
	}

	.form-group.fl_icon .icon {
		position: absolute;
		top: 1px;
		left: 16px;
		width: 48px;
		height: 48px;
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="card border-0 shadow">
                <img src="https://marketingai.vn/wp-content/uploads/2018/07/big-idea.jpg" alt="...">
                <div class="card-body p-1-9 p-xl-5">
                    <div class="mb-4">
                        <h3 class="h4 mb-0">Let's debase</h3>
                        <span class="text-primary">CEO &amp; Founder</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="ps-lg-1-6 ps-xl-5">
                <div class="mb-5 wow fadeIn">
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="h1 mb-0 text-primary">#New Idea:</h2>
                    </div>
					<div class="text-start mb-1-6 wow fadeIn">
                        <h2 class="h1 mb-0 text-primary">{{$idea -> title}}</h2>
                    </div>
                    <p>{{$idea -> content}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
	<div class="be-comment-block">
		<h1 class="comments-title">All comments</h1>
		@foreach($comments as $comment)
		@if($comment->user_id === $user_id)
		<div class="be-comment">
			<div class="be-img-comment">
				<a href="blog-detail-2.html">
					<img src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="" class="be-ava-comment">
				</a>
			</div>
			<div class="be-comment-content">
				<span class="be-comment-name">
					<a href="blog-detail-2.html">(*) Anonymous mode</a>
				</span>
				<span class="be-comment-time">
					<i class="fa fa-clock-o"></i>
					May 27, 2015 at 3:14am
				</span>

				<p class="be-comment-text">
					{{$comment -> content}}
				</p>
			</div>
		</div>
		@else
		<div class="be-comment">
			<div class="be-img-comment">
				<a href="blog-detail-2.html">
					<img src="https://iptc.org/wp-content/uploads/2018/05/avatar-anonymous-300x300.png" alt="" class="be-ava-comment">
				</a>
			</div>
			<div class="be-comment-content">
				<span class="be-comment-name">
					<a href="blog-detail-2.html">(*) Anonymous mode</a>
				</span>
				<span class="be-comment-time">
					<i class="fa fa-clock-o"></i>
					May 27, 2015 at 3:14am
				</span>

				<p class="be-comment-text">
					{{$comment -> content}}
				</p>
			</div>
		</div>
		@endif
		@endforeach
		<form class="form-block" action="{{url('/ideas/add-comment/'.$idea->id)}}" method="POST">
			@csrf
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<textarea class="form-input" required="" name="content" placeholder="Write a comment..."></textarea>
					</div>
				</div>
				<button class="btn btn-primary f-s-12 rounded-corner pull-right" type="submit">Submit</button>
			</div>
		</form>
	</div>
</div>
@endsection