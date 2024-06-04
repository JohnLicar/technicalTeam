<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }
}; ?>

<div>
    <div class="hidden lg:block">
        <div class="mb-4">
            <img aria-hidden="true" class="object-cover mx-auto block mb-12 md:mb-0 sm:max-w-[60%] lg:w-6/12 "
                src="{{ asset('images/Logo.png') }}" alt="Office" />
            <p class="text-4xl font-medium text-white mt-7 sm:text-center">
                Welcome Back
            </p>
            <p class="text-white sm:text-center">
                Please log-in your account to proceed.
            </p>
        </div>

    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div x-data="{ show: true }" x-show.transition.opacity.out.duration.2000ms="show">
        <x-approval />
    </div>

    <form wire:submit="login">
        <!-- Email Address -->
        <div class="mt-4">
            <x-input.floating wire:model="form.email" for="email" class="text-white border-gray-100"
                :value="__('Email')" :name="'email'" :id="'email'" :type="'email'" :bg="'cool-gray-500'" :text="'white'"
                :peer_text="'text-white'" required autofocus autocomplete="username" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input.floating wire:model="form.password" for="password" class="text-white border-gray-100"
                :value="__('Password')" :name="'password'" :id="'password'" :type="'password'" :bg="'cool-gray-500'"
                :text="'white'" :peer_text="'text-white'" required autofocus autocomplete="current-password" />

        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-4 ">
            <div class="block">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox"
                        class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="text-sm text-gray-100 ms-2">{{ __('Remember me') }}</span>
                </label>
            </div>

            @if (Route::has('password.request'))
            <a class="text-sm text-gray-100 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('password.request') }}" wire:navigate>
                {{ __('Forgot your password?') }}
            </a>
            @endif
        </div>
        <div class="flex items-center justify-end mt-4">

            <x-button.text class="mr-2 text-sm text-gray-100 hover:text-gray-900" isLink href="{{ route('register') }}">
                {{ __('Register') }}
            </x-button.text>

            <x-button.solid class="ms-3" class="flex items-center justify-center bg-blue-500 hover:bg-blue-300">
                {{ __('Log in') }}
            </x-button.solid>
        </div>
    </form>
</div>