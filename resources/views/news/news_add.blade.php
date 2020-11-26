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
    <form method="post" action="{{ route('addNews') }}" enctype="multipart/form-data">
        @csrf
        <p>Заголовок: <input type="text" name="news_name" id="news_name" placeholder="Введите заголовок" class="form-control"></p><br>
        <p>Автор: <input type="text" name="news_author" id="news_author" placeholder="Введите автора" class="form-control"></p><br>
        <p>Новость: <textarea name="news_text" id="news_text" class="form-control" placeholder="Введите новость"></textarea></p><br>
{{--        <p>Изображение: <input type="file" name="news_img" id="news_img" class="form-control"></p><br>--}}
        <button type="submit" class="btn btn-success">Добавить</button>
    </form>
    <br>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/23.1.0/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            ClassicEditor
                .create(document.querySelector('#news_text'))
                .catch(error => {
                    console.error( error );
                });
        });
    </script>
@endpush
