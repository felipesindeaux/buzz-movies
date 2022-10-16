<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            a{
                display: block;
            }
        </style>
    </head>
    <body>
        <header>
            <nav>
                <a href="/login">Login</a>
                <a href="/register">Cadastro</a>
                <a href="/dashboard">Dashboard</a>
                <a href="/">Catálogo</a>
                <a href="/movie/create">Criar Filme</a>
            </nav>
        </header>
        <main>
            @if(session('msg'))
                <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content')
        </main>
        <footer>
            <p>Buzz Movies &copy; 2022</p>
        </footer>
    </body>
</html>