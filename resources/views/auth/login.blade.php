<x-layout.layout>
    <x-form.layout title="Login" subtitle="Login to view your precious ideas">
        <form action="/login" method="post" class="mt-10 space-y-5">
            @csrf

            <x-form.field label="Email" name="email" type="email" />
            <x-form.field label="Password" name="password" type="password" />

            <button type="submit" class="btn mt-2 h-10 w-full" data-test="login-button">Login</button>
        </form>
    </x-form.layout>
</x-layout.layout>
