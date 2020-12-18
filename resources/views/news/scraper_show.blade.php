@extends('layouts.main')
@section('title') {{ $news->scraper_news_name }} @endsection
@section('content')
    <div>
        <h1>{{ $news->scraper_news_name }}</h1>
        <hr>
        <p>{{ $news->scraper_news_text }}</p>
        <img src="{{ $news->scraper_news_img }}" class="img-fluid" alt="img">
    </div>
@stop
