@props([
    'id',
    'options'
])

<datalist id="{{ $id }}">
    @foreach ($options as $option)
        <option value="{{ $option->name }}">
    @endforeach
</datalist>