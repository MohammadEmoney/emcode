@extends('layouts.front')

@section('title')
    Emcode - Search Word
@endsection

@section('description')
    Dictionary - Search English words
@endsection



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
                <div class="main_blog_details">
                    <form action="{{ route('words.search') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Search Word</label>
                            <input class="form-control" type="text" name="word" id="word">
                        </div>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <div class="mt-5">
                        @if (session('data'))
                            <div class="alert alert-success">
                                @if(gettype(session('data')) == "array")
                                    <ul>
                                        @foreach(session('data') as $word)
                                            <li>
                                                <ul>
                                                    <li>{{ $word['word_id']}}</li>
                                                    @foreach(json_decode($word['shortdef']) as $def)
                                                        <li>Definition: {{ $def }}</li>
                                                    @endforeach
                                                    <li>{{ $word['fl']}}</li>
                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @endif
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
