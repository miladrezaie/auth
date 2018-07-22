<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                @foreach($posts as $post)


                    {{--authorization services by ACL Gate--}}
                    {{--<h4>--}}
                        {{--@can('show-post',$post)--}}
                            {{--<a href="{{route('post.single',$post->id)}}">--}}
                                {{--@endcan--}}
                                {{--{{$post->title}}--}}
                                {{--@can('show-post',$post)--}}
                            {{--</a>--}}
                        {{--@endcan--}}
                    {{--</h4>--}}
                    {{--authorization services by ACL PostPolicy--}}
                    <h4>
                        @can('view',$post)
                            <a href="{{route('post.single',$post->id)}}">
                                @endcan
                                {{$post->title}}
                                @can('view',$post)
                            </a>
                        @endcan
                    </h4>

                <p>{{$post->body}}</p>
                    <hr>
                @endforeach
            </div>
        </div>
    </body>
</html>