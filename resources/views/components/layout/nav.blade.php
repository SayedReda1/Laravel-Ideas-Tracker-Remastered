<nav class="border-b border-border px-6">
    <div class="max-w-7xl mx-auto h-16 flex items-center justify-between">
        <div>
            <a href="/">
                <img src="/images/logo.png" alt="logo" width="100">
            </a>
        </div>

        @auth
            <form action="/logout" method="post">
                @csrf
                <button type="submit" data-test="logout-button">Logout</button>
            </form>
        @else
            <div class="flex gap-x-5 items-center">
                <a href="/login">Login</a>
                <a href="/register" class="btn">Get Started</a>
            </div>
        @endauth
    </div>
</nav>
