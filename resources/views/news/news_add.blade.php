@extends('layouts.main')
@section('title') Добавление новости @endsection
@section('content')
    <h1>Добавление новости</h1>
    <hr>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('addNews') }}">
        @csrf
        <input type="text" name="news_name" id="news_name" placeholder="Введите заголовок" class="form-control"><br>
        <input type="text" name="news_author" id="news_author" placeholder="Введите автора" class="form-control"><br>
        <textarea name="news_text" id="news_text" class="form-control" placeholder="Введите новость"></textarea><br>
        <button type="submit" class="btn btn-success">Добавить</button>
    </form>
    <br>
@endsection
