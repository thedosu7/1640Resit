<h4 class="title text-center">SEARCH</h4>
<div class="card my-lg-3">
    <div class="card-body ">
        <form method="POST" action="{{ route('ideas.search') }}">
            @csrf
            <div class="input-group rounded">
                <input type="search" class="form-control rounded" name="search" aria-describedby="search-addon">
                <span class="input-group-text border-0" id="search-addon">
                    <button type="submit" style="border: none; padding: 0; background: none;">
                    <i class="fas fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>
