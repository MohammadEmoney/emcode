<section>
    <div class="container">
        <div class="owl-carousel owl-theme blog-slider">
            @foreach($articles as $article)
                <div class="card blog__slide text-center">
                    <div class="blog__slide__img">
                        <a href="{{ route('single.article', $article->id) }}"><img class="card-img rounded-0" src="{{ $article->image }}" alt="{{ $article->title }}"></a>
                    </div>
                    <div class="blog__slide__content">
                        <h3><a href="{{ route('single.article', $article->id) }}">{{ $article->title }}</a></h3>
                        <p>{{ \Carbon\Carbon::parse($article->updated_at)->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
