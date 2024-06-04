<div class="py-6" autofocus="true">
    <div class="max-w-4xl px-6 mx-auto md:px-8">
        <div class="text-2xl font-semibold text-gray-700 ">
            <div class="mb-6">
                <p class="text-3xl leading-8">
                    {{ $applicant->name }}
                </p>

                <p class="text-base font-normal">Please make sure that the informations are correct
                </p>
            </div>

            <div>
                <form enctype="multipart/form-data" wire:submit="addSocPrep">
                    <div>
                        <div class="relative mt-4">
                            <select required wire:model='social_prep_day_id' name="prep_day" id="prep_day"
                                class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 peer">

                                <option selected>
                                    Select Social Prep Date
                                </option>

                                @foreach ($this->socialPrepDates as $socialPrepDate)
                                <option value="{{ $socialPrepDate->id }}">
                                    {{ $socialPrepDate->prep_day }}
                                </option>
                                @endforeach
                            </select>
                            <p
                                class="absolute px-2 text-base text-gray-500 duration-150 ease-in-out bg-white pointer-events-none left-2 peer-valid:left-1 peer-valid:top-0 peer-valid:-translate-y-2 top-3 peer-valid:text-xs ">
                                Select Social Prep Date</p>
                            @error('social_prep_day_id')
                            <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="relative mt-4">
                            <select required wire:model='housing_project_id' name="site" id="site"
                                class="block w-full p-3 text-sm text-gray-900 bg-transparent border-gray-500 rounded-lg appearance-none border-1 peer">
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
                            @error('resettlement_site_id')
                            <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-3 gap-3 mt-4">
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
                                        @for ($index = 1; $index <= $blocks; $index++) <option value="{{  $index }}">
                                            {{ $index }}
                                            </option>
                                            @endfor
                                    </datalist>
                                    @error('block')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
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
                                    @error('lot')
                                    <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- <p class="mt-4 text-lg font-medium">Attachement</p>
                        <div class="grid grid-cols-2 gap-2 ">
                            @foreach (\App\Enums\Documents::cases() as $index => $docs )
                            <div>
                                <input wire:model='classification' id="classification-{{ $index }}"
                                    name="classification[]" type="checkbox" value="{{ $docs->value }}"
                                    class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="classification-{{ $index }}" class="ml-2 text-sm font-medium text-gray-500">
                                    {{ $docs->value }}
                                </label>
                            </div>
                            @endforeach
                        </div> --}}

                        <div>
                            <p class="mt-6 text-lg font-medium">Upload Attachement</p>
                            <div class="flex items-center justify-center w-full mt-4">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 ">
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

                                    <x-input.floating wire:model='attachments' multiple :name="'dropzone-file'"
                                        :id="'dropzone-file'" :type="'file'" class="hidden" />
                                </label>
                            </div>
                            @error('attachments')
                            <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                            @enderror
                            @error('attachments.*')
                            <p class="mt-2 text-sm text-left text-red-600 ">{{ $message }}</p>
                            @enderror

                            @if ($attachments)
                            <div class="mt-5 font-normal text-md">
                                <div class="flex flex-wrap gap-2 mt-3">
                                    @foreach ($attachments as $index => $file)
                                    @if ($file->getClientOriginalExtension() !== "pdf")
                                    <div
                                        class="relative transition-all duration-500 ease-in cursor-pointer hover:scale-110 cursor-pointeruration-500">
                                        <img class="border border-blue-400 rounded-md w-36 h-36"
                                            src="{{ $file->temporaryUrl() }}"
                                            onclick="showModal('{{ $file->temporaryUrl() }}')">

                                        <button class="absolute top-0 right-0 mr-3 text-white bg-gray-700 rounded-full "
                                            wire:click.prevent="removeAttachmentImage({{ $index }})">
                                            x
                                        </button>
                                    </div>
                                    @else
                                    <div class="flex flex-row">
                                        <div class="flex items-center justify-center gap-2">
                                            <button
                                                class="p-1 text-sm text-white bg-gray-500 rounded-lg hover:bg-red-500"
                                                wire:click.prevent="removeAttachmentImage({{ $index }})">
                                                x
                                            </button>
                                            <li class="text-sm font-normal">
                                                {{ $file->getClientOriginalName() }}
                                            </li>
                                        </div>
                                    </div>
                                    @endif

                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="my-5">
                            @foreach ($applicant->socialPrepAttachment as $index => $file)
                            <div class="my-2 " wire:key="{{ $file->index }}">
                                <div class="flex items-center gap-2">
                                    <button wire:click='removeAttachment({{ $file }})' type="button"
                                        class="p-1 text-sm text-white bg-red-500 rounded-full " @click="show = true">
                                        x
                                    </button>

                                    <x-button.text btnType="success" isLink target=”_blank”
                                        href="{{ asset('storage/attachment/socialPrep/'. $file->file)}}"
                                        class="text-sm truncate hover:bg-green-300 hover:rounded-full hover:text-gray-900 hover:p-1">
                                        {{ $file->file }}
                                    </x-button.text>
                                </div>
                            </div>
                            @endforeach
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
                            {{ __('Add User Information') }}
                        </x-button.solid>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>