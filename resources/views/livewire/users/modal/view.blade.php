{{-- <div class="py-6">
    <div class="max-w-4xl px-6 mx-auto md:px-8">
        <div class="text-2xl font-semibold text-gray-700 ">
            <div class="mb-6">
                <p class="text-3xl leading-8">
                    User Information
                </p>

                <p class="text-base font-normal">Available information in the system for this Users
                </p>
            </div>
            <div>
                <p class="mt-5 text-lg font-medium">User Information</p>
                <p class="text-sm text-gray-500">Enter User complete information</p>
                <div>

                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="max-w-md">
    <div class="pt-5 pb-4 pl-6 pr-3 sm:p-6 sm:pb-3">
        <div class="content-center text-center sm:flex sm:items-start">
            <div class="mx-auto">
                <img src="{{ asset('images/logo.png') }}" class="w-48 h-48 mx-auto rounded-full" />
                <div class="mt-2 text-lg font-medium text-black full">
                    {{ $user->name }}

                    <div class="flex items-center justify-center gap-2">
                        <p class="text-sm text-gray-600">
                            {{ $user->email }}
                        <p>||</p>
                        <p class="text-sm {{ $user->approve ? 'text-green-500' : 'text-red-500' }}">
                            {{ $user->approve ? 'Approved' : 'Pending' }}
                        </p>
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-2 mt-5 text-left md:grid-cols-2">

                    <div class="font-medium text-black">
                        Date Created:
                        <p class="mt-4 text-cool-gray-600">
                            {{ $user->created_at->format('F j, Y h:i:s A') }}
                        </p>
                    </div>

                    <div class="font-medium text-black ">
                        Account Status:
                        <div class="relative mt-4">
                            <select wire:model.live.throttle.150ms='is_approve' required name="is_approve"
                                id="is_approve"
                                class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option value="" selected>
                                    Select Status
                                </option>

                                @foreach (\App\Enums\ApprovalStatus::cases() as $status)
                                <option value="{{ $status->value }}">
                                    {{ $status->name }}
                                </option>
                                @endforeach
                            </select>
                            <p
                                class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                Select Status
                            </p>
                            @error('status')
                            <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-1 mt-4 font-medium text-black md:col-span-2">
                        User Role:
                        <div class="relative mt-4">
                            <select wire:model='role' required name="role" id="role"
                                class="block w-full p-3 text-sm text-gray-900 uppercase bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option value="" selected>
                                    Select Role for this user
                                </option>

                                @foreach ($this->roles as $role)
                                <option value="{{ $role }}">
                                    {{ $role }}
                                </option>
                                @endforeach

                            </select>
                            <p
                                class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                Select Role for this user
                            </p>
                            @error('role')
                            <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-5">
            <x-button.text btn-type="warning" type="button" wire:click="$dispatch('closeModal')">
                Close
            </x-button.text>

            <x-button.text btn-type="success" type="button" wire:click="approve">
                Update status
            </x-button.text>
        </div>
    </div>
</div>