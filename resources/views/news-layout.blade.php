<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        /*.full-height {*/
        /*    height: 100vh;*/
        /*}*/

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            text-align: left;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        ul {
            margin: 0; /* Обнуляем значение отступов */
            padding: 4px; /* Значение полей */
        }

        ul li {
            display: inline; /* Отображать как строчный элемент */
            margin-right: 5px; /* Отступ слева */
            padding: 3px; /* Поля вокруг текста */
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @yield('content')
</div>

<div>
    <h4>Подборка трех самых просматриваемых новостей</h4>
    @foreach($top_posts as $top_post)
        <div>Новость <a href="{{$top_post->url}}">{{$top_post->name}}</a> ({{$top_post->created_at}}) (просмотров - {{$top_post->views_count}})</div>
    @endforeach
</div>

</body>
</html>
