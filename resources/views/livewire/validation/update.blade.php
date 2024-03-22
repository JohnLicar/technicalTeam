<div>
    <div class="py-12">
        <div class="max-w-4xl px-6 mx-auto md:px-8">
            <div class="my-6 text-2xl font-semibold text-gray-700">
                <div class="mb-6">
                    <p class="text-3xl leading-8">
                        Update record
                    </p>

                    <p class="text-base font-normal">Please make sure that the informations are correct
                    </p>
                </div>

                <div>
                    <form enctype="multipart/form-data" novalidate wire:submit="updateRecord">
                        <div>
                            <p class="mt-5 text-lg font-medium">Barangay Information</p>
                            <p class="text-sm text-gray-500">Enter applicant's barangay information</p>
                            <div class="grid grid-cols-1 mt-3 md:grid-cols-2 gap-y-4 gap-x-4">
                                <div class="relative">
                                    <select required wire:model.live.throttle.150ms='barangay_id' name="barangay"
                                        id="barangay"
                                        class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected>
                                            Select Barangay
                                        </option>

                                        @foreach ($this->barangays as $barangay)
                                        <option value="{{ $barangay->id }}">
                                            {{ $barangay->barangay }}
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

                                <div class="relative">
                                    <select required wire:model.live='purok_id' name="purok" id="purok"
                                        class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected>
                                            Select Purok (optional)
                                        </option>

                                        @foreach ($this->puroks as $purok)
                                        <option value="{{ $purok->id }}">
                                            {{ $purok->purok }}
                                        </option>
                                        @endforeach

                                    </select>
                                    <p
                                        class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                        Select Purok (optional)
                                    </p>
                                    @error('purok_id')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="mt-6 text-lg font-medium">Family Head Information</p>
                            <p class="text-sm font-normal text-gray-500">Enter family head information</p>

                            <div class="grid grid-cols-1 gap-4 mt-3 md:grid-cols-2">
                                <x-input.floating wire:model='name' class="border-gray-500" :value="'Name'"
                                    :name="'name'" :id="'name'" :type="'text'" :bg="'white'" />

                                <x-date-picker wire:model.live='birthday' class="mt-4 border-gray-500"
                                    :value="'Spouse Birthday'" :name="'birthday'" :id="'birthday'" />

                                <div class="relative">
                                    <select wire:model='civil_status' required name="civil_status" id="civil_status"
                                        class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected>
                                            Select Civil Status
                                        </option>
                                        @foreach (\App\Enums\CivilStatus::cases() as $civil_status)
                                        <option value="{{ $civil_status->value }}">
                                            {{ $civil_status->name }}
                                        </option>
                                        @endforeach

                                    </select>
                                    <p
                                        class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                        Select Civil Status
                                    </p>
                                    @error('civil_status')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="relative">
                                    <select wire:model='gender' required name="gender" id="gender"
                                        class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected>
                                            Select Gender
                                        </option>

                                        @foreach (\App\Enums\Gender::cases() as $gender)
                                        <option value="{{ $gender->value }}">
                                            {{ $gender->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <p
                                        class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                        Select Gender
                                    </p>
                                    @error('gender')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="relative">
                                    <select required wire:model='fourteen' name="fourteen" id="fourteen"
                                        class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected>
                                            Select if part of 14K Endorsement
                                        </option>
                                        <option value='1'>
                                            Yes
                                        </option>
                                        <option value='0'>
                                            No
                                        </option>

                                    </select>
                                    <p
                                        class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                        Select if part of 14K Endorsement
                                    </p>
                                    @error('spouse_fourteen')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="mt-6 text-lg font-medium">Spouse Information</p>
                            <p class="text-sm font-normal text-gray-500">Enter spouse information</p>
                            <div class="grid grid-cols-1 gap-4 mt-3 md:grid-cols-2">

                                <x-input.floating wire:model='spouse_name' class="border-gray-500" :value="'Name'"
                                    :name="'spouse_name'" :id="'spouse_name'" :type="'text'" :bg="'white'" />

                                <x-date-picker wire:model.live='spouse_birthday' class="mt-4 border-gray-500"
                                    :value="'Spouse Birthday'" :name="'spouse_birthday'" :id="'spouse_birthday'" />

                                <div class="relative">
                                    <select wire:model='spouse_civil_status' required name="spouse_civil_status"
                                        id="spouse_civil_status"
                                        class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected>
                                            Select Civil Status
                                        </option>

                                        @foreach (\App\Enums\CivilStatus::cases() as $civil_status)
                                        <option value="{{ $civil_status->value }}">
                                            {{ $civil_status->name }}
                                        </option>
                                        @endforeach

                                    </select>
                                    <p
                                        class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                        Select Civil Status
                                    </p>
                                    @error('spouse_civil_status')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="relative">
                                    <select wire:model='spouse_gender' required name="spouse_gender" id="spouse_gender"
                                        class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected>
                                            Select Gender
                                        </option>

                                        @foreach (\App\Enums\Gender::cases() as $gender)
                                        <option value="{{ $gender->value }}">
                                            {{ $gender->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <p
                                        class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                        Select Gender
                                    </p>
                                    @error('spouse_gender')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="relative">
                                    <select required wire:model='spouse_fourteen' name="spouse_fourteen"
                                        id="spouse_fourteen"
                                        class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected>
                                            Select if part of 14K Endorsement
                                        </option>
                                        <option value='1'>
                                            Yes
                                        </option>
                                        <option value='0'>
                                            No
                                        </option>

                                    </select>
                                    <p
                                        class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                        Select if part of 14K Endorsement
                                    </p>
                                    @error('spouse_fourteen')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-cols-1 gap-4 mt-3 md:grid-cols-2">
                                <div>
                                    <p class="mt-6 text-lg font-medium">Classification of occupancy</p>
                                    <div class="grid grid-cols-1 mt-4 md:grid-cols-2 ">
                                        @foreach ($this->housingOccupancies as $occupancy )
                                        <div class="flex mt-2">
                                            <input wire:model='classification' id="classification-{{ $occupancy->id }}"
                                                name="classification[]" type="checkbox" value="{{ $occupancy->id }}"
                                                class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                            <label for="classification-{{ $occupancy->id }}"
                                                class="ml-2 text-sm font-medium text-gray-500">
                                                {{ $occupancy->description }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>

                                    @error('classification')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <p class="mt-6 text-lg font-medium">Structure</p>
                                    <div class="grid grid-cols-1 mt-4 md:grid-cols-2 ">

                                        <div class="flex mt-2">
                                            <input wire:model='structure' id="with_structure" name="structure"
                                                type="radio" value="With Structure"
                                                class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                            <label for="with_structure" class="ml-2 text-sm font-medium text-gray-500">
                                                With Structure
                                            </label>
                                        </div>

                                        <div class="flex mt-2">
                                            <input wire:model='structure' id="no_structure" name="structure"
                                                type="radio" value="No Structure"
                                                class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                            <label for="no_structure" class="ml-2 text-sm font-medium text-gray-500">
                                                No Structure
                                            </label>
                                        </div>
                                        @error('structure')
                                        <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-cols-1 gap-4 mt-3 md:grid-cols-2">
                                <div>
                                    <p class="mt-6 text-lg font-medium">Date of validation</p>
                                    <x-date-picker wire:model.live='date_of_validation' class="mt-4 border-gray-500"
                                        :value="'Date of validation'" :name="'date_of_validation'"
                                        :id="'date_of_validation'" />
                                </div>

                                <div>
                                    <p class="mt-6 text-lg font-medium">Validated by</p>

                                    <div class="relative mt-4">
                                        <select wire:model='validator' required name="validator" id="validator"
                                            class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                            <option value="" selected>
                                                Select Validator
                                            </option>

                                            @foreach ($this->validators as $validator)
                                            <option value="{{ $validator->id }}">
                                                {{ $validator->name }}
                                            </option>
                                            @endforeach

                                        </select>
                                        <p
                                            class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                            Select Validator
                                        </p>
                                        @error('validator')
                                        <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div x-data="{ show: @entangle('resettlement') }">
                            <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2 ">
                                <div>
                                    <p class="mt-5 text-lg font-medium">Resettlement Site</p>
                                    <p class="text-sm text-gray-500">Enter applicant's resettlement site if already have
                                    </p>

                                    <div class="grid grid-cols-1 my-4 md:grid-cols-2">
                                        <div class="flex mt-2">
                                            <input wire:model='resettlement' value=1 @click="show = true"
                                                name="with_resettlement" id="with_resettlement" type="radio"
                                                class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                            <label for="with_resettlement"
                                                class="ml-2 text-sm font-medium text-gray-500">
                                                With resettlement site
                                            </label>
                                        </div>

                                        <div class="flex mt-2">
                                            <input wire:model='resettlement' value=0 @click="show = false"
                                                name="no_resettlement" id="no_resettlement" type="radio"
                                                class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                            <label for="no_resettlement" class="ml-2 text-sm font-medium text-gray-500">
                                                No resettlement site
                                            </label>
                                        </div>
                                    </div>
                                    @error('resettlement')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <p class="mt-6 text-lg font-medium">Recommendation</p>
                                    <div class="relative mt-4">
                                        <select wire:model='recommendation' required name="recommendation"
                                            id="recommendation"
                                            class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                            <option value="" selected>
                                                Select Recommendation
                                            </option>

                                            @foreach (\App\Enums\Recommendation::cases() as $recommendation)
                                            <option value="{{ $recommendation->value }}">
                                                {{ $recommendation->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        <p
                                            class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                            Select Recommendation
                                        </p>
                                        @error('recommendation')
                                        <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div x-cloak x-show="show"
                                class="grid grid-cols-1 gap-2 my-4 md:grid-cols-4 sm:grid-cols-2">
                                <div class="relative">
                                    <select wire:model='site' focusable required name="site" id="site"
                                        class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="" selected>
                                            Select Site
                                        </option>

                                        @foreach ($this->housingProjects as $site)
                                        <option value="{{ $site->id }}">
                                            {{ $site->project }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <p
                                        class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                        Select Site</p>
                                    @error('site')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="relative">
                                    <x-input.floating wire:model='phase' class="border-gray-500" :value="'Phase'"
                                        :name="'phase'" :id="'phase'" :type="'text'" :bg="'white'" list="phases" />
                                    <datalist id="phases">
                                        @for ($index = 1; $index <= $phases; $index++) <option value="{{  $index }}">
                                            {{ $index }}
                                            </option>
                                            @endfor
                                    </datalist>
                                </div>

                                <div class="relative">
                                    <div class="relative">
                                        <x-input.floating wire:model='block' class="border-gray-500" :value="'Block'"
                                            :name="'block'" :id="'block'" :type="'text'" :bg="'white'" list="blocks" />
                                        <datalist id="blocks">
                                            @for ($index = 1; $index <= $blocks; $index++) <option
                                                value="{{  $index }}">
                                                {{ $index }}
                                                </option>
                                                @endfor
                                        </datalist>
                                    </div>
                                </div>

                                <div class="relative">
                                    <div class="relative">
                                        <x-input.floating wire:model='lot' class="border-gray-500" :value="'Lot'"
                                            :name="'lot'" :id="'lot'" :type="'text'" :bg="'white'" list="lots" />
                                        <datalist id="lots">
                                            @for ($index = 1; $index <= $lots; $index++) <option value="{{  $index }}">
                                                {{ $index }}
                                                </option>
                                                @endfor
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="mt-6 ">
                                <p class="mt-4 text-lg font-medium">Remarks</p>
                                <div class="relative">
                                    <textarea wire:model='remarks' rows="5" id="remarks"
                                        class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none focus:outline-none focus:ring-0 peer"></textarea>

                                </div>
                            </div>
                        </div>

                        <div>
                            <p class="mt-6 text-lg font-medium">Upload Attachement</p>
                            <div class="flex items-center justify-center w-full mt-4">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 ">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click
                                                to
                                                upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 ">PDF only (MAX.
                                            100MB)</p>
                                    </div>

                                    <x-input.floating wire:model='newAttachments' multiple :name="'dropzone-file'"
                                        :id="'dropzone-file'" :type="'file'" class="hidden" />
                                </label>
                            </div>

                            @if ($newAttachments)
                            <div class="mt-5 font-normal text-md">
                                <p class="mt-6 text-lg font-medium">Upload Attachement</p>
                                <div class="flex flex-wrap gap-2 mt-3">
                                    @foreach ($newAttachments as $index => $file)
                                    <div class="flex flex-row">
                                        <div class="flex items-center justify-center gap-2">
                                            <button class="text-white bg-gray-500 rounded-md "
                                                wire:click.prevent="removeAttachmentImage({{ $index }})">
                                                x
                                            </button>
                                            <li class="text-sm font-normal">
                                                {{ $file->getClientOriginalName() }}
                                            </li>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="m-5">
                            <livewire:file-upload.preview :applicant="$applicant" />
                        </div>
                        <div class="flex justify-end gap-4 mt-5 ">

                            <x-button.text btn-type="warning" isLink href="{{ route('validation.index') }}"
                                wire:navigate>
                                Return
                            </x-button.text>

                            <x-button.solid type="submit" class="flex items-center justify-center bg-blue-500">
                                <svg width="24" height="24" class="mr-2" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 4C11.4477 4 11 4.44772 11 5V11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H11V19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19V13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H13V5C13 4.44772 12.5523 4 12 4Z"
                                        fill="currentColor" />
                                </svg>
                                {{ __('Update Record') }}
                            </x-button.solid>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>