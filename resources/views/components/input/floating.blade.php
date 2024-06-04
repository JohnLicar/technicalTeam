@props(['disabled' => false, 'value'=> '', 'type' => 'text', 'name' => '', 'id' => '', 'bg' => 'white', 'text'=>
'gray-500', 'peer_text'=> 'text-blue-600'])

<div>
    <div class="relative">
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" {{ $disabled ? 'disabled' : '' }}
            value="{{ old($name) }}" {!! $attributes->merge(['class' => 'block
        p-3
        border-blue-500
        w-full text-sm
        text-gray-900 bg-transparent rounded-lg appearance-none focus:outline-none focus:ring-0
        peer']) !!}
        placeholder=" " />

        <label for="{{ $id }}" class='block absolute text-base border
        text-{{ $text }}
            rounded-full border-none truncate md:whitespace-normal
            duration-300 transform
            -translate-y-5 scale-75 top-2 origin-[0] bg-{{ $bg }} px-2 peer-focus:px-2
            peer-focus:{{ $peer_text }}
            peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2
            peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-5 left-1'>
            {{ $value ?? $slot }}
        </label>
    </div>

    <x-input-error :messages="$errors->get( $name )" class="mt-2" />
</div>