<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- APP CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CSS_grid.css') }}">

    <style>
        .active {
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    @include('layouts.partials.header')

    {{-- CONTENIDO --}}
    @yield('content')

    {{-- FOOTER --}}
    @include('layouts.partials.footer')

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Vue 3 CDN -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <!-- JS global con mixins -->
    <script src="{{ asset('js/util/vueMixins.js') }}"></script>

    <!-- Axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Scripts específicos de la página -->
    @if (!empty($vueJsFile))
        <script src="{{ asset($vueJsFile) }}"></script>
    @endif


</body>

</html>
