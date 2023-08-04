@extends('layout.header')

@section('title')
    Главная
@endsection

@section('body')
    <div class="card mb-3" style="max-width: 1400px; max-height:300px;">
        <div class="row g-0">
            <div class="col-md-4 text-center">
                <h4>Старое Изображение</h4>
                @if (is_null($news->img))
                    <img src="/public/img/tile-empty.png" style=" max-height:230px;" class="img-fluid rounded-start"
                        alt="Фото новости">
                @else
                    <img src="/public/{{ $news->img }}" class="img-fluid rounded-start" alt="Фото новости">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <form action="/changeImg" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h6>Изображение для новости</h6><br>
                        <div class="input-group mb-3">
                            <input type="hidden" name="img_id" value="{{ $news->id }}">
                            <input type="file" class="form-control" accept="image/*" placeholder="Цвет авто"
                                name="img" id="imgInput"> <br>
                        </div>
                        <button type="submit" class="btn btn-outline-primary">Изменить фото новости</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
