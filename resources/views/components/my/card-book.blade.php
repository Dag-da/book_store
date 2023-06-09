@props([
    'title',
    'image',
    'description',
    'id',
    'author',
    'price'
])

<div class="relative h-96">
    <div class="transition ease-out rounded absolute opacity-0 hover:opacity-100 bg-white p-6 h-full">
        <h2 class="text-2xl border-b border-gray-300 pb-3">{{ $title }}</h2>
        <div class="flex justify-between">
            <em>{{ $author }}</em>
            <span class="text-red-500 font-bold">{{ $price }}€</span>
        </div>
        <p class="mt-3">{{ $description }}</p>
    </div>
    <div>
        <div class="rounded overflow-hidden">
            <img src='{{ asset($image) }}' alt='{{ $title }}'>
        </div>
        <h2 class="pt-6 text-xl">{{ $title }}</h2>
    </div>
</div>