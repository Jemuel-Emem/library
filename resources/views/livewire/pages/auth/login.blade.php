<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    // Add a property to track the password visibility
    public bool $showPassword = false;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }

    /**
     * Toggle the password visibility.
     */
    public function togglePasswordVisibility(): void
    {
        $this->showPassword = !$this->showPassword;
    }
};
?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit.prevent="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full"
                              :type="$showPassword ? 'text' : 'password'"
                              name="password"
                              required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />

                <!-- Show/Hide Password Button -->
                <button type="button" wire:click="togglePasswordVisibility" class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                    <svg class="h-5 w-5 text-gray-500" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor">
                        @if($showPassword)
                            <!-- Eye icon (visible password) -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-.328 1.041-.768 2.032-1.313 2.938a10.042 10.042 0 01-9.456 5.062A10.042 10.042 0 013.771 14.938c-.545-.906-.985-1.897-1.313-2.938z" />
                        @else
                            <!-- Eye-off icon (hidden password) -->
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A3 3 0 0112 19a3 3 0 01-3-3 3 3 0 01.175-1.125M12 5a7 7 0 011 13.982M9.5 9.5l5 5m-5 0l5-5" />
                        @endif
                    </svg>
                </button>
            </div>
        </div>



        <div class="flex items-center justify-between mt-4">
            <span><a href="{{route('register')}}">Don't have an account?</a></span>
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>
