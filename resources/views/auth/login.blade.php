<x-guest-layout>

    <div class="text-center mb-4">
    <h1 class="text-4xl font-bold">
        🚜 TREK
    </h1>
</div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-input-label for="password" :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">

                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember">

                <span class="ms-2 text-sm text-gray-600">
                    Remember Me
                </span>

            </label>
        </div>

        <!-- Login -->
       <div class="mt-6">

    <x-primary-button class="w-full justify-center">
        LOGIN
    </x-primary-button>

</div>

        <!-- Register -->
        <div class="text-center mt-6">

            <span class="text-gray-600">
                Belum punya akun?
            </span>

            <a href="{{ route('register') }}"
               class="font-semibold text-indigo-600 hover:text-indigo-800">

                Register

            </a>

        </div>

    </form>

</x-guest-layout>