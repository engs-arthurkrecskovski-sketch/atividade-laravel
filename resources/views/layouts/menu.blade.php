<nav>
    <a href="{{ url('/sobre') }}">Sobre</a>
    <a href="{{ url('/contato') }}">Contato</a>

    @auth
        <a href="{{ route('dashboard') }}">Painel</a>
        <a href="{{ route('alunos.index') }}">Alunos</a>
        <a href="{{ route('cursos.index') }}">Cursos</a>
        <a href="{{ route('profile.edit') }}">Meu perfil</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Sair</button>
        </form>
    @else
        <a href="{{ route('login') }}">Entrar</a>
        <a href="{{ route('register') }}">Criar conta</a>
    @endauth
</nav>