@extends('layouts.front')

@section('content')
<!--================Hero Banner start =================-->
@component('front.components.banner')

@endcomponent
<!--================Hero Banner end =================-->

<!--================ Blog slider start =================-->
@component('front.components.slider', ['articles' => $articles])

@endcomponent
<!--================ Blog slider end =================-->

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach($articles as $article)
                    <div class="single-recent-blog-post">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ $article->image }}" alt="{{ $article->title }}">
                            <ul class="thumb-info">
                                <li><a href="#"><i class="ti-user"></i>{{ $article->user->name }}</a></li>
                                <li><a href="#"><i class="ti-notepad"></i>{{ \Carbon\Carbon::parse($article->updated_at)->diffForHumans() }}</a></li>
                                <li><a href="#"><i class="ti-themify-favicon"></i>{{ $article->comments()->count() }} Comments</a></li>
                            </ul>
                        </div>
                        <div class="details mt-20">
                            <a href="{{ $article->path() }}">
                            <h3>{{ $article->title }}</h3>
                            </a>
                            <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                            <p>{{ $article->short_description }}</p>
                            <a class="button" href="{{ $article->path() }}">Read More <i class="ti-arrow-right"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <i class="ti-angle-left"></i>
                                        </span>
                                    </a>
                                </li>
                                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <i class="ti-angle-right"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav> --}}
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>

            <!-- Start Blog Post Siddebar -->
            @component('front.components.sidebar')

            @endcomponent
            <!-- End Blog Post Siddebar -->
        </div>
    </div>
</section>
<!--================ End Blog Post Area =================-->

@endsection
