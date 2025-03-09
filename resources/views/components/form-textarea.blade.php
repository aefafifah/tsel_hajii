@props(['name', 'rows' => 3])

<textarea 
    name="{{ $name }}" 
    id="{{ $name }}" 
    rows="{{ $rows }}"
    {{ $attributes->merge(['class' => 'form-control']) }}
>{{ $slot }}</textarea>