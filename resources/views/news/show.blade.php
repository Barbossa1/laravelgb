@extends('layouts.main')
@section('title') {{ $news->news_name }} @endsection
@section('content')
    <div>
        <h1>{{ $news->news_name }}</h1>
        <hr>
        <h2>{{ $news->news_author }}</h2>
        <p>{{ $news->news_text }}</p>
{{--        <img src="{{ $news->news_img }}" class="img-fluid" alt="img">--}}
    </div>
@stop
