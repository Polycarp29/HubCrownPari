<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;
use App\Mail\AccountVerificationOTP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VerifyOTP extends Component
{
    #[Layout('components.layouts.app')]

    public string $otp = "";
    public User $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    /** Validation rules */
    protected function rules(): array
    {
        return [
            'otp' => ['required', 'alpha_num', 'size:6'],
        ];
    }

    public function verifyOtp()
    {
        $this->validate();

        $user = User::query()
            ->where('id', $this->user->id)
            ->where('otp', $this->otp)
            ->where('otp_expires_at', '>=', now())
            ->first();

        if (!$user) {
            $this->addError('otp', 'Invalid or expired OTP.');
            return;
        }

        $user->update([
            'is_verified'    => true,
            'otp'            => null,
            'otp_expires_at' => null,
        ]);

        // Refresh the session
        Auth::login($user);

        $this->dispatch('toast', message: 'Verification successful! Redirecting...', type: 'success');

        // Use redirect without return for Livewire
        $this->redirectRoute($this->getDashboardRoute($user), navigate: true);
    }

    public function resendOTP(): void
    {
        $now = now();
        $user = $this->user->fresh(); // Get fresh instance from DB

        // Check if 5 minutes (300s) cooldown has passed
        if ($user->last_otp_sent_at && $user->last_otp_sent_at->diffInSeconds($now) < 300) {
            $remainingSeconds = 300 - $user->last_otp_sent_at->diffInSeconds($now);
            $this->dispatch('toast', 
                message: "Please wait {$remainingSeconds} seconds before requesting a new OTP.", 
                type: 'warning'
            );
            return;
        }

        // Generate and update OTP
        $otp = $this->generateSecureOtp();

        $user->update([
            'otp'              => $otp,
            'otp_expires_at'   => $now->copy()->addMinutes(10), // Consistent 10 minutes
            'last_otp_sent_at' => $now,
        ]);

        // Refresh the user instance
        $this->user = $user->fresh();

        // Send the OTP email
        try {
            Mail::to($user->email)->send(new AccountVerificationOTP($user));
            $this->dispatch('toast', message: 'New OTP has been sent to your email', type: 'success');
        } catch (\Exception $e) {
            Log::error('Failed to send OTP email: ' . $e->getMessage());
            $this->dispatch('toast', message: 'Failed to send OTP. Please try again.', type: 'error');
        }
    }

    public function generateSecureOtp(int $length = 6): string
    {
        $letters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz';
        $numbers = '23456789';

        // Ensure at least 1 letter and 1 number
        $otp = $letters[random_int(0, strlen($letters) - 1)];
        $otp .= $numbers[random_int(0, strlen($numbers) - 1)];

        $pool = $letters . $numbers;

        for ($x = 2; $x < $length; $x++) {
            $otp .= $pool[random_int(0, strlen($pool) - 1)];
        }

        return str_shuffle($otp);
    }

    protected function getDashboardRoute($user): string
    {
        $userType = $user->usertypes->first()?->user_type_name ?? null;

        Log::info('User type: ' . $userType);

        return match($userType) {
            'Affiliates' => 'affiliates.dashboard',
            'Creators' => 'creators.dashboard',
            'Organizations' => 'organization.dashboard',
            'Admin' => 'admin.dashboard',
            default => 'admin.dashboard',
        };
    }

    public function render()
    {
        return view('livewire.pages.auth.verify-o-t-p');
    }
}