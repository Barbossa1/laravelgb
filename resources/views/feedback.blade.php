@extends('layouts.main')
@section('title') Обратная связь @endsection
@section('content')
    <h1>Обратная связь</h1>
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
    <form method="post" action="{{ route('check') }}">
        @csrf
        <input type="email" name="email" id="email" placeholder="Введите email" class="form-control"><br>
        <input type="text" name="subject" id="subject" placeholder="Введите тему" class="form-control"><br>
        <textarea name="message" id="message" class="form-control" placeholder="Введите текст сообщения"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <br>
@endsection
