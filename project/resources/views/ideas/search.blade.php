<h4 class="title text-center">SEARCH</h4>
<div class="card my-lg-3">
    <div class="card-body ">
        <form id="options_search" method="POST" action="search">
            @csrf
            <div class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </form>
    </div>
</div>
