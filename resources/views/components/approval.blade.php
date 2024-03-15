@if (session()->has('message'))
<div class="flex flex-row items-center p-5 py-5 mb-4 bg-green-200 border-b-2 border-green-300 rounded alert">
    <div
        class="flex items-center justify-center flex-shrink-0 w-10 h-10 bg-green-100 border-2 border-green-500 rounded-full alert-icon">
        <span class="text-green-500">
            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd"></path>
            </svg>
        </span>
    </div>
    <div class="ml-4 alert-content">
        <div class="text-lg font-semibold text-green-800 alert-title">
            {{ __('Success') }}
        </div>
        <div class="text-sm text-green-600 alert-description">
            {{ session('message') }}
        </div>
    </div>
</div>
@endif