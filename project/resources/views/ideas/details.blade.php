<style>
body{margin-top:20px;}

.content-item {
    padding:30px 0;
	background-color:#FFFFFF;
}

.content-item.grey {
	background-color:#F0F0F0;
	padding:50px 0;
	height:100%;
}

.content-item h2 {
	font-weight:700;
	font-size:35px;
	line-height:45px;
	text-transform:uppercase;
	margin:20px 0;
}

.content-item h3 {
	font-weight:400;
	font-size:20px;
	color:#555555;
	margin:10px 0 15px;
	padding:0;
}

.content-headline {
	height:1px;
	text-align:center;
	margin:20px 0 70px;
}

.content-headline h2 {
	background-color:#FFFFFF;
	display:inline-block;
	margin:-20px auto 0;
	padding:0 20px;
}

.grey .content-headline h2 {
	background-color:#F0F0F0;
}

.content-headline h3 {
	font-size:14px;
	color:#AAAAAA;
	display:block;
}


#comments {
    box-shadow: 0 -1px 6px 1px rgba(0,0,0,0.1);
	background-color:#FFFFFF;
}

#comments form {
	margin-bottom:30px;
}

#comments .btn {
	margin-top:7px;
}

#comments form fieldset {
	clear:both;
}

#comments form textarea {
	height:100px;
}

#comments .media {
	border-top:1px dashed #DDDDDD;
	padding:20px 0;
	margin:0;
}

#comments .media > .pull-left {
    margin-right:20px;
}

#comments .media img {
	max-width:100px;
}

#comments .media h4 {
	margin:0 0 10px;
}

#comments .media h4 span {
	font-size:14px;
	float:right;
	color:#999999;
}

#comments .media p {
	margin-bottom:15px;
	text-align:justify;
}

#comments .media-detail {
	margin:0;
}

#comments .media-detail li {
	color:#AAAAAA;
	font-size:12px;
	padding-right: 10px;
	font-weight:600;
}

#comments .media-detail a:hover {
	text-decoration:underline;
}

#comments .media-detail li:last-child {
	padding-right:0;
}

#comments .media-detail li i {
	color:#666666;
	font-size:15px;
	margin-right:10px;
}
</style>

<label for="idea-content" class="col-form-label">Idea content:</label>
<input type="text" class="form-control" id="idea-content" name="idea-content" value="{{$idea -> content}}" disable>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<section class="content-item" id="comments">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <form action="{{url('/ideas/add-comment/'.$idea->id)}}" method="POST">
                    <h3 class="pull-left">New Comment</h3>
                    @csrf
                    <div class="input-group">
                        <div class="col-sm-3 col-lg-2 hidden-xs">
                            <div class="user"><img src="{{asset('/storage/images/'.Auth::user()->avatar)}}"></div>
                        </div>
                        <input type="text" class="form-control rounded-corner" name="content" placeholder="Write a comment...">
                        <span class="input-group-btn p-l-10">
                            <button class="btn btn-primary f-s-12 rounded-corner pull-right" type="submit">Submit</button>
                        </span>
                    </div>
                </form>

                <h3>Other comments</h3>

                @foreach($comments as $comment)
                <div class="media">
                    @if($comment->user_id === $user_id)
                    <img class="media-object" src="{{asset('/storage/images/'.Auth::user()->avatar)}}" alt="">
                    <div class="media-body">
                        <p>{{$comment -> content}}</p>
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li><i class="fa fa-calendar"></i>27/02/2014</li>
                            <li><i class="fa fa-thumbs-up"></i>13</li>
                        </ul>
                    </div>
                    @else
                    <img class="media-object" src="https://iptc.org/wp-content/uploads/2018/05/avatar-anonymous-300x300.png" alt="">
                    <div class="media-body">
                        <p>{{$comment -> content}}</p>
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li><i class="fa fa-calendar"></i>27/02/2014</li>
                            <li><i class="fa fa-thumbs-up"></i>13</li>
                        </ul>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>