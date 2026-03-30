<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Uter-Us') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-pink-50 min-h-screen flex items-center justify-center">

    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-10 text-center mx-4">

        <h1 class="text-5xl font-extrabold text-pink-600 mb-4 tracking-tight">
            {{ config('app.name', 'Uter-Us') }}
        </h1>
        <p class="text-gray-500 mb-8 text-lg">Your personal, secure, and simple cycle tracker.</p>

        @if (Route::has('login'))
            <div class="space-y-4">
                @auth
                    <a href="{{ route('periods.index') }}"
                        class="block w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-4 rounded-lg shadow transition duration-150 ease-in-out">
                        Go to My Tracker
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="block w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-3 px-4 rounded-lg shadow transition duration-150 ease-in-out">
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="block w-full bg-white hover:bg-pink-50 text-pink-600 font-bold py-3 px-4 border border-pink-200 rounded-lg transition duration-150 ease-in-out">
                            Create an Account
                        </a>
                    @endif
                @endauth
            </div>
        @endif

    </div>

</body>

</html>