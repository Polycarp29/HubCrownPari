<div class="min-h-screen flex justify-center items-center px-4 bg-gray-950">
    <!--End Notification -->
    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg w-full max-w-md p-6">
        <h1 class="text-3xl font-semibold text-center text-gray-800 dark:text-gray-100 mb-6">Register</h1>

        <!-- Form -->
        <form wire:submit.prevent="submit" class="space-y-5">
            <!--Username-->
            <div>
                <label for="name"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Username</label>
                <input type="text" name="name" id="name" wire:model="name" required placeholder="johndoe"
                    @error('name')
                        class="w-full px-4 py-2 border border-red-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 dark:bg-gray-700 dark:text-white dark:border-red-600"
                    @enderror
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                @error('name')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <!-- Email -->
            <div>
                <label for="email"
                    class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">Email</label>
                <input type="email" name="email" id="email" wire:model="email" required
                    @error('email')
                class="w-full px-4 py-2 border border-red-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-600 dark:bg-gray-700 dark:text-white dark:border-red-600"
            @enderror
                    placeholder="you@example.com"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600" />
                @error('email')
                    <span class="text-red-600 text-sm">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div x-data="{ showPassword: false, showConfirm: false }" class="space-y-4">

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Password
                    </label>

                    <div class="relative">
                        <input :type="showPassword ? 'text' : 'password'" name="password" id="password"
                            wire:model="password" required placeholder="••••••••"
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2
                    dark:bg-gray-700 dark:text-white
                    @error('password') border-red-600 focus:ring-red-600 dark:border-red-600 @else border-gray-300 focus:ring-blue-500 dark:border-gray-600 @enderror" />

                        <!-- Toggle Eye Icon -->
                        <button type="button" @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.27-2.943-9.543-7a10.056 10.056 0 013.08-4.592m2.48-1.516A9.955 9.955 0 0112 5c4.478 0 8.27 2.943 9.543 7a10.056 10.056 0 01-3.08 4.592M3 3l18 18" />
                            </svg>
                        </button>
                    </div>

                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-1">
                        Confirm Password
                    </label>

                    <div class="relative">
                        <input :type="showConfirm ? 'text' : 'password'" name="password_confirmation"
                            id="password_confirmation" wire:model="password_confirmation" required
                            placeholder="••••••••"
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2
                    dark:bg-gray-700 dark:text-white
                    @error('password_confirmation') border-red-600 focus:ring-red-600 dark:border-red-600 @else border-gray-300 focus:ring-blue-500 dark:border-gray-600 @enderror" />

                        <!-- Toggle Eye Icon -->
                        <button type="button" @click="showConfirm = !showConfirm"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                            <svg x-show="showConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="!showConfirm" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.27-2.943-9.543-7a10.056 10.056 0 013.08-4.592m2.48-1.516A9.955 9.955 0 0112 5c4.478 0 8.27 2.943 9.543 7a10.056 10.056 0 01-3.08 4.592M3 3l18 18" />
                            </svg>
                        </button>
                    </div>

                    @error('password_confirmation')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <!-- Submit Button -->
            <button type="submit"
                class="w-full flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4
                           rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition"
                wire:loading.attr="disabled" wire:target="submit">
                <span>Sign Up</span>
                <svg wire:loading wire:target="submit" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"
                        class="opacity-25" />
                    <path d="M4 12a8 8 0 018-8" stroke="currentColor" stroke-width="4" class="opacity-75" />
                </svg>
            </button>
            <div class="flex flex-row justify-between">
                <p class="dark:text-gray-200 text-gray-700">Already have an account?</p>
                <a class="text-blue-600 hover:underline">Sign in</a>
            </div>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
            <span class="mx-4 text-sm text-gray-500 dark:text-gray-400">OR</span>
            <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
        </div>

        <!-- Social Sign-In -->
        <div class="space-y-3">
            <!-- Google -->
            <a href="/auth/google"
                class="w-full flex items-center justify-center bg-white border border-gray-300 rounded-md py-2 hover:bg-gray-100 transition dark:bg-gray-700 dark:border-gray-600 dark:hover:bg-gray-600">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                    class="w-5 h-5 mr-2" />
                <span class="text-sm font-medium text-gray-700 dark:text-white">Sign up with Google</span>
            </a>

            <!-- LinkedIn -->
            <a href="/auth/linkedin"
                class="w-full flex items-center justify-center bg-[#0077B5] text-white rounded-md py-2 hover:bg-[#005983] transition">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M19 0h-14c-2.761...Z" /> <!-- LinkedIn logo path trimmed for brevity -->
                </svg>
                <span class="text-sm font-medium">Sign up with LinkedIn</span>
            </a>
        </div>

        <!-- Forgot Password -->
        <div class="mt-4 text-center text-sm text-gray-600 dark:text-gray-400">
            <a href="/forgot-password" class="hover:underline">Forgot your password?</a>
        </div>
    </div>
</div>
