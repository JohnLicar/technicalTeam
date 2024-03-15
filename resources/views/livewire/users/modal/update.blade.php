<div class="py-6">
    <div class="max-w-4xl px-6 mx-auto md:px-8">
        <div class="text-2xl font-semibold text-gray-700 ">
            <div class="mb-6">
                <p class="text-3xl leading-8">
                    Update User
                </p>

                <p class="text-base font-normal">Please make sure that the informations are correct
                </p>
            </div>

            <div>
                <form enctype="multipart/form-data" novalidate wire:submit="updateUser">
                    <div>
                        <p class="mt-5 text-lg font-medium">User Information</p>
                        <p class="text-sm text-gray-500">Enter User complete information</p>
                        <div>
                            <x-input.floating wire:model='name' class="mt-4 border-gray-500" :value="'Name'"
                                :name="'name'" :id="'name'" :type="'text'" :bg="'white'" />

                            <x-input.floating wire:model='email' class="mt-4 border-gray-500" :value="'Email'"
                                :name="'email'" :id="'email'" :type="'email'" :bg="'white'" />

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
                    <div class="flex justify-end gap-4 mt-5 ">

                        <x-button.text btn-type="warning" type="button" wire:click="$dispatch('closeModal')">
                            Close
                        </x-button.text>

                        <x-button.solid type="submit" class="flex items-center justify-center bg-blue-500">
                            <svg width="24" height="24" class="mr-2" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 4C11.4477 4 11 4.44772 11 5V11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H11V19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19V13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H13V5C13 4.44772 12.5523 4 12 4Z"
                                    fill="currentColor" />
                            </svg>
                            {{ __('Update User Information') }}
                        </x-button.solid>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>