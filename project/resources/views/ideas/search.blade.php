<h4 class="title text-center">SEARCH</h4>
<div class="card my-lg-3">
    <div class="card-body ">
        <form method="POST" action="{{ route('ideas.search') }}">
            @csrf
            <div>
                <label class="form-label" for="searchUsingKey">Key:</label>
                <input type="search" class="form-control" id="searchUsingKey" aria-describedby="search-addon" name="search">
            </div>
            <div style="padding: 10px 0px 0px 0px;">
                <label for="selectCategory" class="form-label">Category:</label>
                <select class="form-select" id="selectCategory" name="category">
                    <option>All</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div style="padding: 10px 0px 0px 0px;">
                <label for="selectFilter" class="form-label">Filter:</label>
                <select class="form-select" id="selectFilter" name="filter">
                    <option>None</option>
                    <option>Most views</option>
                    <option>Most likes</option>
                    <option>Most recently</option>
                </select>
            </div>
            <div style="padding: 15px 0px 0px 0px;">
                <center><button class="btn btn-success d-grid" type="submit">Search</button></center>
            </div>
        </form>
    </div>
</div>