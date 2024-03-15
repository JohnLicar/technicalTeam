<div class="py-6">
    <div class="max-w-4xl px-6 mx-auto md:px-8">
        <div class="text-2xl font-semibold text-gray-700 ">
            <div class="mb-6">
                <p class="text-3xl leading-8">
                    Add new Purok
                </p>

                <p class="text-base font-normal">Please make sure that the informations are correct
                </p>
            </div>

            <div>
                <form enctype="multipart/form-data" wire:submit="addPurok">
                    <div>
                        <p class="mt-5 text-lg font-medium">Purok Name</p>
                        <p class="text-sm text-gray-500">Enter Purok complete name</p>
                        <div class="mt-4">
                            <div class="relative ">
                                <select required wire:model.live.throttle.150ms='barangay_id' name="barangay"
                                    id="barangay"
                                    class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                    <option value="" selected>
                                        Select Barangay
                                    </option>

                                    @foreach ($this->barangays as $barangay)
                                    <option value="{{ $barangay['id'] }}">
                                        {{ $barangay['barangay'] }}
                                    </option>
                                    @endforeach

                                </select>
                                <p
                                    class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                    Select Barangay</p>
                                @error('barangay_id')
                                <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                @enderror
                            </div>

                            <x-input.floating wire:model='purok' class="mt-4 border-gray-500" :value="'Purok name'"
                                :name="'purok'" :id="'purok'" :type="'text'" :bg="'white'" />

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
                            {{ __('Add Purok') }}
                        </x-button.solid>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>