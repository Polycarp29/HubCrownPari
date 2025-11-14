<?php

namespace App\Livewire\Pages\Auth;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class Login extends Component
{

    public string $email    = '';
    public string $password = '';
    public bool   $remember = false;

    /**  Field rules */
    protected function rules(): array
    {
        return [
            'email'    => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
        ];
    }

    /** Global error holder */
    public ?string $formError = null;

    #[Layout('components.layouts.app')]


    public function login(): void
    {
        $this->formError = null;

        try {
            $credentials = $this->validate();

            $key = 'login:' . strtolower($this->email) . '|' . request()->ip();
            if (RateLimiter::tooManyAttempts($key, 5)) {
                $seconds = RateLimiter::availableIn($key);
                throw new ThrottleRequestsException("Too many attempts. Try again in {$seconds} s.");
            }

            if (! Auth::attempt($credentials, $this->remember)) {
                RateLimiter::hit($key, 60);
                throw ValidationException::withMessages([
                    'email' => __('These credentials are incorrect.'),
                ]);
            }

            RateLimiter::clear($key);
            session()->regenerate();

            $user = Auth::user();

            // Remove the print statement!
            Log::info('Auth user logged in', ['user_id' => $user->id, 'email' => $user->email]);

            $this->dispatch('toast', message: 'Logged in successfully!', type: 'success');

            $this->redirectRoute($this->getDashboardRoute($user), navigate: true);
        } catch (ValidationException $e) {
            throw $e;
        } catch (ThrottleRequestsException $e) {
            $this->formError = $e->getMessage();
            $this->dispatch('toast', message: $e->getMessage(), type: 'error');
        } catch (\Throwable $e) {
            report($e);
            $msg = 'Unexpected error, please try again.';
            $this->formError = $msg;
            $this->dispatch('toast', message: $msg, type: 'error');
        }
    }


    protected function getDashboardRoute($user): string
    {
        // Refresh the user to ensure relationships are loaded
        $user->refresh();

        Log::info('User data', [
            'id' => $user->id,
            'usertypes_count' => $user->usertypes->count(),
            'usertypes' => $user->usertypes->toArray(),
        ]);

        $userType = $user->usertypes->first()?->user_type_name ?? null;

        Log::info('Determined user type', ['type' => $userType]);

        return match ($userType) {
            'Affiliates' => 'affiliates.dashboard',
            'Creators' => 'creators.dashboard',
            'Organizations' => 'organization.dashboard',
            'Admin' => 'admin.dashboard',
            default => 'affiliates.dashboard', // Change default to a valid route
        };
    }
    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
