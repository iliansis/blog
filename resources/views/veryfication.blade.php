@extends('layout.header')

@section('title')
    Подтверждение адреса
@endsection

@section('body')
    <h2> Для продолжения подтвердите Ваш адрес электронной почты</h2>
    <form action="/email/verify-send" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Отправить подтверждение повторно</button>
    </form>
@endsection
