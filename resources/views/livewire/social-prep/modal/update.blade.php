<div class="py-6">
    <div class="max-w-4xl px-6 mx-auto md:px-8">
        <div class="text-2xl font-semibold text-gray-700 ">
            <div class="mb-6">
                <p class="text-3xl leading-8">
                    Add new User
                </p>

                <p class="text-base font-normal">Please make sure that the informations are correct
                </p>
            </div>

            <div>
                <form enctype="multipart/form-data" wire:submit="addSocPrep">
                    <div>
                        <x-input.floating wire:model='applicant.name' class="mt-4 border-gray-500" :value="'Name'"
                            :name="'name'" :id="'name'" :type="'text'" :bg="'white'" />
                        <x-input.floating wire:model='applicant.name' class="mt-4 border-gray-500" :value="'Name'"
                            :name="'name'" :id="'name'" :type="'text'" :bg="'white'" />
                        <x-input.floating wire:model='applicant.name' class="mt-4 border-gray-500" :value="'Name'"
                            :name="'name'" :id="'name'" :type="'text'" :bg="'white'" />
                        <x-input.floating wire:model='applicant.name' class="mt-4 border-gray-500" :value="'Name'"
                            :name="'name'" :id="'name'" :type="'text'" :bg="'white'" />

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