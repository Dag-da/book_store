<x-my.layout :title='$book->title'>
    <section>
        <div class="w-full">
            <h2 class="text-6xl py-5 pl-3">{{ $book->title }}</h2>
        </div>
        <div class="px-10 flex">
            <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}">
            <div class="px-20">
                <div class="flex justify-between">
                    <em>{{ $book->author }}</em>
                    <span class="text-xl font-bold text-red-500">{{ $book->price }}€</span>
                </div>
                <p>Nombre de pages : <span class="font-bold">{{ $book->pages }}</span></p>
                <p class="bg-gray-200 py-20">{{ $book->description }}</p>
            </div>
        </div>
            @auth
                    <a href="{{ route('book.edit', $book->id) }}">
                        Modifier
                    </a>
                    <form action={{ route('book.destroy', $book->id) }} method="POST" onsubmit="return confirm('Are you sure ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-circle" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </form>
            @endauth
        </div>
    </section>
</x-my.layout>