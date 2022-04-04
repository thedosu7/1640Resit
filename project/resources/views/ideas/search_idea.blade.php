@section('content')
@if($ideas->isNotEmpty())
    @foreach ($ideas as $ideas)
        <div class="ideas-list">
            <p>{{ $ideas->title }}</p>
        </div>
    @endforeach
@else 
    <div>
        <h2>No ideas found</h2>
    </div>
@endif
@endsection