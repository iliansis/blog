@extends('layout.header')

@section('title')
    Смена пароля
@endsection

@section('body')
    <h2> Для продолжения введите Ваш новый пароль</h2>
    <form action="/password/update" id="update_password" class="form" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $request->token }}">
        <div class="col-md-12 mb-3">
            <input type="hidden" class="form-control" name="newemail" value="{{ old('email', $request->email) }}"
                id="newemailInput" placeholder="Электронная почта">
            <div class="invalid-feedback" id="newemailError">
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <input type="password" class="form-control" name="newpassword" id="newpasswordInput"
                placeholder="Введите пароль">
            <div class="invalid-feedback" id="newpasswordError">
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <input type="password" class="form-control" name="newpassword_repeat" id="newpassword_repeatInput"
                placeholder="Повторите пароль">
            <div class="invalid-feedback" id="newpassword_repeatError">
            </div>
        </div>

        <button type="submit" class="btn btn-primary text-center">Обновить пароль</button>
    </form>
@endsection
