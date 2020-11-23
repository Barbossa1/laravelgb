@extends('layouts.main')
@section('title') Новости @endsection
@section('content')
    <h1>Новости</h1>
    <hr>
    @foreach($news as $el)
        <a href="{{ route('news.show', ['id' => $el->id]) }}">
            <div class="alert alert-info">
                <h3>{{ $el->news_name }}</h3>
            </div>
        </a>
    @endforeach
    <br>
@endsection
