<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Catgory</h4>
            <ul class="cat-list mt-20">
                @foreach($categories as $cat)
                    <li>
                        <a href="{{ route('single.category', $cat->id) }}" class="d-flex justify-content-between">
                            <p>{{ $cat->title }}</p>
                            <p>{{ $cat->articles->count() }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Popular Post</h4>
            <div class="popular-post-list">
                @foreach($articles as $article)
                    <div class="single-post-list">
                        <div class="thumb">
                            <img class="card-img rounded-0" src="{{ $article->image }}" alt="{{ $article->title }}">
                        </div>
                        <div class="details mt-20">
                            <a href="{{ route('single.article', $article->id) }}">
                                <h6>{{ $article->title }}</h6>
                            </a> <small class="ml-2">{{ \Carbon\Carbon::parse($article->updated_at)->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
