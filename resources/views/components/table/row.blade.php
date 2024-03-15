{{-- @props([
'striped' => null
])
<tr {{ $attributes->merge(['class' => 'uppercase whitespace-no-wrap text-sm leading-5
    hover:bg-gray-100 bg-white border-b group '])}}
    class="{{$striped ? 'odd:bg-white even:bg-gray-10' : ''}}">
    {{ $slot }}
</tr> --}}

@props([
'striped' => null
])

<tr @class([ 'odd:bg-white even:bg-gray-100'=> $striped,
    'uppercase whitespace-no-wrap text-sm leading-5 text-cool-gray-900 hover:bg-gray-200 bg-white border-b group'
    ])
    >
    {{ $slot }}
</tr>