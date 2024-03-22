@props(['disabled' => false, 'value'=> 'Date', 'name' => '', 'id' => ''])

<div>
    <div class="relative">
        <input {{ $disabled ? 'disabled' : '' }} name="{{ $name }}" id="{{ $id }}" value="{{ old($name) }}" {!!
            $attributes->merge(['class' => 'block p-3 w-full text-sm
        text-gray-900 bg-transparent rounded-lg border border-gray-300 appearance-none
        focus:outline-none focus:ring-0 focus:border-blue-600 peer']) !!}
        placeholder=" " data-picker x-data x-ref="input" x-on:change="$dispatch('input', $el.value)"
        x-init="new Pikaday({field: $refs.input, format: 'MM/DD/YYYY'})" autocomplete="false"/>

        <label for="{{ $id }}" class='block absolute text-base border
        text-gray-500
            rounded-full border-none truncate md:whitespace-normal
            duration-300 transform
            -translate-y-5 scale-75 top-2 origin-[0] bg-white px-2 peer-focus:px-2
            peer-focus:text-blue-600
            peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2
            peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-5 left-1'>
            {{ $value }} (MM/DD/YYYY)
        </label>
    </div>

    <x-input-error :messages="$errors->get( $name )" class="mt-2" />
</div>

@assets
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js" defer></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endassets