<div class="toggle-element js-search-toggle">
    <div class="header-search pt-90 bg-white shadow-4">
        <div class="container">
            <div class="header-search__field">
                <form action="{{ route('courses') }}" method="GET">
                    <div class="icon icon-search text-dark-1"></div>
                    <input type="text" name="search" value="{{ request('search') }}" class="col-12 text-18 lh-12 text-dark-1 fw-500" placeholder="What do you want to learn?">

                    <button type="submit" class="d-flex items-center justify-center size-40 rounded-full bg-purple-3" data-el-toggle=".js-search-toggle">
                        <img src="{{ asset('assets/frontend/images/close.svg') }}" alt="icon">
                    </button>
                </form>
            </div>

            <div class="header-search__content mt-30">
                <div class="text-17 text-dark-1 fw-500">Popular Courses:</div>

                <div class="d-flex y-gap-5 flex-column mt-10">
                </div>

                <div class="mt-30">
                    <button class="underline">Press enter to see all search results</button>
                </div>
            </div>
        </div>
    </div>
    <div class="header-search__bg" data-el-toggle=".js-search-toggle"></div>
</div>
