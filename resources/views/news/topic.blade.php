@extends('news-layout')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Новостная категория {{$topic->name}}
        </div>
        <div>(/news/{{$topic->slug}})</div>

        <div class="links">
            <div>Число опубликованных новостей в данной категории - <b>{{$topic->posts()->count()}}</b></div>
        </div>
        <div>Список анонсов новостей, отсортированны по дате публикации новости (новое выше)
        </div>
        <table>
            <tr>
                <th>name</th>
                <th>дата публикации</th>
                <th>image</th>
                <th>анонс</th>
            </tr>
            @foreach($posts as $post)
                <tr>
                    <td><a href="{{$post->url}}">{{$post->name}}</a></td>
                    <td>{{$post->getCteatedAt('d.m.Y h:i')}}</td>
                    <td><img src="{{$post->image}}" alt="{{$post->name}}"></td>
                    <td>{{$post->preview_text}}</td>
                </tr>
            @endforeach

        </table>
        {{ $posts->links() }}
    </div>
@endsection
