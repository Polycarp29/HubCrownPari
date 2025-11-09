<div class="min-h-screen dark:bg-gray-900 bg-gray-50 flex justify-center items-center">
    <div class="min-w-2xl mx-auto bg-gray-800 p-12 rounded-lg">
        <h1 class="text-3xl font-bold text-center text-gray-800 dark:text-white">Let's verify it's you</h1>
        <p class="text-sm text-center text-gray-600 dark:text-gray-400">
            We have sent a One Time Verification code to your email address
        </p>
        
        <div>
            <form wire:submit="verifyOtp" class="space-y-5">
                <div x-data="{ show: false }">
                    <label for="otp" class="block text-lg font-bold text-gray-700 dark:text-gray-200 text-center p-6">
                        Verify OTP
                    </label>

                    <div class="relative">
                        <input 
                            :type="show ? 'text' : 'password'" 
                            id="otp" 
                            wire:model.defer="otp"
                            autocomplete="off" 
                            placeholder="••••••••" 
                            maxlength="6"
                            @class([
                                'w-full px-4 py-2 rounded-md shadow-sm focus:outline-none focus:ring-2 pr-10',
                                'border-gray-300 focus:ring-blue-500 dark:bg-gray-700 dark:text-white dark:border-gray-600' => !$errors->has('otp'),
                                'border-red-600 focus:ring-red-600 dark:bg-gray-700 dark:text-white dark:border-red-600' => $errors->has('otp'),
                            ]) 
                        />

                        <!-- Toggle Visibility Button -->
                        <button 
                            type="button" 
                            @click="show = !show"
                            :aria-label="show ? 'Hide OTP' : 'Show OTP'"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition">
                            
                            <!-- Eye (OTP visible) -->
                            <svg x-show="show" x-transition.opacity xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>

                            <!-- Eye-slash (OTP hidden) -->
                            <svg x-show="!show" x-transition.opacity xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>

                    @error('otp')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4 p-5">
                    <!-- Verify OTP -->
                    <button 
                        type="submit"
                        class="w-full flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition disabled:opacity-50 disabled:cursor-not-allowed"
                        wire:loading.attr="disabled" 
                        wire:target="verifyOtp">
                        <span wire:loading.remove wire:target="verifyOtp">Verify OTP</span>
                        <span wire:loading wire:target="verifyOtp">Verifying...</span>
                        <svg wire:loading wire:target="verifyOtp" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25" />
                            <path d="M4 12a8 8 0 018-8" stroke="currentColor" stroke-width="4" class="opacity-75" />
                        </svg>
                    </button>

                    <!-- Resend OTP -->
                    <button 
                        type="button"
                        class="w-full flex justify-center items-center gap-2 bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition disabled:opacity-50 disabled:cursor-not-allowed"
                        wire:click="resendOTP" 
                        wire:loading.attr="disabled" 
                        wire:target="resendOTP">
                        <span wire:loading.remove wire:target="resendOTP">Resend OTP</span>
                        <span wire:loading wire:target="resendOTP">Sending...</span>
                        <svg wire:loading wire:target="resendOTP" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25" />
                            <path d="M4 12a8 8 0 018-8" stroke="currentColor" stroke-width="4" class="opacity-75" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>