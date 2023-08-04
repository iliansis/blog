@extends('layout.header')

@section('title')
    {{ $news->name }}
@endsection

@section('body')
    <div class="card mb-3" style="max-width: 1400px; max-height:500px;">
        <div class="row g-0">
            <div class="col-md-4">
                @if (is_null($news->img))
                    <img src="/public/img/tile-empty.png" style=" max-height:230px;" class="img-fluid rounded-start"
                        alt="Фото новости">
                @else              
                <img src="/public/{{$news->img}}" class="img-fluid rounded-start mt-2 mb-3"
                 style="max-width: 240px; max-height:220px;"   alt="Фото новости">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $news->name }}</h5>
                    <p class="card-text">{{ $news->short_description }}</p>
                    <p class="card-text">{{ $news->description }}</p>
                    @auth
                    @if (is_null($like))
                    <a href="/like/{{ $news->id }}" class="btn btn-outline-primary">Нравиться</a>
                @else
                    <a href="/like/{{ $news->id }}" class="btn btn-primary">Нравиться</a>
                @endif 
                    @endauth                   
                    <p class="card-text">Новость понравилась: {{ $news->likes }} пользователям</p>
                    <p class="card-text"><small class="text-muted">Последнее изменение новости
                            {{ $news->updated_at }}</small></p>
                </div>
            </div>
        </div>
    </div>

    @auth
        <div class="row">
            <div class="col-12">
                <form action="{{ route('addComment') }}" class="form" id="addComment" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="hidden" value="{{ $news->id }}" name="news_id">
                        <textarea class="form-control" name="comment" id="commentInput" placeholder="Краткое описание новости" rows="2"></textarea>
                        <div class="invalid-feedback" id="commentError"></div>
                    </div>
                    <button type="submit" class="btn btn-primary text-center">Оставить комментарий</button>

                </form>
            </div>
        </div>
    @endauth

    @forelse ($comments as $c)
        <div class="row mt-3">
            <div class="col-12">
                <div class="card w-75">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-5">
                          <h5 class="card-title">{{ $c->login }}</h5>
                        </div>
                        <div class="col-6">
                          <span>Дата публикации комментария: {{$c->created_at}}</span>
                        </div>
                      </div>
                      
                        <p class="card-text">{{ $c->text }}</p>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h2>Нет комментариев к данной новости</h2>
    @endforelse
    {{ $comments->links() }}
@endsection
