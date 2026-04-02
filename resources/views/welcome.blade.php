<x-layout.layout>
    @session('success')
        <x-flash value="{{ $value }}" />
    @endsession
</x-layout.layout>
