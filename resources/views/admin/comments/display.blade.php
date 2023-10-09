<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


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

        table.mytable { border-collapse: collapse; border: 1px solid #839E99;
        background: #f1f8ee; font: .9em/1.2em Georgia, "Times New Roman", Times, serif; color: #033; }
        .mytable caption { font-size: 1.3em; font-weight: bold; text-align: left; padding: 1em 4px; }
        .mytable td,
        .mytable th { padding: 3px 3px .75em 3px; line-height: 1.3em; }
        .mytable th { background: #839E99; color: #fff; font-weight: bold; text-align: left; padding-right: .5em; vertical-align: top; }
        .mytable thead th { background: #2C5755; text-align: center; }
        .mytable .odd td { background: #DBE6DD; }
        .mytable .odd th { background: #6E8D88; }
        .mytable td a,
        .mytable td a:link { color: #325C91; }
        .mytable td a:visited { color: #466C8E; }
        .mytable td a:hover,
        .mytable td a:focus { color: #1E4C94; }
        .mytable th a,
        .mytable td a:active { color: #fff; }
        .mytable tfoot th,
        .mytable tfoot td { background: #2C5755; color: #fff; }
        .mytable th + td { padding-left: .5em; }


    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $localeCode }}</a>

                    </li>
                    @endforeach


                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

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

        @foreach ($comments as $comment)
             <table class="mytable">

                <tr>
                    <th>{{ $comment -> name }}</th>
                </tr>
                <tr>
                    <td>{{ $comment -> comment }}</td>
                </tr>

             </table>
        @endforeach


    </div>
</body>
</html>

