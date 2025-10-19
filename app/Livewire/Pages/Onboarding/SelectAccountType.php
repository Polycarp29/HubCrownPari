<?php

namespace App\Livewire\Pages\Onboarding;

use Livewire\Component;
use Livewire\Attributes\Layout;

class SelectAccountType extends Component
{
    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.pages.onboarding.select-account-type');
    }
}
