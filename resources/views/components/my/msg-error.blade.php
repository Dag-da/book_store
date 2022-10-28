@props([
    'input'
])

@error($input)
<p class="text-rose">*{{ $message }}</p>
@enderror