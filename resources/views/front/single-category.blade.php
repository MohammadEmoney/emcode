@extends('layouts.front')

@section('content')
<!--================Hero Banner start =================-->
@component('front.components.banner')

@endcomponent
<!--================Hero Banner end =================-->

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="justify-content-center d-flex">
                    <h1>{{ $category->title }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-md-6">
                            <div class="single-recent-blog-post card-view">
                            <div class="thumb">
                                <img class="card-img rounded-0" src="{{ $article->image }}" alt="{{ $article->title }}">
                                <ul class="thumb-info">
                                <li><a href="#"><i class="ti-user"></i>{{ $article->user->name }}</a></li>
                                <li><a href="#"><i class="ti-themify-favicon"></i>{{ $article->comments()->count() }} Comments</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                                <a href="{{ $article->path() }}">
                                <h3>{{ $article->title }}</h3>
                                </a>
                                <p>{{ $article->short_description }}</p>
                                <a class="button" href="{{ $article->path() }}">Read More <i class="ti-arrow-right"></i></a>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-lg-12">
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
