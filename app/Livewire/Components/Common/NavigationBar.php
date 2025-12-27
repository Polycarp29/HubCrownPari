<?php

namespace App\Livewire\Components\Common;

use App\Services\UserAccess\UserTypesController;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NavigationBar extends Component
{
    public $userData;
    public $initials;
    public function mount()
    {
        $this->userData = Auth::user();
        $this->initials = $this->usernameInitials();
    }

    protected function usernameInitials()
    {
        $user = $this->userData;
        $parts = explode(' ', $user->name);
        $initials = '';


        if (count($parts) >= 2) {
            $initials = strtoupper(substr($parts[0], 0, 1) . substr($parts[1], 0, 1));
        } else {
            $initials = strtoupper(substr($user->name, 0, 1));
        }


        return $initials;
    }

    public function render()
    {
        return view('livewire.components.common.navigation-bar');
    }
}
