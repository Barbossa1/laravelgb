@extends('layouts.main')
@section('title') Новости @endsection
@section('content')
    <h1>РБК</h1>
    <hr>
    @foreach($news as $el)
        <a href="{{ $el->news_link }}">
            <div class="alert alert-info">
                <h3>{{ $el->news_title }}</h3>
                <p>{{ $el->news_date }}</p>
            </div>
        </a>
    @endforeach
    <br>
@endsection
