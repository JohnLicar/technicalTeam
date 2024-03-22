<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="border-b border-gray-100 bg-cool-gray-500">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 bg-">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <div class="flex flex-col items-center justify-center w-full">

                            <img src="{{ asset('images/Logo.png') }}" class="w-10 h-10" alt="">

                            <p class="text-white">Technical Division IS</p>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link class="text-white" :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                        wire:navigate>
                        {{'Dashboard' }}
                    </x-nav-link>
                </div>

                @if(auth()->user()->can('view applicant') || auth()->user()->hasRole('admin'))
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link class="text-white" :href="route('validation.index')"
                        :active="request()->routeIs('validation.*')" wire:navigate>
                        {{ 'Validation' }}
                    </x-nav-link>
                </div>
                @endif

                @hasanyrole('social_prep|admin')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link class="text-white" :href="route('social_prep.index')"
                        :active="request()->routeIs('social_prep.*')" wire:navigate>
                        {{ 'Social Prep' }}
                    </x-nav-link>
                </div>
                @endrole

                @if(auth()->user()->can('view user') || auth()->user()->hasRole('admin'))
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link class="text-white" :href="route('users.index')" :active="request()->routeIs('users.*')"
                        wire:navigate>
                        {{ 'Users' }}
                    </x-nav-link>
                </div>
                @endif

                @hasrole('admin')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link class="text-white" :href="route('system.index')"
                        :active="request()->routeIs('system.*')" wire:navigate>
                        {{ 'System Config' }}
                    </x-nav-link>
                </div>
                @endrole
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 ">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out border border-transparent rounded-md bg-cool-gray-500 hover:text-teal-300 focus:outline-none">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                x-on:profile-updated.window="name = $event.detail.name"></div>

                            <div class="ms-1">
                                @if (!auth()->user()->avatar)
                                <img src="{{ asset('images/Logo.png') }}"
                                    class="w-10 mx-2 rounded-full cursor-pointer h-w-10" aria-label="Account" />
                                @else
                                <img src="{{ asset('images/profile/'. auth()->user()->avatar) }}"
                                    class="w-10 mx-2 rounded-full cursor-pointer h-w-10" aria-label="Account" />
                                @endif
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                {{ 'Dashboard' }}
            </x-responsive-nav-link>
        </div>

        @if(auth()->user()->can('view applicant') || auth()->user()->hasRole('admin'))
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('validation.index')" :active="request()->routeIs('validation.*')"
                wire:navigate>
                {{ 'Validation' }}
            </x-responsive-nav-link>
        </div>
        @endif

        @hasanyrole('social_prep|admin')
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('social_prep.index')" :active="request()->routeIs('social_prep.*')"
                wire:navigate>
                {{ 'Social Prep' }}
            </x-responsive-nav-link>
        </div>
        @endhasanyrole()

        @if(auth()->user()->can('view user') || auth()->user()->hasRole('admin'))
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')" wire:navigate>
                {{ 'Users' }}
            </x-responsive-nav-link>
        </div>
        @endif

        @hasrole('admin')
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('system.index')" :active="request()->routeIs('system.*')" wire:navigate>
                {{ 'System Config' }}
            </x-responsive-nav-link>
        </div>
        @endrole

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800"
                    x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                    x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="text-sm font-medium text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>