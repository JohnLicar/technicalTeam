<div>
    <div class="py-12">
        <div class="max-w-4xl px-6 mx-auto md:px-8">
            <div class="my-6 text-2xl font-semibold text-gray-700">
                <div class="mb-6">
                    <p class="text-3xl leading-8">
                        Viewing records of
                        <i class="italic text-blue-500">{{ $name }}</i>
                    </p>
                </div>

                <div>
                    <form enctype="multipart/form-data" wire:submit="addNewRecord">
                        <div>
                            <p class="mt-5 text-lg font-medium">Barangay Information</p>
                            <p class="text-sm text-gray-500">Enter applicant's barangay information</p>
                            <div class="grid grid-cols-1 mt-3 md:grid-cols-2 gap-y-4 gap-x-4">
                                <x-input.floating wire:model='barangay_id' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Barangay'" :name="'barangay'" :id="'barangay'" :type="'text'" :bg="'white'"
                                    autocomplete />

                                <x-input.floating wire:model='purok_id' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Purok'" :name="'purok'" :id="'purok'" :type="'text'" :bg="'white'"
                                    autocomplete />
                            </div>
                        </div>

                        <div>
                            <p class="mt-6 text-lg font-medium">Family Head Information</p>
                            <p class="text-sm font-normal text-gray-500">Enter family head information</p>

                            <div class="grid grid-cols-1 gap-4 mt-3 md:grid-cols-2">
                                <x-input.floating wire:model='name' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Name'" :name="'name'" :id="'name'" :type="'text'" :bg="'white'"
                                    autocomplete />

                                <x-input.floating wire:model='birthday' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none "
                                    :value="'Birthday'" :name="'birthday'" :id="'birthday'" :type="'date'"
                                    :bg="'white'" />

                                <x-input.floating wire:model='civil_status' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Civil Status'" :name="'civil_status'" :id="'civil_status'" :type="'text'"
                                    :bg="'white'" autocomplete />

                                <x-input.floating wire:model='gender' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Gender'" :name="'gender'" :id="'gender'" :type="'text'" :bg="'white'"
                                    autocomplete />
                            </div>
                        </div>

                        <div>
                            <p class="mt-6 text-lg font-medium">Spouse Information</p>
                            <p class="text-sm font-normal text-gray-500">Enter spouse information</p>
                            <div class="grid grid-cols-1 gap-4 mt-3 md:grid-cols-2">
                                <x-input.floating wire:model='spouse_name' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Spouse Name'" :name="'spouse_name'" :id="'spouse_name'" :type="'text'"
                                    :bg="'white'" autocomplete />

                                <x-input.floating wire:model='spouse_birthday' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none "
                                    :value="'Spouse Birthday'" :name="'spouse_birthday'" :id="'spouse_birthday'"
                                    :type="'date'" :bg="'white'" />

                                <x-input.floating wire:model='spouse_civil_status' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Spouse Civil Status'" :name="'spouse_civil_status'"
                                    :id="'spouse_civil_status'" :type="'text'" :bg="'white'" autocomplete />

                                <x-input.floating wire:model='spouse_gender' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Spouse Gender'" :name="'spouse_gender'" :id="'spouse_gender'"
                                    :type="'text'" :bg="'white'" autocomplete />
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-cols-1 gap-4 mt-3 md:grid-cols-2">
                                <div>
                                    <p class="mt-6 text-lg font-medium">Classification of occupancy</p>
                                    <div class="grid grid-cols-1 mt-4 md:grid-cols-2 ">
                                        @foreach ($this->housingOccupancies as $index => $occupancy )
                                        <div class="flex mt-2">
                                            <input wire:model='classification' id="classification-{{ $index }}"
                                                name="classification[]" type="checkbox" value="{{ $occupancy->id }}"
                                                disabled
                                                class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                                            <label for=" classification-{{ $index }}"
                                                class="ml-2 text-sm font-medium text-gray-500">
                                                {{ $occupancy->description }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div>
                                    <p class="mt-6 text-lg font-medium">Structure</p>
                                    <div class="grid grid-cols-1 mt-4 md:grid-cols-2 ">
                                        <div class="flex mt-2">
                                            <input wire:model='structure' id="with_structure" name="with_structure"
                                                type="radio" value="With Structure" disabled
                                                class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                                            <label for="with_structure" class="ml-2 text-sm font-medium text-gray-500">
                                                With Structure
                                            </label>
                                        </div>

                                        <div class="flex mt-2">
                                            <input wire:model='structure' id="no_structure" name="no_structure"
                                                type="radio" value="No Structure" disabled
                                                class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                                            <label for="no_structure" class="ml-2 text-sm font-medium text-gray-500">
                                                No Structure
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="grid grid-cols-1 gap-4 mt-3 md:grid-cols-2">
                                <div>
                                    <p class="mt-6 text-lg font-medium">Date of validation</p>
                                    <x-input.floating wire:model='date_of_validation' disabled
                                        class="mt-4 border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                        :value="'Date of Validation'" :name="'date_of_validation'"
                                        :id="'date_of_validation'" :type="'text'" :bg="'white'" :type="'date'" />
                                </div>

                                <div>
                                    <p class="mt-6 text-lg font-medium">Validated by</p>
                                    <x-input.floating wire:model='validated_by' disabled
                                        class="mt-4 border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                        :value="'Validated by'" :name="'validated_by'" :id="'validated_by'"
                                        :type="'text'" :bg="'white'" />
                                </div>
                            </div>
                        </div>

                        <div x-data="{ show: @entangle('resettlement') }">
                            <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2 ">
                                <div>
                                    <p class="mt-5 text-lg font-medium">Resettlement Site</p>
                                    <p class="text-sm text-gray-500">Enter applicant's resttelement site if already have
                                    </p>

                                    <div class="grid grid-cols-1 my-4 md:grid-cols-2">
                                        <div class="flex mt-2">
                                            <input wire:model='resettlement' id="with_resettlement"
                                                name="with_resettlement" type="radio" value=1 disabled
                                                class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                                            <label for="with_resettlement"
                                                class="ml-2 text-sm font-medium text-gray-500">
                                                With Resettlement site
                                            </label>
                                        </div>

                                        <div class="flex mt-2">
                                            <input wire:model='resettlement' id="no_resettlement" name="no_resettlement"
                                                type="radio" value=0 disabled
                                                class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none">
                                            <label for="no_resettlement" class="ml-2 text-sm font-medium text-gray-500">
                                                No Resettlement site
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <p class="mt-6 text-lg font-medium">Recommendation</p>
                                    <div class="relative mt-4">
                                        <x-input.floating wire:model='recommendation' disabled
                                            class="mt-4 border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                            :value="'Recommendation'" :name="'recommendation'" :id="'recommendation'"
                                            :type="'text'" :bg="'white'" />
                                    </div>
                                </div>
                            </div>

                            <div x-show="show" class="grid grid-cols-1 gap-2 my-4 md:grid-cols-4 sm:grid-cols-2">
                                <x-input.floating wire:model='site' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Site'" :name="'site'" :id="'site'" :type="'text'" :bg="'white'" />

                                <x-input.floating wire:model='phase' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Phase'" :name="'phase'" :id="'phase'" :type="'text'" :bg="'white'" />

                                <x-input.floating wire:model='block' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Block'" :name="'block'" :id="'block'" :type="'text'" :bg="'white'" />

                                <x-input.floating wire:model='lot' disabled
                                    class="border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"
                                    :value="'Lot'" :name="'lot'" :id="'lot'" :type="'text'" :bg="'white'" />
                            </div>
                        </div>

                        <div>
                            <div class="mt-6 ">
                                <p class="mt-4 text-lg font-medium">Remarks</p>
                                <div class="relative">
                                    <textarea wire:model='remarks' rows="5" id="remarks" disabled
                                        class="w-full border-gray-300 rounded focus:ring-blue-500 focus:ring-2 border-slate-300 placeholder-slate-400 focus:outline-none disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none"></textarea>

                                </div>
                            </div>
                        </div>

                        <div>
                            @if (!$attachments->count() == 0)
                            <p class="text-lg font-medium">Validation Attachement</p>
                            <div class="mt-5 font-normal text-md">
                                <div class="flex flex-wrap gap-2 ">
                                    @foreach ($attachments as $index => $attachment)
                                    <div class="flex flex-row">
                                        <div class="flex items-center justify-center ">
                                            <div class="text-sm font-normal">
                                                <li>
                                                    <x-button.text btn-type="success" isLink target=”_blank”
                                                        href="{{ asset('storage/images/attachments/'. $attachment->file)}}">
                                                        {{ $attachment->file }}
                                                    </x-button.text>
                                                </li>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>


                        <div class="flex justify-end gap-4 mt-5 ">

                            <x-button.text btn-type="warning" type="button" isLink
                                href="{{ route('validation.index') }}" wire:navigate>
                                Return
                            </x-button.text>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>