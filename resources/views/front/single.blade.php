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
                <div class="main_blog_details">
                    <img class="img-fluid" src="{{ $article->image }}" alt="{{ $article->title }}">
                    <a href="#"><h4>{{ $article->title }}</h4></a>
                    <div class="user_details">
                      <div class="float-left">
                        @foreach($article->categories as $cat)
                            <a href="{{ route( 'categories.show', $cat->id ) }}">{{ $cat->title }}</a>
                        @endforeach
                      </div>
                      <div class="float-right mt-sm-0 mt-3">
                        <div class="media">
                          <div class="media-body">
                            <h5>{{ $article->user->name }}</h5>
                            <p>{{ $article->updated_at }}</p>
                          </div>
                          <div class="d-flex">
                            <img width="42" height="42" src="{{ $article->user->image }}" alt="{{ $article->user->name }}">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div>{!! $article->content !!}</div>
                    <div class="news_d_footer flex-column flex-sm-row">
                        <a href="#"><span class="align-middle mr-2"><i class="ti-heart"></i></span>Lily and 4 people like this</a>
                        <a class="justify-content-sm-center ml-sm-auto mt-sm-0 mt-2" href="#"><span class="align-middle mr-2"><i class="ti-themify-favicon"></i></span>{{ $article->comments()->count() }} Comments</a>
                        <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-dribbble"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                        </div>
                    </div>
                </div>


                <div class="navigation-area">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
                            </div>
                            <div class="detials">
                                <p>Prev Post</p>
                                <a href="#"><h4>A Discount Toner</h4></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            <div class="detials">
                                <p>Next Post</p>
                                <a href="#"><h4>Cartridge Is Better</h4></a>
                            </div>
                            <div class="arrow">
                                <a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
                            </div>
                            <div class="thumb">
                                <a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments-area">
                    <h4>{{ $article->comments()->count() }} Comments</h4>
                    @foreach($article->comments as $comment)
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb comments-image">
                                        @if(isset($comment->user))
                                            @if(!is_null($comment->user->image))
                                                <img class="w-100" src="{{ $comment->user->image }}" alt="{{ $comment->user->name }}">
                                            @else
                                                <img src="{{ asset('img/user.png') }}" alt="user-image">
                                            @endif
                                        @else
                                            <img src="{{ asset('img/user.png') }}" alt="user-image">
                                        @endif
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{ $comment->user->name }}</a></h5>
                                        <p class="date">{{ $comment->created_at }}</p>
                                        <p class="comment">
                                            {{ $comment->body }}
                                        </p>
                                    </div>
                                </div>
                                <div class="reply-btn">
                                        <a href="" class="btn-reply text-uppercase">reply</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="comment-list left-padding">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="img/blog/c3.jpg" alt="">
                                </div>
                                <div class="desc">
                                    <h5><a href="#">Annie Stephens</a></h5>
                                    <p class="date">December 4, 2017 at 3:12 pm </p>
                                    <p class="comment">
                                        Never say goodbye till the end comes!
                                    </p>
                                </div>
                            </div>
                            <div class="reply-btn">
                                    <a href="" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="comment-form">
                    <h4>Leave a Reply</h4>
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="form-group form-inline">
                            <div class="form-group col-lg-6 col-md-6 name">
                            <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 email">
                            <input type="email" class="form-control" id="email" value="{{ old('email') }}" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" value="{{ old('title') }}" name="title" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control mb-10" rows="5" name="body" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required="">{{ old('body') }}</textarea>
                        </div>
                        <button type="submit" class="button submit_btn">Post Comment</button>
                    </form>
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
