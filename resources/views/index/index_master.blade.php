<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('snippets.links')
</head>
<body>
    @include('snippets.header')
    @include('sweetalert::alert')
    <div id="Main_content_boxes">
        @yield('content')
    </div>
    @include('snippets.footer2')
</body>
</html>
