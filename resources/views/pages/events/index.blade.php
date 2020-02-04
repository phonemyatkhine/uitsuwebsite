@extends('layouts.main')

@section('main')
<div id="event-section" class="py-5 mt-5">
    <div class="container mt-3">
        <div class="section-title">
            <div>
                <h1>Upcoming Events</h1>
            </div>
            <p>Recent and upcoming educational events listed here</p>
            @if(Auth::check() && Auth::user()->can('create', App\Events::class))
            <div class="view-more-btn">
                <a href="/events/create" class="custom-btn">Post Event</a>
            </div>
            @endif
        </div>
        <!-- Recent events start here -->
        @if(count($events))
            @foreach($events as $event)
            <div class="event">
                <div class="row">
                    <div class="col-md-3 event-photo order-md-2">
                        @if(isset($event->cover_image))
                        <img class="mb-3 mb-md-0" src="{{ asset($event->cover_image) }}">
                        @endif
                    </div>
                    <div class="col-md-9 order-md-1">
                        <div class="row">
                            <div class="col-md-3">
                                @php
                                $rawstart = explode('T', $event->start);
                                $startdate = $rawstart[0];
                                $starttime = $rawstart[1];
                                $rawend = explode('T', $event->end);
                                $enddate = $rawend[0];
                                $endtime = $rawend[1];
                                @endphp
                                <div class="event-date">
                                    <time datetime="{{ date('Y-m-d', strtotime($starttime)) }}" class="time text-uppercase">
                                        <stong class="date">{{ date('d', strtotime($starttime)) }}</stong>
                                        <stong class="month text-muted">{{ date('F', strtotime($starttime)) }}</stong><br>
                                        <strong class="day text-muted">{{ date('D', strtotime($starttime)) }}</strong>
                                    </time>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3 class="event-title">{{ $event->title }}</h3>
                                <div class="event-time">
                                    <address><time datetime="{{ date('Y-m-d', strtotime($starttime)) }}">{{ date('g:i A', strtotime($starttime)) }} - {{ date('g:i A', strtotime($endtime)) }}</time> | UIT Campus</address>
                                </div>
                                <a href="/events/v/{{ $event->id }}" class="custom-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
        No Event :')
        @endif
        @if(Auth::check())
        <hr class="my-4">
        @if(count($hidden))
        <div class="section-title">
            <div>
                <h1>Hidden Events</h1>
            </div>
            <p>You're seeing this since you can unhide!</p>
        </div>
        @foreach($hidden as $event)
        <div class="event">
            <div class="row">
                <div class="col-md-3 event-photo order-md-2">
                    @if(isset($event->cover_image))
                    <img class="mb-3 mb-md-0" src="{{ asset($event->cover_image) }}">
                    @endif
                </div>
                <div class="col-md-9 order-md-1">
                    <div class="row">
                        <div class="col-md-3">
                            @php
                            $rawstart = explode('T', $event->start);
                            $startdate = $rawstart[0];
                            $starttime = $rawstart[1];
                            $rawend = explode('T', $event->end);
                            $enddate = $rawend[0];
                            $endtime = $rawend[1];
                            @endphp
                            <div class="event-date">
                                <time datetime="{{ date('Y-m-d', strtotime($starttime)) }}" class="time text-uppercase">
                                    <stong class="date">{{ date('d', strtotime($starttime)) }}</stong>
                                    <stong class="month text-muted">{{ date('F', strtotime($starttime)) }}</stong><br>
                                    <strong class="day text-muted">{{ date('D', strtotime($starttime)) }}</strong>
                                </time>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h3 class="event-title">{{ $event->title }}</h3>
                            <div class="event-time">
                                <address><time datetime="{{ date('Y-m-d', strtotime($starttime)) }}">{{ date('g:i A', strtotime($endtime)) }} - {{ date('g:i A', strtotime($endtime)) }}</time> | UIT Campus</address>
                            </div>
                            <a href="/events/v/{{ $event->id }}" class="custom-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        No Hidden Events :)
        @endif
        @endif
    </div>
</div>
@endsection
