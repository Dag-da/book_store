<header class="mx-auto max-w-6xl py-6 flex justify-between items-center">
    <div class="">
        <a href="{{ route('home') }}">
            <h1 class="text-4xl text-primary font-semibold">
                Book<span class="font-bold text-secondary">Store</span>
            </h1>
        </a>
    </div>
    <nav>
        <ul class="flex items-center space-x-6 text-xl">
            @guest
            <li><a href="{{ route('login') }}">Se connecter</a></li>
            <li><a href="{{ route('register') }}">S'inscrire</a></li>
            @endguest
            @auth
            <li><a href="{{ route('book.create') }}">Ajouter un livre</a></li>
            <li><x-my.btn-logout /></li>
            @endauth
        </ul>
    </nav>
</header>