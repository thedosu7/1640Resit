@extends('layouts.main')

@section('title')
    {{ $idea->title }}
@endsection

@section('custom-css')
    <link href="{{ asset('/css/idea.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="container">
        <div class="idea-block">

            <h4>{{ $idea->title }}
                @if ($idea->user->id == auth()->user()->id)
                <a href="{{ route('ideas.edit', $idea->id) }}"><i class=" fa fa-solid fa-pen-to-square"></i></a>
                <a href="{{ route('ideas.delete', $idea->id) }}"><i class=" fa fa-solid fa-trash"></i></a>
                @endif
            </h4>
            <p>{{ $idea->content }}</p>
            <h1 class="comments-title">Attachments ({{ $idea->attachments->count() }})</h1>
            @foreach ($idea->attachments as $attachment)
                <a href="{{ asset($attachment->direction) }}">{{ $attachment->name }}</a><br>
            @endforeach

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
                        <a href="">
                            <img src="{{ auth()->user()->avatar == null? asset('/images/avatar.png'): asset('/storage/images/' . Auth::user()->avatar) }}"
                                alt="" class="be-ava-comment">
                        </a>
                    </div>
                    <div class="be-comment-content">

                        <span class="be-comment-name">
                            <strong>{{ auth()->user()->hasRole('staff')? 'Anonymous': $comment->user->name }}</strong>
                        </span>
                        <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            {{ $comment->created_at->diffForHumans() }}
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
