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
                <div class="row">
                @foreach($news as $news_item)
                    <div class="col-lg-6">
                        <div class="container">
                            <!-- news item to be inserted -->
                            <div class="row news-item">
                                <div class="col-sm-5 news-image pr-lg-0 d-sm-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div>
                                            <a href="{{ route('news.view', $news_item->id) }}" class="d-block">
                                                @isset($news_item->cover_image)
                                                <img class="img-fluid" src="{{ asset($news_item->cover_image) }}">
                                                @endisset
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 news-info pl-0 d-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div class="container">
                                            <h3 class="news-title"><a href="{{ route('news.view', $news_item->id) }}">{{ $news_item->title }}</a></h3>
                                            <p class="news-description">{{ $news_item->description }}</p>
                                            <time datetime="{{ date("Y-m-d", strtotime($news_item->created_at)) }}" class="news-date text-uppercase">{{ date("M d, Y", strtotime($news_item->created_at)) }}  by <a href="blog-single.html">UITSU</a></time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
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
                <div class="row">
                @foreach($hidden as $hidden_item)
                    <div class="col-lg-6">
                        <div class="container">
                            <!-- news item to be inserted -->
                            <div class="row news-item">
                                <div class="col-sm-5 news-image pr-lg-0 d-sm-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div>
                                            <a href="{{ route('news.view', $hidden_item->id) }}" class="d-block">
                                                @isset($hidden_item->cover_image)
                                                <img class="img-fluid" src="{{ asset($hidden_item->cover_image) }}">
                                                @endisset
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-7 news-info pl-0 d-flex">
                                    <div class="justify-content-center align-self-center">
                                        <div class="container">
                                            <h3 class="news-title"><a href="{{ route('news.view', $hidden_item->id) }}">{{ $hidden_item->title }}</a></h3>
                                            <p class="news-description">{{ $hidden_item->description }}</p>
                                            <time datetime="{{ date("Y-m-d", strtotime($hidden_item->created_at)) }}" class="news-date text-uppercase">{{ date("M d, Y", strtotime($hidden_item->created_at)) }}  by <a href="blog-single.html">UITSU</a></time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            @else
            No Hidden News :')
            @endif
            @endif
        </div>
    </div>
</div>
@endsection
