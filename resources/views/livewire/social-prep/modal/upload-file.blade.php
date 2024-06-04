<div class="py-6" autofocus="true">
    <div class="max-w-4xl px-6 mx-auto md:px-8">
        <div class="text-2xl font-semibold text-gray-700 ">
            <div class="mb-6">
                <p class="text-lg font-medium ">Please make sure to upload correct scanned Attendance for the date of
                    <i class="font-bold">{{
                        \Carbon\Carbon::parse( $socialPrepDay->prep_day)->format('l jS \of F Y') }}</i>
                </p>
            </div>

            <div>
                <form enctype="multipart/form-data" novalidate wire:submit='addAttendance'>
                    <div>
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

                                    <x-input.floating wire:model='attachments' :name="'dropzone-file'"
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
                                    <div class="flex flex-row">
                                        <div class="flex items-center justify-center gap-2">
                                            <button
                                                class="p-1 text-sm text-white bg-gray-500 rounded-lg hover:bg-red-500"
                                                wire:click.prevent="removeAttachment()">
                                                x
                                            </button>
                                            <li class="text-sm font-normal">
                                                {{ $attachments->getClientOriginalName() }}
                                            </li>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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
                            {{ __('Add Scanned Attendance') }}
                        </x-button.solid>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>