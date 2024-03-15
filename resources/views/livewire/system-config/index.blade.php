<div>
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 max-w-7xl">
            <div class="my-6 text-2xl font-semibold text-gray-700 mt-14">
                <p class="text-2xl leading-8">
                    System Configurations
                </p>
                <p class="text-base font-normal">Here are the system configuration that you can make in system</p>
                </p>
            </div>

            <div class="mt-5 ">
                <div class="container overflow-x-auto">
                    <div class="grid w-full grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-2 gap-y-2">
                        <div
                            class="relative flex flex-col w-full px-4 py-3 border-2 rounded-md shadow-sm md:px-6 md:py-5">
                            <div class="flex items-start gap-x-5">
                                <div class="items-baseline p-3 bg-purple-500 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="text-white w-7 h-7">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.06298 10.063 6.27212 12.2721 6.27212C14.4813 6.27212 16.2721 8.06298 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16755 11.1676 8.27212 12.2721 8.27212C13.3767 8.27212 14.2721 9.16755 14.2721 10.2721Z"
                                            fill="currentColor" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.39409 5.48178 3.79417C8.90918 0.194243 14.6059 0.054383 18.2059 3.48178C21.8058 6.90918 21.9457 12.6059 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.97318 6.93028 5.17324C9.59603 2.3733 14.0268 2.26452 16.8268 4.93028C19.6267 7.59603 19.7355 12.0268 17.0698 14.8268Z"
                                            fill="currentColor" />
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <p class="text-sm tracking-wider uppercase">Purok</p>
                                    <p class="text-4xl font-medium">{{ $this->puroks->count() }}</p>
                                </div>
                            </div>
                            {{-- @can('create purok') --}}
                            <div class="absolute bottom-0">
                                <button class="hover:text-blue-400"
                                    wire:click="$dispatch('openModal', { component: 'system-config.purok.create', arguments: { barangays: {{ $this->barangays }} }})">Add
                                    Purok</button>
                            </div>
                            {{-- @endcan --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-2 gap-y-2">
                <div class="container overflow-x-auto">
                    <div class="my-6 text-2xl font-semibold text-gray-700">
                        <p class="text-2xl leading-8">
                            Puroks available in system
                        </p>
                    </div>

                    <x-table>
                        <x-slot name="head">
                            <x-table.heading>
                                #
                            </x-table.heading>

                            <x-table.heading>
                                Purok
                            </x-table.heading>

                            <x-table.heading>
                                Barangay
                            </x-table.heading>

                            <x-table.heading>
                            </x-table.heading>
                        </x-slot>
                        <x-slot name="body">
                            @forelse ($this->puroks as $index => $purok)
                            <x-table.row striped wire:key="{{$index}}" wire:loading.class="opacity-50">
                                <x-table.cell class="py-5">
                                    {{$this->puroks->firstItem() + $loop->index }}
                                </x-table.cell>

                                <x-table.cell>
                                    <div class="font-medium ">{{$purok->purok}}
                                    </div>
                                </x-table.cell>

                                <x-table.cell>
                                    {{$purok->barangay->barangay}}
                                </x-table.cell>

                                <x-table.cell>
                                    {{-- @can('edit purok') --}}
                                    <x-button.text btn-type="primary"
                                        wire:click="$dispatch('openModal', { component: 'system-config.purok.update', arguments: { purok: {{ $purok }},  barangays: {{ $this->barangays }} }})">
                                        Update
                                    </x-button.text>
                                    {{-- @endcan
                                    @can('delete applicant') --}}
                                    <x-button.text btn-type="error" type="submit"
                                        wire:click="$dispatch('openModal', { component: 'system-config.purok.delete', arguments: { purok: {{ $purok }} }})">
                                        {{-- wire:click='confirmDelete({{ $purok }})'> --}}
                                        Move to Trash
                                    </x-button.text>
                                    {{-- @endcan --}}
                                </x-table.cell>

                            </x-table.row>
                            @empty
                            <x-no-data />
                            @endforelse
                        </x-slot>
                    </x-table>
                    <div class="mt-5 mb-5">
                        {{ $this->puroks->onEachSide(0)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>