<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>OnixPandit – Buscador de Pokémones</title>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.6/dist/semantic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.6/dist/semantic.min.js"></script>

    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
    <script src="/js/pace.min.js"></script>
</head>

<body>
    <div class="ui container">
        <a href="/" class="logo">
            <h1 class="title">Onix<span>pandit</span></h1>
            <p class="subtitle">Buscador de Pokémones</p>
        </a>

        <div class="wrapper">
            <div class="ui search">
                <div class="ui huge left icon fluid input">
                    <i class="search icon"></i>
                    <input class="poke-search prompt" type="text" placeholder="¿Qué pokémon estás buscando?" value="{{ $search ?? '' }}" autofocus>
                </div>
            </div>

            @include('includes/cards', ['searchResults' => $searchResults])
        </div>
    </div>

    <div id="footer">
        <div class="ui container">
            <div class="author">Desarrollado por <span>Juan Leal</span></div>
            <div class="repository"><a href="https://github.com/jota-leal/onix-pandit" target="_blank" data-tooltip="https://github.com/jota-leal/onix-pandit">Ver en GitHub</a></div>
        </div>
    </div>
</body>

</html>