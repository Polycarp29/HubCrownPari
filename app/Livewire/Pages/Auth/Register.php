<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    #[Layout('components.layouts.app')]
    protected $rules = [
        'name' => 'required|string|min:4|max:20|alpha_num|unique:users,name',
        'email' => 'required|email|unique:users,email',
        'password' => [
            'required',
            'string',
            'min:8',
            'confirmed',
            'regex:/[a-z]/',         // at least one lowercase
            'regex:/[A-Z]/',         // at least one uppercase
            'regex:/[0-9]/',         // at least one number
            'regex:/[@$!%*#?&]/',    // at least one special character
        ],
    ];

    protected $messages = [
        'name.required' => 'Username is required.',
        'name.min' => 'Username must be at least 4 characters.',
        'name.max' => 'Username may not be greater than 20 characters.',
        'name.alpha_num' => 'Username may only contain letters and numbers.',
        'name.unique' => 'This username is already taken.',

        'email.required' => 'Email is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already in use.',

        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 8 characters.',
        'password.confirmed' => 'Passwords do not match.',
        'password.regex' => 'Password must include at least one uppercase, one lowercase, one number, and one special character.',

        'password_confirmation.required' => 'Please confirm your password.',
    ];

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        // Sanitize name and email
        $validatedData['name'] = strip_tags($validatedData['name']);
        $validatedData['email'] = strip_tags($validatedData['email']);

        // Create the user with hashed password
       $user =  User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'is_owner' => true,
            'registered_from' => 'web',
        ]);

        // Reset fields after success
        $this->reset(['name', 'email', 'password', 'password_confirmation']);

        $this->dispatch('toast', message:'You have been successfully registered. You will be redirected shortly ...', type: 'success');

        //Temporary Login

        Auth::login($user);

        // Redirect to another page
        // $this->dispatch('redirect');

        return redirect()->to('/onboarding');


    }
    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}
