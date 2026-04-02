@props(['label', 'name', 'type'])

<div class="space-y-2">
    <label for="{{ $name }}" class="label">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}"
        class="input focus:outline-none focus:ring-2 focus:ring-primary" id="{{ $name }}"
        value="{{ old($name) }}" {{ $attributes }}>

    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</div>