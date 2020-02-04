@if(isset($news) && count($news))
<div id="news-section" class="bg-gray py-5">
    <div class="container">
        <div class="section-title">
            <div>
                <h1>Recent News</h1>
            </div>
            <p>They happens recently days.</p>
            <div class="view-more-btn">
                <a href="#" class="custom-btn">View More</a>
            </div>
        </div>
        <!-- News post start here -->
        <div class="news">
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
        </div>
    </div>
</div>
@endif
