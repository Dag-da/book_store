<x-my.layout :title='$book->title'>
    <section class="py-5 max-w-6xl mx-auto">
        <h2 class="text-6xl font-medium py-10">Modifier <span class="text-secondary">"{{ $book->title }}"</span></h2>
        <form action="{{ route('book.update', $book->id) }}" method=POST enctype="multipart/form-data" class="">
            @csrf
            @method('PUT')
            <div>
                {{-- title --}}
                <input type="text" class="block w-full py-4 px-5 rounded-xl border border-gray-500" name="title" placeholder="Exemple : Madame Bovary, Les Misérables..." value='{{ old('title', $book->title) }}' />
                <x-my.msg-error input='title' />
                
                {{-- author --}}
                <input type="text" class="block w-full py-4 px-5  rounded-xl border border-gray-500 mt-6" name="author" placeholder="Exemple : Emile Zola, Victor Hugo..." value='{{ old('author', $book->author) }}' />
                <x-my.msg-error input='author' />
                
                {{-- price --}}
                <input type="text" name='price' class="block w-full py-4 px-5 rounded-xl border border-gray-500 mt-6" placeholder="Prix : xx.xx" value='{{ old('price', $book->price) }}' />
                <x-my.msg-error input='price' />

                {{-- pages --}}
                <input type="text" name='pages' class="block w-full py-4 px-5 rounded-xl border border-gray-500 mt-6" placeholder="Exemple : 258, 1024 pages.." value='{{ old('pages', $book->pages) }}' />
                <x-my.msg-error input='pages' />
                
                {{-- content --}}
                <textarea name="description" cols="30" rows="10" class="mt-5 block w-full py-4 px-5 rounded-xl border border-gray-500" placeholder="Exemple : Madame Bovary. Mœurs de province, couramment abrégé en Madame Bovary, est un roman de Gustave Flaubert paru en 1857...">{{ old('description', $book->description) }}</textarea>
                <x-my.msg-error input='description' />
                
                {{-- image --}}
                <div class="mt-6">
                    <label for="image" class="">Choisir une image :</label>
                    <input type="file" name="image" id="" class="block">
                    <x-my.msg-error input='image' />      
                </div>   
                
                {{-- btn submit --}}
                <button class="mt-6 py-4 px-10 rounded-xl border border-gray-500 hover:bg-gray-100 hover:text-primary hover:font-semibold" type="submit">Envoyer</button>
            </div>
        </form>
    </section>
</x-my.layout>