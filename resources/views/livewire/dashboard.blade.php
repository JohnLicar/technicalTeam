<div class="mx-auto max-w-7xl sm:px-6 ">
    <div class="bg-white">
        <div class="mt-10 text-gray-900">
            <div class="my-2 text-2xl font-semibold text-gray-700">
                <p class="text-2xl leading-8">
                    {{ __('Welcome, ' ) }} {{ auth()->user()->name }}!
                </p>
                <p class="text-base font-normal">Here’s an overview of your activities</p>
                </p>
            </div>

            <div class="grid w-full grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-2 gap-y-2">

                <x-dashboard-card :title="'Total Applicant'" :count="$this->dashboardCounts[0]->applicantCount"
                    :bg="'bg-cool-gray-500'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                        stroke="currentColor" class="text-white w-7 h-7">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7ZM14 7C14 8.10457 13.1046 9 12 9C10.8954 9 10 8.10457 10 7C10 5.89543 10.8954 5 12 5C13.1046 5 14 5.89543 14 7Z"
                            fill="currentColor" />
                        <path
                            d="M16 15C16 14.4477 15.5523 14 15 14H9C8.44772 14 8 14.4477 8 15V21H6V15C6 13.3431 7.34315 12 9 12H15C16.6569 12 18 13.3431 18 15V21H16V15Z"
                            fill="currentColor" />
                    </svg>
                </x-dashboard-card>

                <x-dashboard-card :title="'With Awarded Unit'" :count="$this->withResettlementCount"
                    :bg="'bg-green-500'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                        stroke="currentColor" class="text-white w-7 h-7">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21 8.77217L14.0208 1.79299C12.8492 0.621414 10.9497 0.621413 9.77817 1.79299L3 8.57116V23.0858H10V17.0858C10 15.9812 10.8954 15.0858 12 15.0858C13.1046 15.0858 14 15.9812 14 17.0858V23.0858H21V8.77217ZM11.1924 3.2072L5 9.39959V21.0858H8V17.0858C8 14.8767 9.79086 13.0858 12 13.0858C14.2091 13.0858 16 14.8767 16 17.0858V21.0858H19V9.6006L12.6066 3.2072C12.2161 2.81668 11.5829 2.81668 11.1924 3.2072Z"
                            fill="currentColor" />
                    </svg>
                </x-dashboard-card>

                <x-dashboard-card :title="'For Pop'" :count="$this->dashboardCounts[0]->popCount" :bg="'bg-blue-500'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="text-white w-7 h-7">
                        <path
                            d="M8.55024 10.5503C8.55024 11.1026 8.10253 11.5503 7.55024 11.5503C6.99796 11.5503 6.55024 11.1026 6.55024 10.5503C6.55024 9.99801 6.99796 9.55029 7.55024 9.55029C8.10253 9.55029 8.55024 9.99801 8.55024 10.5503Z"
                            fill="currentColor" />
                        <path
                            d="M10.5502 11.5503C11.1025 11.5503 11.5502 11.1026 11.5502 10.5503C11.5502 9.99801 11.1025 9.55029 10.5502 9.55029C9.99796 9.55029 9.55024 9.99801 9.55024 10.5503C9.55024 11.1026 9.99796 11.5503 10.5502 11.5503Z"
                            fill="currentColor" />
                        <path
                            d="M13.5502 11.5503C14.1025 11.5503 14.5502 11.1026 14.5502 10.5503C14.5502 9.99801 14.1025 9.55029 13.5502 9.55029C12.998 9.55029 12.5502 9.99801 12.5502 10.5503C12.5502 11.1026 12.998 11.5503 13.5502 11.5503Z"
                            fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M16.2071 4.89344C19.0922 7.7786 19.313 12.3192 16.8693 15.4577C16.8846 15.4712 16.8996 15.4853 16.9142 15.4999L21.1568 19.7426C21.5473 20.1331 21.5473 20.7663 21.1568 21.1568C20.7663 21.5473 20.1331 21.5473 19.7426 21.1568L15.5 16.9141C15.4853 16.8995 15.4713 16.8846 15.4578 16.8693C12.3193 19.3131 7.77858 19.0923 4.89338 16.2071C1.76918 13.083 1.76918 8.01763 4.89338 4.89344C8.01757 1.76924 13.0829 1.76924 16.2071 4.89344ZM6.30759 14.7929C8.65074 17.1361 12.4497 17.1361 14.7929 14.7929C17.136 12.4498 17.136 8.6508 14.7929 6.30765C12.4497 3.96451 8.65074 3.96451 6.30759 6.30765C3.96445 8.6508 3.96445 12.4498 6.30759 14.7929Z"
                            fill="currentColor" />
                    </svg>
                </x-dashboard-card>

                <x-dashboard-card :title="'For Verification'" :count="$this->dashboardCounts[0]->verificationCount"
                    :bg="'bg-orange-500'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="text-white w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                </x-dashboard-card>

                <x-dashboard-card :title="'Re-validation'" :count="$this->dashboardCounts[0]->reValidationCount"
                    :bg="'bg-purple-500'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="text-white w-7 h-7">
                        <path
                            d="M13.1459 11.0499L12.9716 9.05752L15.3462 8.84977C14.4471 7.98322 13.2242 7.4503 11.8769 7.4503C9.11547 7.4503 6.87689 9.68888 6.87689 12.4503C6.87689 15.2117 9.11547 17.4503 11.8769 17.4503C13.6977 17.4503 15.2911 16.4771 16.1654 15.0224L18.1682 15.5231C17.0301 17.8487 14.6405 19.4503 11.8769 19.4503C8.0109 19.4503 4.87689 16.3163 4.87689 12.4503C4.87689 8.58431 8.0109 5.4503 11.8769 5.4503C13.8233 5.4503 15.5842 6.24474 16.853 7.52706L16.6078 4.72412L18.6002 4.5498L19.1231 10.527L13.1459 11.0499Z"
                            fill="currentColor" />
                    </svg>
                </x-dashboard-card>

                <x-dashboard-card :title="'Admin Demolition'" :count="$this->dashboardCounts[0]->adminDemoCount"
                    :bg="'bg-red-600'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="text-white w-7 h-7">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M2 12C2 6.47715 6.47715 2 12 2V4H20V12H22C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12ZM18 12H16V8H12V6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18C15.3137 18 18 15.3137 18 12Z"
                            fill="currentColor" />
                    </svg>
                </x-dashboard-card>

                <x-dashboard-card :title="'For LHB'" :count="$this->dashboardCounts[0]->forLHBCount"
                    :bg="'bg-pink-600'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="text-white w-7 h-7">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.9999 4C20.6568 4 21.9999 5.34315 21.9999 7V17C21.9999 18.6569 20.6568 20 18.9999 20H4.99994C3.34308 20 1.99994 18.6569 1.99994 17V7C1.99994 5.34315 3.34308 4 4.99994 4H18.9999ZM19.9999 9.62479H13C12.4478 9.62479 11.8442 9.20507 11.652 8.68732L10.6542 6H4.99994C4.44765 6 3.99994 6.44772 3.99994 7V17C3.99994 17.5523 4.44765 18 4.99994 18H18.9999C19.5522 18 19.9999 17.5523 19.9999 17V9.62479Z"
                            fill="currentColor" />
                    </svg>
                </x-dashboard-card>

                <x-dashboard-card :title="'Not Qualified'" :count="$this->dashboardCounts[0]->notQualifiedCount"
                    :bg="'bg-yellow-600'">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="text-white w-7 h-7">
                        <path d="M15.9644 4.63379H3.96442V6.63379H15.9644V4.63379Z" fill="currentColor" />
                        <path d="M15.9644 8.63379H3.96442V10.6338H15.9644V8.63379Z" fill="currentColor" />
                        <path d="M3.96442 12.6338H11.9644V14.6338H3.96442V12.6338Z" fill="currentColor" />
                        <path
                            d="M12.9645 13.7093L14.3787 12.295L16.5 14.4163L18.6213 12.2951L20.0355 13.7093L17.9142 15.8305L20.0356 17.9519L18.6214 19.3661L16.5 17.2447L14.3786 19.3661L12.9644 17.9519L15.0858 15.8305L12.9645 13.7093Z"
                            fill="currentColor" />
                    </svg>
                </x-dashboard-card>

            </div>

            <div class="grid w-full grid-cols-1 mt-5 md:grid-cols-2 lg:grid-cols-2 gap-x-2 gap-y-2">
                <div class="w-full border-2 rounded-md shadow-sm">
                    {!! $dailyValidated->container() !!}

                </div>
                <div class="w-full border-2 rounded-md shadow-sm ">
                    {!! $encodedPerDay->container() !!}
                </div>
            </div>

            <div class="my-5 text-2xl font-semibold text-gray-700">
                <div>
                    <p class="text-2xl font-medium leading-8">Latest Applicant Entries</p>
                    <p class="text-base font-normal">Here are the latest entry of the applicants</p>
                </div>
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
                                Name
                            </x-table.heading>
                            <x-table.heading>
                                14K Endorsement
                            </x-table.heading>
                            <x-table.heading>
                                Civil Status
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
                            @forelse ($this->applicants as $index => $applicant)
                            <x-table.row striped wire:key="{{$index}}" wire:loading.class="opacity-50">
                                <x-table.cell class="py-5">
                                    {{$loop->index + 1}}
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
                                    <div class="font-medium ">Applicant: {{$applicant->name}}
                                    </div>
                                    <div class="text-xs text-gray-500">Partner: {{
                                        $applicant->spouse?->spouse_name
                                        }}
                                    </div>
                                </x-table.cell>

                                <x-table.cell>
                                    {{$applicant->fourteen ? "Yes" : "No"}}
                                </x-table.cell>

                                <x-table.cell>
                                    {{$applicant->civil_status}}
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
                                    @can('edit applicant')
                                    <x-button.text btn-type="primary" wire:navigate isLink
                                        href="{{ route('validation.update', $applicant) }}">
                                        Update
                                    </x-button.text>
                                    @endcan
                                    @can('delete applicant')
                                    <x-button.text btn-type="error"
                                        wire:click="$dispatch('openModal', { component: 'validation.modal.delete', arguments: { applicant: {{ $applicant }} }})">
                                        Move to Trash
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
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script src="{{ $dailyValidated->cdn() }}"></script>
<script src="{{ $encodedPerDay->cdn() }}"></script>

{{ $dailyValidated->script() }}
{{ $encodedPerDay->script() }}
@endpush