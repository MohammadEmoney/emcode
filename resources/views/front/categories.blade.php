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
            <div class="col-lg-8">
                <div class="row">
                    @foreach($categories as $category)
                        <div class="col-md-6">
                            <div class="single-recent-blog-post card-view">
                            <div class="thumb">
                                <img class="card-img rounded-0" src="{{ $category->image }}" alt="{{ $category->title }}">
                            </div>
                            <div class="details mt-20">
                                <a href="{{ route('single.category', $category->id) }}">
                                <h3>{{ $category->title }}</h3>
                                </a>
                                <p>{{ $category->description }}</p>
                                <a class="button" href="{{ route('single.category', $category->id) }}">Read More <i class="ti-arrow-right"></i></a>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        {{ $categories->links() }}
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
