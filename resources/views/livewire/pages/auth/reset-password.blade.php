<div class="min-h-screen flex items-center justify-center px-4 bg-gray-100 dark:bg-gray-900">
    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl w-full max-w-md p-8 space-y-6">
        <div class="text-center space-y-2">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Reset Password</h1>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Enter your new password below.
            </p>
        </div>

        {{-- Global message banner --}}
        @if ($formMessage)
            <div @class([
                'w-full flex items-center gap-2 px-4 py-3 rounded',
                'text-green-700 bg-green-100 dark:bg-green-500/20 dark:text-green-300' => $messageType === 'success',
                'text-red-700 bg-red-100 dark:bg-red-500/20 dark:text-red-300' => $messageType === 'error',
            ])>
                <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    @if ($messageType === 'success')
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    @else
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01M12 5a7 7 0 110 14 7 7 0 010-14z" />
                    @endif
                </svg>
                <span>{{ $formMessage }}</span>
            </div>
        @endif

        {{-- Livewire form --}}
        <form wire:submit.prevent="resetPassword" class="space-y-5" wire:target="resetPassword" wire:loading.class="opacity-60">
            {{-- Hidden fields --}}
            <input type="hidden" wire:model="token">
            
            {{-- Email field (readonly) --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    Email address
                </label>
                <input id="email" type="email" wire:model.defer="email" autocomplete="username"
                    readonly @class([
                        'mt-1 w-full px-4 py-2 rounded-md shadow-sm bg-gray-50 dark:bg-gray-600',
                        'border-gray-300 dark:text-gray-300 dark:border-gray-600' => !$errors->has('email'),
                        'border-red-600 dark:border-red-600' => $errors->has('email'),
                    ]) />
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            {{-- New Password field --}}
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    New Password
                </label>
                <input id="password" type="password" wire:model.defer="password" autocomplete="new-password"
                    placeholder="••••••••" @class([
                        'mt-1 w-full px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2',
                        'border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600' => !$errors->has('password'),
                        'border-red-600 focus:ring-red-600 dark:bg-gray-700 dark:text-white dark:border-red-600' => $errors->has('password'),
                    ]) />
                @error('password')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
                <div class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                    Password must be at least 8 characters long.
                </div>
            </div>

            {{-- Confirm Password field --}}
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                    Confirm New Password
                </label>
                <input id="password_confirmation" type="password" wire:model.defer="password_confirmation" 
                    autocomplete="new-password" placeholder="••••••••" @class([
                        'mt-1 w-full px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2',
                        'border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600' => !$errors->has('password_confirmation'),
                        'border-red-600 focus:ring-red-600 dark:bg-gray-700 dark:text-white dark:border-red-600' => $errors->has('password_confirmation'),
                    ]) />
                @error('password_confirmation')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            {{-- Submit button --}}
            <button type="submit"
                class="w-full flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4
                       rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition"
                wire:loading.attr="disabled" wire:target="resetPassword">
                <span>Reset Password</span>
                <svg wire:loading wire:target="resetPassword" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"
                        class="opacity-25" />
                    <path d="M4 12a8 8 0 018-8" stroke="currentColor" stroke-width="4" class="opacity-75" />
                </svg>
            </button>
        </form>

        {{-- Back to login link --}}
        <div class="pt-4 text-center">
            <p class="text-sm text-gray-700 dark:text-gray-300">
                Remember your password?
                <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 hover:underline font-medium">
                    Back to Sign In
                </a>
            </p>
        </div>
    </div>

    {{-- Auto-redirect script for successful password reset --}}
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('redirect-to-login', () => {
                setTimeout(() => {
                    window.location.href = "{{ route('login') }}";
                }, 3000); // Redirect after 3 seconds
            });
        });
    </script>
</div>
