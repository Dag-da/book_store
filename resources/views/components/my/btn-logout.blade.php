<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Déconnexion</button>
</form>