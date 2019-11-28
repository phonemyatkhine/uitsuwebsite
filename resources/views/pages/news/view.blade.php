@extends('layouts.main')

@section('main')
<div id="news-view-wrapper">
    <div class="container">
        <div class="news-title">
            <h1>{{ $news->title }}</h1>
        </div>
        @isset($news->cover_image)
        <div class="news-cover">
            <img src="{{ asset($news->cover_image) }}" alt="News Cover Image" class="img-fluid">
        </div>
        @endisset
        <div class="news-content">
            {!! $news->content !!}
        </div>
        <hr>
        @can('edit', $news)
        <a href="/news/e/{{ $news->id }}" class="btn btn-sm btn-primary">Edit</a>
        @endcan
        @can('delete', $news)
        <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault();
        document.getElementById('news-delete-form').submit();">Danger</button>
        @endcan
        @if($news->hidden)
            @can('unhide', $news)
            <button class="btn btn-sm btn-success"
                onclick="event.preventDefault();
                document.getElementById('news-unhide-form').submit();">
                {{ __('Unhide') }}
            </button>
            <form id="news-unhide-form" action="/news/unhide" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="id" value="{{ $news->id }}">
            </form>
            @endcan
        @else
            @can('hide', $news)
            <button class="btn btn-sm btn-warning"
                onclick="event.preventDefault();
                document.getElementById('news-hide-form').submit();">
                {{ __('Hide') }}
            </button>
            <form id="news-hide-form" action="/news/hide" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="id" value="{{ $news->id }}">
            </form>
            @endcan
        @endif
        <form id="news-delete-form" action="/news/delete" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="id" value="{{ $news->id }}">
        </form>
    </div>
</div>
@endsection