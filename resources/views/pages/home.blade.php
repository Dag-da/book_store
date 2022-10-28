<x-my.layout title='Book Store'>
    <section class="max-w-6xl mx-auto py-20">
        <h2 class="text-white text-6xl font-medium">Explore the best <span class="text-secondary">Books</span></h2>
        <div class="mt-16 grid grid-cols-4 auto-rows-fr gap-x-6 gap-y-20">
            @forelse ($books as $book)
                <a href='{{ route('book.show', $book->id) }}'>
                    <x-my.card-book :title='$book->title' :image='$book->image' :description='$book->description' :id='$book->id' :author='$book->author' :price='$book->price' />
                </a>
            @empty
                <p>Pas de vidéo enregistrée.</p>
            @endforelse
        </div>
        <div class="mt-20">
            {{ $books->links('pagination::tailwind') }}
        </div>
    </section>
</x-my.layout>