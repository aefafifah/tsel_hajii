@props(['label', 'name', 'type' => 'text', 'placeholder' => '', 'rows' => 3, 'required' => false])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label font-weight-bold">{{ $label }}</label>
    
    @if($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}" rows="{{ $rows }}" {{ $required ? 'required' : '' }}>{{ old($name) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}" value="{{ old($name) }}" {{ $required ? 'required' : '' }}>
    @endif
</div>
