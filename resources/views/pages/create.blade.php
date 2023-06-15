<x-my.layout title='Ajouter un livre'>
    <section class="py-5 max-w-6xl mx-auto">
        <h2 class="text-6xl font-medium">Ajouter un <span class="text-secondary">Livre</span></h2>
        <form action="{{ route('book.store') }}" method=POST enctype="multipart/form-data" class="">
            @csrf
            <div>
                {{-- title --}}
                <input type="text" class="block w-full py-4 px-5 rounded-xl border border-gray-500" name="title" placeholder="Exemple : Madame Bovary, Les Misérables..." value='{{ old('title') }}' />
                <x-my.msg-error input='title' />
                
                {{-- author --}}
                <input type="text" class="block w-full py-4 px-5 rounded-xl border border-gray-500 mt-6" name="author" id="author" placeholder="Exemple : Emile Zola, Victor Hugo..." value='{{ old('author') }}' autocomplete="off" list="authors"/>
                <x-my.msg-error input='author' />
                {{-- authors sugestions --}}
                <x-my.form.datalist id='authors' :options=$authors />

                {{-- price --}}
                <input type="text" name='price' class="block w-full py-4 px-5 rounded-xl border border-gray-500 mt-6" placeholder="Prix : xx.xx" value='{{ old('price') }}' />
                <x-my.msg-error input='price' />

                {{-- pages --}}
                <input type="text" name='pages' class="block w-full py-4 px-5 rounded-xl border border-gray-500 mt-6" placeholder="Exemple : 258, 1024 pages.." value='{{ old('pages') }}' />
                <x-my.msg-error input='pages' />
                
                {{-- content --}}
                <textarea name="description" cols="30" rows="10" class="mt-5 block w-full py-4 px-5 rounded-xl border border-gray-500" placeholder="Exemple : Madame Bovary. Mœurs de province, couramment abrégé en Madame Bovary, est un roman de Gustave Flaubert paru en 1857...">{{ old('description') }}</textarea>
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
        <form action="{{route('author.search') }}" method="POST" class="js-search-form">
            @csrf
            <input type="text" class="block w-full py-4 px-5 rounded-xl border border-gray-500 mt-6" name="search" id="search" placeholder="search" value='{{ old('search') }}' list="search-suggestions" autocomplete="off"/>
            <x-my.msg-error input='search' />
            <datalist class="js-search-result" id="search-suggestions">
                
            </datalist>
            <button class="mt-6 py-4 px-10 rounded-xl border border-gray-500 hover:bg-gray-100 hover:text-primary hover:font-semibold" type="submit">Envoyer</button>
        </form>
    </section>
</x-my.layout>