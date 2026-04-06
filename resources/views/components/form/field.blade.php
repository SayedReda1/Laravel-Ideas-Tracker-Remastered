@props(['label' => false, 'name', 'type'])

<div class="space-y-2">
    @if($label)
        <label for="{{ $name }}" class="label">{{ $label }}</label>
    @endif

    @if($type === 'textarea')
        <textarea
            name="{{ $name }}"
            id="{{ $name }}"
            class="textarea focus:outline-none focus:ring-2 focus:ring-primary"
            {{ $attributes }}
        >{{ old($name) }}</textarea>
    @else
        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            class="input focus:outline-none focus:ring-2 focus:ring-primary"
            value="{{ old($name) }}" {{ $attributes }}
        >
    @endif

    <x-form.error name="{{ $name }}" />
</div>
