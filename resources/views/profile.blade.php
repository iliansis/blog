@extends('layout.header')

@section('title')
    Личный кабинет
@endsection

@section('body')
    <div class="text-center mt-3">
        <h2 class="text-center">Добро пожаловать в личный кабинет</h2>
        <a href="{{ route('addNews_Page') }}" class="btn btn-primary">Создать новость</a>

        @forelse ($news as $n)
            <div class="row mt-4">
                <div class="col-12">

                    <div class="card mb-3" style="max-width: 1400px; max-height:300px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                @if (is_null($n->img))
                                    <img src="/public/img/tile-empty.png" style="max-height:220px;"
                                        class="img-fluid rounded-start" alt="Фото новости">
                                @else
                                    <img src="/public/{{ $n->img }}" class="img-fluid rounded-start mt-2 mb-3"
                                     style="max-width: 240px; max-height:220px;"   alt="Фото новости">
                                @endif
                                <a href="/updateImg/{{ $n->id }}" class="btn btn-primary mb-2">Изменить фото
                                    новости</a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="/news/{{ $n->id }}" class="news">
                                        <h5 class="card-title">{{ $n->name }}</h5>
                                        <p class="card-text mb-3">{{ $n->short_description }}</p>
                                    </a>
                                    <a href="/profile/updateNewsPage/{{ $n->id }}"
                                        class="btn btn-primary mb-3">Изменить текст новости</a> <a
                                        href="profile/deleteNews/{{ $n->id }}"
                                        class="btn btn-outline-danger mb-3">Удалить новость</a>
                                    <p class="card-text"><small class="text-muted">Последнее изменение новости
                                            {{ $n->updated_at }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        @empty
            <h4 class="text-center">Пока нет новостей</h4>
        @endforelse

        <div>
            {{ $news->links() }}
        </div>
    </div>
@endsection
