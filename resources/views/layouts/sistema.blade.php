<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Alunos')</title>
</head>
<body>

    <header>
        <h1>Sistema de Alunos</h1>
    </header>

    @include('layouts.menu')

    <main>
    @yield('content')
    </main>

    <footer>
        <p>&copy; 2026 - Sistema de Alunos</p>
    </footer>

</body>
</html>