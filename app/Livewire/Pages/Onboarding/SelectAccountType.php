<?php

namespace App\Livewire\Pages\Onboarding;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Defaults\UserTypes;
use Illuminate\Support\Facades\Auth;
use App\Services\UserAccess\GenerateOtp;

class SelectAccountType extends Component
{
    #[Layout('components.layouts.app')]

    public $userType, $user;

    public $selectedType;

    public function mount()
    {
        $this->user = Auth::user();

        if (!$this->user) {
            $this->dispatch('toast', message: 'User is not authenticated', type: 'error');
            return redirect()->to('/');
        }

        // fetch all userTypes

        $this->fetchUserTypes();
    }

    public function fetchUserTypes()
    {
        $this->userType = UserTypes::get();
    }


    // Action for the user to selected there types


    public function selectTypeProcess($id)
    {
        $this->selectedType = $id;


        if (!$this->selectedType) {
            return $this->dispatch('toast', message: 'Account type  has not been selected', type: 'error');
        }

        // proceed if the account type has been selected

        $this->user->usertypes()->sync([$id]);

        // display success message 

        $this->dispatch('toast', message: 'Account type has been saved', type: 'success');
    }


    public function proceedToNext()
    {
        if (!$this->selectedType) {
            return $this->dispatch('toast', message: 'Please select an account type', type: 'warning');
        }

        // Generate OTP using the service
        $otpService = new GenerateOtp();
        $otp = $otpService->handle($this->user->id);

        if (!$otp) {
            return $this->dispatch('toast', message: 'Unable to send OTP', type: 'error');
        }

        $this->dispatch('toast', message: 'OTP verification code has been sent to your email', type: 'success');

        // Use redirectRoute instead of redirect()->to()
        return $this->redirectRoute('otp.verify', navigate: true);
    }


    public function render()
    {
        return view('livewire.pages.onboarding.select-account-type');
    }
}
