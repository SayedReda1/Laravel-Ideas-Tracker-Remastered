@props([
    'name' => 'required',
    'label' => 'required',
    'bag' => 'required'
])

<div>
    <fieldset class="space-y-3">

        <legend class="label">{{ $label }}</legend>

        <template x-for="({{ $name }},index) in {{ $bag }}">
            <div class="flex gap-x-4 items-center">
                <input type="text" name="{{ $bag }}[]" x-model="{{ $name }}" class="flex-1 input">
                <button
                    type="button"
                    @click="{{ $bag }}.splice(index,1)"
                    class="text-3xl rotate-45 form-muted-icon"
                >+</button>
            </div>
        </template>

        <div class="flex gap-x-4 items-center">
            <input
                type="text"
                name="{{ $name }}"
                id="{{ $name }}"
                data-test="{{ $name }}-field"
                class="input focus:outline-none focus:ring-2 focus:ring-primary flex-1"
                x-model="new_{{ $name }}"
                {{ $attributes }}
            >
            <button
                type="button"
                class="text-3xl form-muted-icon"
                @click="{{ $bag }}.push({{ $x_model }}.trim()); {{ $x_model }} = ''"
                :disabled="{{ $x_model }}.trim().length === 0"
                data-test="add-new-{{ $name }}-button"
            >+</button>
        </div>

    </fieldset>
</div>
