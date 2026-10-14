<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Laravel Site</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
    <nav class="bg-blue-600 text-white">
        <div class="max-w-3xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="font-bold text-lg">My Laravel Site</a>
            <div class="flex items-center gap-6">
                <a href="/about" class="hover:underline">About</a>
                <a href="/contact" class="hover:underline">Contact</a>

                @auth
                    <span class="text-blue-100">Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="bg-white text-blue-600 px-3 py-1 rounded-md hover:bg-blue-50">
                            Log out
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="/login" class="hover:underline">Log in</a>
                    <a href="/register" class="bg-white text-blue-600 px-3 py-1 rounded-md hover:bg-blue-50">
                        Register
                    </a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 py-8">
        {{ $slot }}
    </main>
</body>

</html>