@extends('layout.header')

@section('title')
    Редактирование новости
@endsection

@section('body')
    <form action="/updateNews" id="updateNews" class="form" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <input type="hidden" value="{{ $news->id }}" name="news_id">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Заголовок новости" value="{{ $news->name }}"
                        name="nameUpdate" id="UpdateInput"> <br>
                    <div class="invalid-feedback" id="nameUpdateError"></div>
                </div>


                <div class="input-group mb-3">
                    <textarea class="form-control" name="short_descrUpdate" id="short_descrUpdateInput"
                        placeholder="Краткое описание новости" rows="4">{{ $news->short_description }}</textarea>
                    <div class="invalid-feedback" id="short_descrUpdateError"></div>
                </div>

                <button type="submit" class="btn btn-primary">Создать новость</button>
            </div>




            <div class="col-6">
                <div class="input-group mb-3">
                    <textarea class="form-control" name="descrUpdate" id="descrUpdateInput" placeholder="Описание" rows="8">{{ $news->description }}</textarea>
                    <div class="invalid-feedback" id="descrUpdateError"></div>
                </div>
            </div>
        </div>
    </form>
@endsection
