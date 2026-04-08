<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input id="email" type="email" name="email" required autofocus autocomplete="username"
                value="{{ old('email') }}"
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                class="w-full rounded-lg border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500 text-sm">
            @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember"
                    class="rounded border-gray-300 text-pink-600 shadow-sm focus:ring-pink-500">
                Remember me
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                    class="text-sm text-pink-600 hover:text-pink-800 hover:underline">
                    Forgot password?
                </a>
            @endif
        </div>

        <button type="submit"
            class="w-full bg-pink-600 hover:bg-pink-700 text-white font-semibold py-2.5 rounded-lg shadow-sm transition text-sm">
            Log in
        </button>

        @if (Route::has('register'))
            <p class="text-center text-sm text-gray-500">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-pink-600 hover:underline font-medium">Create one</a>
            </p>
        @endif
    </form>
</x-guest-layout>
