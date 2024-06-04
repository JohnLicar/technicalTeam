<div class="py-6" autofocus="true">
    <div class="max-w-4xl px-6 mx-auto md:px-8">
        <div class="text-2xl font-semibold text-gray-700 ">
            <div class="flex flex-col gap-2 mb-6">
                <x-date-picker wire:model='prep_day' class="mt-4 border-gray-500 outline-none"
                    :value="'Date of Social Prep'" :name="'prep_day'" :id="'prep_day'" autocomplete="false" />

                <x-button.solid wire:click='createSocialPrepDate' class="flex items-center justify-center bg-blue-500">
                    <svg width="24" height="24" class="mr-2" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 4C11.4477 4 11 4.44772 11 5V11H5C4.44772 11 4 11.4477 4 12C4 12.5523 4.44772 13 5 13H11V19C11 19.5523 11.4477 20 12 20C12.5523 20 13 19.5523 13 19V13H19C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11H13V5C13 4.44772 12.5523 4 12 4Z"
                            fill="currentColor" />
                    </svg>
                    {{ __('Add Social Prep Date') }}
                </x-button.solid>
            </div>


            <div>
                <div class="container mt-6 overflow-x-auto ">
                    <x-table>
                        <x-slot name="head">

                            <x-table.heading>
                                #
                            </x-table.heading>
                            <x-table.heading>
                                Date of Social prep
                            </x-table.heading>

                            <x-table.heading>
                                Attendance
                            </x-table.heading>

                            <x-table.heading>
                                File
                            </x-table.heading>
                        </x-slot>

                        <x-slot name="body">
                            @forelse ($prep_days as $index => $prep_day)
                            <x-table.row striped wire:key="{{$index}}" wire:loading.class="opacity-50">
                                <x-table.cell class="py-5">
                                    {{$prep_days->firstItem() + $loop->index }}
                                </x-table.cell>

                                <x-table.cell>
                                    {{ \Carbon\Carbon::parse($prep_day->prep_day)->format('l jS \of F Y') }}
                                </x-table.cell>

                                <x-table.cell>
                                    {{ $prep_day->attachment }}
                                </x-table.cell>

                                <x-table.cell>
                                    <x-button.solid class="bg-blue-500"
                                        wire:click="$dispatch('openModal', {component: 'social-prep.modal.upload-file', arguments: {socialPrepDay: {{$prep_day->id}} }})">
                                        {{ __('Upload File') }}
                                    </x-button.solid>
                                </x-table.cell>
                            </x-table.row>
                            @empty
                            <x-no-data />
                            @endforelse
                        </x-slot>
                    </x-table>
                    <div class="mt-5 mb-5">
                        {{ $prep_days->onEachSide(0)->links() }}
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-4 mt-5 ">
                <x-button.text btn-type="warning" type="button" wire:click="$dispatch('closeModal')">
                    Close
                </x-button.text>
            </div>
        </div>
    </div>
</div>