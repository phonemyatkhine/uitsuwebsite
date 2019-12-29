@extends('layouts.main')

@section('main')
<div class="mt-5 py-5">
    <div class="container">
        <div class="events-title mt-2">
            <h1>{{ $events->title }}</h1>
        </div>
        @isset($events->cover_image)
        <div class="events-cover">
            <img src="{{ asset($events->cover_image) }}" alt="News Cover Image" class="img-fluid">
        </div>
        @endisset
        <div class="event-location mb-3 bg-warning container">
            <div class="row">
                @php
                $starttime = date("F d, Y, h:i A", strtotime($events->start));
                $endtime = date("F d, Y, h:i A", strtotime($events->end));    
                @endphp
                <div class="col-4 addressColumn">
                    <i class="far fa-clock icn text-white"></i>
                    <strong class="title text-uppercase fw-semi element-block">start time :</strong>
                    <strong class="fw-normal d-block"><time datetime="2011-01-12">{{ $starttime }}</time></strong>
                </div>
                <div class="col-4 addressColumn">
                    <i class="far fa-clock icn text-white"></i>
                    <strong class="title text-uppercase fw-semi d-block">finish time :</strong>
                    <strong class="fw-normal d-block"><time datetime="2011-01-12">{{ $endtime }}</time></strong>
                </div>
                <div class="col-4 addressColumn">
                    <i class="fas fa-map-marker-alt icn text-white"></i>
                    <strong class="title text-uppercase fw-semi d-block">Address:</strong>
                    <strong class="fw-normal d-block">Parami Road, Universities' Hlaing Campus, Ward (12), Hlaing Township, Yangon, Myanmar</strong>
                </div>
            </div>
        </div>
        <div class="events-content">
            {!! $events->content !!}
        </div>
        @if(Auth::check())
        <hr>
        @can('edit', $events)
        <a href="/events/e/{{ $events->id }}" class="btn btn-sm btn-primary">Edit</a>
        @endcan
        @can('delete', $events)
        <button type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault();
        document.getElementById('events-delete-form').submit();">Danger</button>
        @endcan
        @if($events->hidden)
            @can('unhide', $events)
            <button class="btn btn-sm btn-success"
                onclick="event.preventDefault();
                document.getElementById('events-unhide-form').submit();">
                {{ __('Unhide') }}
            </button>
            <form id="events-unhide-form" action="/events/unhide" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="id" value="{{ $events->id }}">
            </form>
            @endcan
        @else
            @can('hide', $events)
            <button class="btn btn-sm btn-warning"
                onclick="event.preventDefault();
                document.getElementById('events-hide-form').submit();">
                {{ __('Hide') }}
            </button>
            <form id="events-hide-form" action="/events/hide" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="id" value="{{ $events->id }}">
            </form>
            @endcan
        @endif
        <form id="events-delete-form" action="/events/delete" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="id" value="{{ $events->id }}">
        </form>
        @endif
    </div>
</div>
@endsection