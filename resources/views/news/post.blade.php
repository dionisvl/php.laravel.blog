@extends('news-layout')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Страница новости {{$post->name}}
        </div>

        <div class="links">
            Эта новость из категории: {{$post->topic->name}}<br>
            Кол-во просмотров: {{$post->views_count}}<br>
            Дата публикации: {{$post->created_at}}<br>
        </div>

        <h4>Детальный текст новости: </h4>
        <div>
            {{$post->full_text}}
        </div>
    </div>
@endsection
