<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <title>WebScraper</title>
</head>
<body>
<div class="container">
    <div class="topnav">
        <a class="nav-item" href="{{route('home', ['siteName'=>'15min'])}}">15min</a>
        <a class="nav-item" href="{{route('home', ['siteName'=>'delfi'])}}">Delfi</a>
    </div>
    <div class="posts">
        @foreach ($model as $val)
            <div class="post">
                <div class="post_image">
                    <img class="img" src="{{$val['image']}}" alt="">
                </div>
                <div class="post_content">
                    <div class="post_inside">
                        <p class="post_excerpt">
                            {{ $val['title'] }}
                        </p>
                        <button class="btn--accent post_button">
                            <a href="{{$val['url']}}">Skaitykite plačiau</a>
                            <i class="fa fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>



