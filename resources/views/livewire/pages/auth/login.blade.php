<div class="min-h-screen flex items-center justify-center px-4 bg-gray-100 dark:bg-gray-950">
    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl w-full max-w-md p-8 space-y-6">
        <h1 class="text-3xl font-bold text-center text-gray-800 dark:text-white">Welcome back</h1>
        <p class="text-sm text-center text-gray-600 dark:text-gray-400">Sign in to continue</p>

        {{-- Global error banner --}}
        @if ($formError)
            <div
                class="w-full flex items-center gap-2 text-red-700 bg-red-100 dark:bg-red-500/20 dark:text-red-300 px-4 py-3 rounded">
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01M12 5a7 7 0 110 14 7 7 0 010-14z" />
                </svg>
                <span>{{ $formError }}</span>
            </div>
        @endif

        {{--  Livewire form --}}
        <form wire:submit.prevent="login" class="space-y-5" wire:target="login" wire:loading.class="opacity-60">
            {{-- Email field --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email
                    address</label>
                <input id="email" type="email" wire:model.defer="email" autocomplete="username"
                    placeholder="you@example.com" @class([
                        'mt-1 w-full px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2',
                        'border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600' => !$errors->has(
                            'email'),
                        'border-red-600 focus:ring-red-600 dark:bg-gray-700 dark:text-white dark:border-red-600' => $errors->has(
                            'email'),
                    ]) />
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password field --}}
            <div x-data="{ show: false }">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    Password
                </label>

                <div class="relative">
                    <input :type="show ? 'text' : 'password'" id="password" wire:model.defer="password"
                        autocomplete="current-password" placeholder="••••••••" @class([
                            'w-full px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 pr-10', // added pr-10 for icon spacing
                            'border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600' => !$errors->has(
                                'password'),
                            'border-red-600 focus:ring-red-600 dark:bg-gray-700 dark:text-white dark:border-red-600' => $errors->has(
                                'password'),
                        ]) />

                    <!-- Toggle Visibility Button -->
                    <button type="button" @click="show = !show" :aria-label="show ? 'Hide password' : 'Show password'"
                        class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition">

                        <!-- Eye (password hidden) -->
                        <svg x-show="show" x-transition.opacity xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.5c-7 0-10 7.5-10 7.5s3 7.5 10 7.5 10-7.5 10-7.5-3-7.5-10-7.5z" />
                            <circle cx="12" cy="12" r="3" stroke-width="2" stroke="currentColor"
                                fill="none" />
                        </svg>

                        <!-- Eye-slash (password visible) -->
                        <svg x-show="!show" x-transition.opacity xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3l18 18m-4.2-4.2A9.94 9.94 0 0112 19.5C5 19.5 2 12 2 12s3-7.5 10-7.5c1.47 0 2.85.26 4.08.74M9.88 9.88A3 3 0 0115 12c0 .59-.17 1.14-.47 1.61" />
                        </svg>
                    </button>
                </div>

                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>



            {{-- Remember + Forgot --}}
            <div class="flex items-center justify-between">
                <label class="inline-flex items-center text-sm text-gray-700 dark:text-gray-300">
                    <input type="checkbox" wire:model="remember"
                        class="form-checkbox text-blue-600 dark:bg-gray-800 dark:border-gray-600" />
                    <span class="ml-2">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}"
                    class="text-sm text-blue-600 hover:underline dark:text-blue-400">Forgot password?</a>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4
                           rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition"
                wire:loading.attr="disabled" wire:target="login">
                <span>Sign in</span>
                <svg wire:loading wire:target="login" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"
                        class="opacity-25" />
                    <path d="M4 12a8 8 0 018-8" stroke="currentColor" stroke-width="4" class="opacity-75" />
                </svg>
            </button>
        </form>

        {{-- Social login / Register untouched --}}
        @livewire('components.common.social-logins')
        <p class="pt-4 text-center text-sm text-gray-700 dark:text-gray-300">
            New here?
            <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Create an
                account</a>
        </p>
    </div>
</div>
