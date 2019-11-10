@extends('layouts.main')

@section('main')
<div id="news-index-wrapper" class="bg-gray">
    <div class="container">
        <div class="section-title">
            <div>
                <h1>News</h1>
            </div>
            <p>They happens recently days.</p>
        </div>
        <!-- News post start here -->
        <div class="news">
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
                                        <a href="#" class="d-block">
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
                                        <h3 class="news-title"><a href="#">{{ $news[$i]->title }}</a></h3>
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
                                        <a href="#" class="d-block">
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
                                        <h3 class="news-title"><a href="#">{{ $news[$i + 1]->title }}</a></h3>
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
        </div>
    </div>
</div>
@endsection
