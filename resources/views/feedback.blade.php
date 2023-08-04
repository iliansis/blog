@extends('layout.header')

@section('title')
    Техподдержка
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('feedbackSend') }}" class="form" id="feedbackSend" method="POST">
                @csrf
                <div class="input-group mb-3"></div>
                <div class="col-md-12 mb-3">
                    <input type="text" class="form-control" name="nameFeedback" id="nameFeedbackInput"
                        placeholder="Ваше имя">
                    <div class="invalid-feedback" id="nameFeedbackError">
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <input type="text" class="form-control" name="emailFeedback" id="emailFeedbackInput"
                        placeholder="Электронная почта">
                    <div class="invalid-feedback" id="emailFeedbackError">
                    </div>
                </div>
                <textarea class="form-control mb-3" name="message" id="messageInput" placeholder="Описание проблемы" rows="6"></textarea>
                <div class="invalid-feedback" id="messageError"></div>
        </div>
        <button type="submit" class="btn btn-primary text-center mt-2">Отправить письмо в техподдержку</button>

        </form>
    </div>
    </div>
@endsection
