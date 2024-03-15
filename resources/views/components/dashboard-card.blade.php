@props(['title', 'count', 'bg'])

<div>
    <div class="flex w-full px-4 py-3 border-2 rounded-md shadow-sm md:px-6 md:py-4">
        <div class="flex items-start gap-x-5">
            <div class="items-baseline p-3 rounded-md {{ $bg }}">
                {{ $slot }}
            </div>
            {{-- bg-cool-gray-500 --}}
            <div class="flex flex-col">
                <p class="text-sm tracking-wider uppercase">{{ $title }}</p>
                <p class="text-4xl font-medium">{{$count}}</p>
            </div>
        </div>
    </div>
</div>
