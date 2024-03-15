<div>
    <div class="w-full h-full max-w-md p-4 md:h-auto">
        <div class="bg-white rounded-lg ">
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 text-red-600 w-14 h-14 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to
                    delete this purok?</h3>

                <div class="flex items-center justify-center gap-5">
                    <button wire:click="$dispatch('closeModal')"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 ">No,
                        cancel</button>

                    <button wire:click="confirmed"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>