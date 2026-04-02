@props(['value'])

<div
    x-data="{ show: true }"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show"
    x-transition.opacity.duration.300ms
    class="bg-primary px-4 py-3 absolute bottom-4 right-4 rounded-lg"
>
    {{ $value }}
</div>
