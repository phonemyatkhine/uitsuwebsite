@extends('layouts.main')

@section('main')
<div id="news-index-wrapper" class="bg-gray">
    <div class="container">
        <div class="section-title">
            <div>
                <h1>News</h1>
            </div>
            <p>They happens recently days.</p>
            @if(Auth::check() && Auth::user()->can('create', App\News::class))
            <div class="view-more-btn">
                <a href="/news/create" class="custom-btn">Post a news</a>
            </div>
            @endif
        </div>
        <!-- News post start here -->
        <div class="news">
            @if(count($news))
                @for($i = 0; $i < count($news); $i += 2)
                <div class="row">
                    @isset($news[$i])
                    <div class="col-lg-6">
                        <div class="container">
                            <!-- news item to be inserted -->
                            <div class="row news-item">
                                <div class="col-sm-5 news-image pr-lg-0 d-sm-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div>
                                            <a href="{{ route('news.view', $news[$i]->id) }}" class="d-block">
                                                @isset($news[$i]->cover_image)
                                                <img class="img-fluid" src="{{ asset($news[$i]->cover_image) }}">
                                                @endisset
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 news-info pl-0 d-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div class="container">
                                            <h3 class="news-title"><a href="{{ route('news.view', $news[$i]->id) }}">{{ $news[$i]->title }}</a></h3>
                                            <p class="news-description">{{ $news[$i]->description }}</p>
                                            <time datetime="{{ date("Y-m-d", strtotime($news[$i]->created_at)) }}" class="news-date text-uppercase">{{ date("M d, Y", strtotime($news[$i]->created_at)) }}  by <a href="blog-single.html">UITSU</a></time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endisset
                    @isset($news[$i + 1])
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="row news-item">
                                <div class="col-sm-5 news-image pr-lg-0 d-block d-sm-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div>
                                            <a href="{{ route('news.view', $news[$i + 1]->id) }}" class="d-block">
                                                @isset($news[$i + 1]->cover_image)
                                                <img class="img-fluid" src="{{ asset($news[$i + 1]->cover_image) }}">
                                                @endisset
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 news-info pl-0 d-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div class="container">
                                            <h3 class="news-title"><a href="{{ route('news.view', $news[$i + 1]->id) }}">{{ $news[$i + 1]->title }}</a></h3>
                                            <p class="news-description">{{ $news[$i + 1]->description }}</p>
                                            <time datetime="{{ date("Y-m-d", strtotime($news[$i]->created_at)) }}" class="news-date text-uppercase">{{ date("M d, Y", strtotime($news[$i + 1]->created_at)) }}  by <a href="blog-single.html">UITSU</a></time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endisset
                </div>
                @endfor
            @else
            No News :')
            @endif
            @if(Auth::check())
            <hr class="my-4">
            @if(count($hidden))
                <div class="section-title">
                    <div>
                        <h1>Hidden News</h1>
                    </div>
                    <p>You're seeing this since you can unhide!</p>
                </div>
                @for($i = 0; $i < count($hidden); $i += 2)
                <div class="row">
                    @isset($hidden[$i])
                    <div class="col-lg-6">
                        <div class="container">
                            <!-- news item to be inserted -->
                            <div class="row news-item">
                                <div class="col-sm-5 news-image pr-lg-0 d-sm-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div>
                                            <a href="{{ route('news.view', $hidden[$i]->id) }}" class="d-block">
                                                @isset($hidden[$i]->cover_image)
                                                <img class="img-fluid" src="{{ asset($hidden[$i]->cover_image) }}">
                                                @endisset
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 news-info pl-0 d-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div class="container">
                                            <h3 class="news-title"><a href="{{ route('news.view', $hidden[$i]->id) }}">{{ $hidden[$i]->title }}</a></h3>
                                            <p class="news-description">{{ $hidden[$i]->description }}</p>
                                            <time datetime="{{ date("Y-m-d", strtotime($hidden[$i]->created_at)) }}" class="news-date text-uppercase">{{ date("M d, Y", strtotime($hidden[$i]->created_at)) }}  by <a href="blog-single.html">UITSU</a></time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endisset
                    @isset($hidden[$i + 1])
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="row news-item">
                                <div class="col-sm-5 news-image pr-lg-0 d-block d-sm-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div>
                                            <a href="{{ route('news.view', $hidden[$i + 1]->id) }}" class="d-block">
                                                @isset($hidden[$i + 1]->cover_image)
                                                <img class="img-fluid" src="{{ asset($hidden[$i + 1]->cover_image) }}">
                                                @endisset
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 news-info pl-0 d-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div class="container">
                                            <h3 class="news-title"><a href="{{ route('news.view', $hidden[$i + 1]->id) }}">{{ $hidden[$i + 1]->title }}</a></h3>
                                            <p class="news-description">{{ $hidden[$i + 1]->description }}</p>
                                            <time datetime="{{ date("Y-m-d", strtotime($hidden[$i]->created_at)) }}" class="news-date text-uppercase">{{ date("M d, Y", strtotime($hidden[$i + 1]->created_at)) }}  by <a href="blog-single.html">UITSU</a></time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endisset
                </div>
                @endfor
            @else
            No Hidden News :')
            @endif
            @endif
        </div>
    </div>
</div>
@endsection
