<?php

namespace App\Livewire\Pages\Auth;

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
        $this->formError = null;   // reset global error each submit

        try {

            $credentials = $this->validate();


            $key = 'login:' . strtolower($this->email) . '|' . request()->ip();
            if (RateLimiter::tooManyAttempts($key, 5)) {
                $seconds = RateLimiter::availableIn($key);
                throw new ThrottleRequestsException("Too many attempts. Try again in {$seconds} s.");
            }


            if (! Auth::attempt($credentials, $this->remember)) {
                RateLimiter::hit($key, 60);
                throw ValidationException::withMessages([
                    'email' => __('These credentials are incorrect.'),
                ]);
            }

            RateLimiter::clear($key);
            session()->regenerate();
            
            // If remember me is checked, the Auth::attempt already handles the remember token
            if ($this->remember) {
                // Laravel's Auth::attempt with remember=true automatically handles the remember token
                // The remember cookie will last for 5 years as configured in auth config
                session()->put('auth.password_confirmed_at', time());
            }

            $this->dispatch('toast', message: 'Logged in successfully!', type: 'success');

            $this->redirect(route('dashboard'), navigate: true);

        } catch (ValidationException $e) {

            throw $e;               // re‑throw so the inline messages show

        } catch (ThrottleRequestsException $e) {
            /** Throttle → global banner + toast*/
            $this->formError = $e->getMessage();
            $this->dispatch('toast', message: $e->getMessage(), type: 'error');

        } catch (\Throwable $e) {
            /**  Catch‑all */
            report($e);             // log it
            $msg = 'Unexpected error, please try again.';
            $this->formError = $msg;
            $this->dispatch('toast', message: $msg, type: 'error');
        }
    }
    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
