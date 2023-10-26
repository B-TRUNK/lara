<!d<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


        <!-- Styles -->
        <style>
            html,
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

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

            .links>a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
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

                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif

                @if(($user_id) != Null)
                        <div class="container">
                            @foreach($user_id->roles as $key => $role)
                                {{ $role->name }}
                            @endforeach
                            @foreach($user_id->comments as $comment)

                                <div class="well well-lg">
                                    <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            {{ $comment -> created_at }}
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                            {{ $comment -> user->name }}{{-- get the name by belongsTo relation --}}
                                            <a href="{{ route('comments.edit' ,$comment -> id) }}" class="btn btn-info pull-right">Edit</a>
                                            <form method="POST" action={{ route('comments.destroy',$comment->id) }}>
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                {{-- <input type="hidden" name="_method" value="DELETE"/> --}}
                                                <button class="btn btn-danger pull-right">Delete</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <a href="{{ route('comments.show' ,$comment -> id) }}">
                                                {{ $comment -> comment }}
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                @endforeach
                        </div>
                @else
                    {{ 'No User Found' }}
                @endif



        </div>
    </body>
    </html>

