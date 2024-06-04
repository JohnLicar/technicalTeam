<div x-data="{ showFilter: false, showReport: false }">

    <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
        <div class="my-6 text-2xl font-semibold text-gray-700 mt-14" x-transition>
            <div class="mb-6">
                <p class="text-2xl leading-8">
                    Validated list from different barangay
                </p>

                <p class="text-base font-normal">Here’s an overview of the latest validated list
                </p>
            </div>

            <div class="flex justify-between">
                <div>
                    @can('create applicant')
                    <x-button.solid wire:click="$dispatch('openModal', {component: 'social-prep.modal.prep-day'})"
                        class="flex items-center justify-center bg-blue-500 hover:bg-blue-600">

                        <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 13C7.44772 13 7 12.5523 7 12C7 11.4477 7.44772 11 8 11C8.55228 11 9 11.4477 9 12C9 12.5523 8.55228 13 8 13Z"
                                fill="currentColor" />
                            <path
                                d="M8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55228 15 9 15.4477 9 16C9 16.5523 8.55228 17 8 17Z"
                                fill="currentColor" />
                            <path
                                d="M11 16C11 16.5523 11.4477 17 12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16Z"
                                fill="currentColor" />
                            <path
                                d="M16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16C17 16.5523 16.5523 17 16 17Z"
                                fill="currentColor" />
                            <path
                                d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z"
                                fill="currentColor" />
                            <path
                                d="M16 13C15.4477 13 15 12.5523 15 12C15 11.4477 15.4477 11 16 11C16.5523 11 17 11.4477 17 12C17 12.5523 16.5523 13 16 13Z"
                                fill="currentColor" />
                            <path
                                d="M8 7C7.44772 7 7 7.44772 7 8C7 8.55228 7.44772 9 8 9H16C16.5523 9 17 8.55228 17 8C17 7.44772 16.5523 7 16 7H8Z"
                                fill="currentColor" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M6 3C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6ZM18 5H6C5.44772 5 5 5.44772 5 6V18C5 18.5523 5.44772 19 6 19H18C18.5523 19 19 18.5523 19 18V6C19 5.44772 18.5523 5 18 5Z"
                                fill="currentColor" />
                        </svg>
                        {{ __('Upload attendance to Social Prep') }}
                    </x-button.solid>
                    @endcan
                </div>

                <div class="inline-flex gap-4 ">
                    <div class="inline-flex items-center justify-center gap-5">
                        <div>
                            <button type=" button" @click="showFilter = !showFilter"
                                class="inline-flex justify-center text-sm font-medium text-blue-600 group hover:text-blue-800"
                                id="menu-button" aria-expanded="false" aria-haspopup="true">
                                Filter
                                <svg x-show="!showFilter" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.34317 7.75732L4.92896 9.17154L12 16.2426L19.0711 9.17157L17.6569 7.75735L12 13.4142L6.34317 7.75732Z"
                                        fill="currentColor" />
                                </svg>

                                <svg x-show="showFilter" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.6569 16.2427L19.0711 14.8285L12.0001 7.75739L4.92896 14.8285L6.34317 16.2427L12.0001 10.5858L17.6569 16.2427Z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <x-input.floating wire:model.live='search' class="w-full" :value="'Search Record'" :name="'search'"
                        :id="'search'" :type="'search'" :bg="'white'" />
                </div>
            </div>

            {{-- Table Div --}}
            <div class="container mt-6 overflow-x-auto">
                <x-table>
                    <x-slot name="head">

                        <x-table.heading>
                            #
                        </x-table.heading>
                        <x-table.heading>
                            Barangay
                        </x-table.heading>
                        <x-table.heading>
                            Social Prep
                        </x-table.heading>
                        <x-table.heading>
                            Name
                        </x-table.heading>

                        <x-table.heading>
                            Classification
                        </x-table.heading>
                        <x-table.heading>
                            Structure
                        </x-table.heading>
                        <x-table.heading>
                            Recommendation
                        </x-table.heading>
                        <x-table.heading>
                            Validated by
                        </x-table.heading>
                        <x-table.heading>

                        </x-table.heading>
                    </x-slot>

                    <x-slot name="body">
                        @forelse ($applicants as $index => $applicant)
                        <x-table.row striped wire:key="{{$index}}" wire:loading.class="opacity-50">
                            {{-- <x-table.cell>
                                <input wire:model='selectedApplicant' type="checkbox" value="{{ $applicant->id }}"
                                    id="applicant-{{ $applicant->id }}"
                                    class="text-blue-600 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                            </x-table.cell> --}}

                            <x-table.cell class="py-5">
                                {{$applicants->firstItem() + $loop->index }}
                            </x-table.cell>

                            <x-table.cell>
                                <div class="font-medium ">Brgy: {{$applicant->barangay->barangay}}
                                </div>
                                @if ($applicant->purok)
                                <div class="text-xs text-gray-500">Purok: {{
                                    $applicant->purok?->purok
                                    }}
                                </div>
                                @endif
                            </x-table.cell>

                            <x-table.cell>
                                <x-chip :event="$applicant->pop_count > 0 ? 'Yes' : 'No'">

                                </x-chip>
                            </x-table.cell>

                            <x-table.cell>
                                <div class="font-medium ">Applicant: {{$applicant->name}}
                                </div>
                                <div class="text-xs text-gray-500">Partner: {{
                                    $applicant->spouse?->spouse_name
                                    }}
                                </div>
                            </x-table.cell>

                            <x-table.cell>
                                @foreach ( $applicant->housingOccupancies as $housingOccupancy )
                                <li> {{$housingOccupancy->description}}</li>
                                @endforeach
                            </x-table.cell>

                            <x-table.cell>
                                {{$applicant->structure}}
                            </x-table.cell>

                            <x-table.cell>
                                {{$applicant->recommendation}}
                            </x-table.cell>

                            <x-table.cell>
                                {{$applicant->validator?->name}}
                            </x-table.cell>

                            <x-table.cell>
                                @can('view applicant')
                                <x-button.text btn-type="success" wire:navigate isLink
                                    href="{{ route('validation.view', $applicant) }}">
                                    View
                                </x-button.text>
                                @endcan
                                @can('social prep')
                                <x-button.text btn-type="primary"
                                    wire:click="$dispatch('openModal', {component: 'social-prep.modal.update', arguments: {applicant: {{$applicant}}}})">
                                    Social Prep
                                </x-button.text>
                                @endcan
                            </x-table.cell>

                        </x-table.row>
                        @empty
                        <x-no-data />
                        @endforelse
                    </x-slot>
                </x-table>
            </div>
            <div class="mt-5 mb-5">
                {{ $applicants->onEachSide(0)->links() }}
            </div>
        </div>
    </div>
</div>