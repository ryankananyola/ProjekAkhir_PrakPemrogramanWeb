<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    {{-- icon --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        body,
        html, {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        * {
            box-sizing: border-box;

        }

        .material-symbols-outlined {
        font-variation-settings:
            'FILL' 0,
            'wght' 500,
            'GRAD' 0,
            'opsz' 24
        }

    </style>
    <title>Laravel 10</title>
</head>

<body>
    <nav class="fixed-top navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Rekening Bersama</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Market</a>
                    </li>
                    <li class="nav-item">
                        <a class=" btn btn-danger" href="/logout">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="height: 3.5em">1</div>

        @yield('content')



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
