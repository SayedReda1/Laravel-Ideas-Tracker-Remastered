<x-layout.layout>
    <x-form.layout title="Register an account" subtitle="Start tracking your ideas today.">
        <form action="/register" method="post" class="mt-10 space-y-5">
            @csrf

            <x-form.field label="Name" name="name" type="text" />
            <x-form.field label="Email" name="email" type="email" />
            <x-form.field label="Password" name="password" type="password" />

            <button type="submit" class="btn mt-2 h-10 w-full" data-test="register-button">Create Account</button>
        </form>
    </x-form.layout>
</x-layout.layout>
