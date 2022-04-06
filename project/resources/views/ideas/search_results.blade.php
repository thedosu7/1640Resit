<div class="card my-lg-3">
    <div class="card-body ">
        @if($found_ideas->isNotEmpty())
        @foreach ($found_ideas as $found_idea)
        <div class="ideas-list">
            <p>{{ $found_idea->title }}</p>
        </div>
        @endforeach
        @else
        <div>
            <h2>No ideas found</h2>
        </div>
        @endif
    </div>
</div>