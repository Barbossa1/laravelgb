@extends('layouts.main')
@section('title') Админка @endsection
@section('content')
    <h1>Админка</h1>
    <hr>
    <a class="nav-link" href="{{ route('news_add') }}">Добавить новость</a>
    <br>
@endsection
