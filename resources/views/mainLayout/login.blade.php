<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Laravel 10</title>
    <style>
        .bg-primary-subtle{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="bg-primary-subtle">
        <div class="container">
            @yield('login')
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
