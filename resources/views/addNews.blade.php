@extends('layout.header')

@section('title')
    Создание новости
@endsection

@section('body')
    <form action="{{ route('addNews') }}" id="addNews" class="form" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Заголовок новости" name="name" id="nameInput">
                    <br>
                    <div class="invalid-feedback" id="nameError"></div>
                </div>
               

                <div class="input-group mb-3">
                    <textarea class="form-control" name="short_descr" id="short_descrInput" placeholder="Краткое описание новости"
                        rows="3"></textarea>
                    <div class="invalid-feedback" id="short_descrError"></div>
                </div>

                <button type="submit" class="btn btn-primary">Создать новость</button>
            </div>




            <div class="col-6">
                <div class="input-group mb-3">
                    <textarea class="form-control" name="descr" id="descrInput" placeholder="Описание" rows="7"></textarea>
                    <div class="invalid-feedback" id="descrError"></div>
                </div>
            </div>
        </div>
    </form>
@endsection
