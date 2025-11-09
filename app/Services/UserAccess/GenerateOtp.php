<?php

namespace App\Services\UserAccess;

use App\Models\User;
use App\Mail\AccountVerificationOTP;
use Illuminate\Support\Facades\Mail;

class GenerateOtp
{
    public function handle($userId)
    {
        if (!$userId) {
            return null;
        }

        $otp = $this->generateRandomOTP();

        $this->saveOTP($otp, $userId);

        return $otp;
    }

    protected function generateRandomOTP($length = 6)
    {
        $letters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz';
        $numbers = '23456789';

        $otp = $letters[random_int(0, strlen($letters) - 1)];
        $otp .= $numbers[random_int(0, strlen($numbers) - 1)];

        $pool = $letters . $numbers;

        for ($x = 2; $x < $length; $x++) {
            $otp .= $pool[random_int(0, strlen($pool) - 1)];
        }

        return str_shuffle($otp);
    }

    protected function saveOTP($otp, $userId)
    {
        $now = now();
        $user = User::find($userId);

        if (!$user) {
            return;
        }

        $user->update([
            'otp'              => $otp,
            'otp_expires_at'   => $now->copy()->addMinutes(10),
            'last_otp_sent_at' => $now,
        ]);

        Mail::to($user->email)->send(new AccountVerificationOTP($user));
    }
}
