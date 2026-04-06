@props(['name' => 'required', 'title' => 'required'])

<div
    x-data="{ show: false }"
    x-show="show"
    @open-modal.window="if ($event.detail === @js($name)) show = true"
    @keydown.escape.window="show = false"
    x-transition:enter="ease-out duration-200"
    x-transition:enter-start="opacity-0 translate-y-4"
    x-transition:leave="ease-in duration-150"
    x-transition:leave-end="opacity-0 translate-y-4"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs"
    style="display: none"
    role="dialog"
    aria-modal="true"
    aria-label="create new idea"
    :aria-hidden="!show"
    tabindex="-1"
>
    <x-card @click.away="show = false" {{ $attributes }}>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">{{ $title }}</h2>
            <button @click="show=false" class="btn btn-outlined w-9 h-9">X</button>
        </div>
        <div>
            {{ $slot }}
        </div>
    </x-card>
</div>
