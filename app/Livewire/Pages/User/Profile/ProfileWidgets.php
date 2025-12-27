<?php

namespace App\Livewire\Pages\User\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\User\Profiles\UserProfile;

class ProfileWidgets extends Component
{
    use WithFileUploads;

    public $avatar;
    public $avatarPath;
    public $user;
    public $defaultAvatar;
    public $profileData;

    public function mount(){
        $this->user = Auth::user();
        if(!$this->user){
            return abort(403);
        }

        $this->defaultAvatar = asset('assets/defaults/user_8742495.png');


        $profile = UserProfile::firstWhere('user_id', $this->user->id);

        $this->profileData = $profile;

        $this->avatarPath = $profile?->profile_avatar;

    }


    public function updatedAvatar(){
        $this->validate([
            'avatar' => 'image|max:2048',
        ]);

        $path = $this->avatar->store('avatars', 'public');

        UserProfile::updateOrCreate(
            ['user_id'        => $this->user->id],
            ['profile_avatar' => $path]
        );

        $this->dispatch('toast', message:'Avatar updated successfully', type:'success');

    }



    #[Layout('components.layouts.dashboard')]
    public function render()
    {
        return view('livewire.pages.user.profile.profile-widgets');
    }
}
