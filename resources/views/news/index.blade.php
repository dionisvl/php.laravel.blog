@extends('news-layout')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Посадочная станица /news
        </div>

        <div class="links">
            Список новостных категорий:<br>
            @foreach($topics as $topic)
                <a href="/news/{{$topic->slug}}">{{$topic->name}}({{$topic->posts()->count()}})</a> <br>
            @endforeach

        </div>
    </div>
@endsection
