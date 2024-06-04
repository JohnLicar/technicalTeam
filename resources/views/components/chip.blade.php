@props(['event'])

@php

switch ($event) {

case 'Approved':
$class = 'bg-green-500';
break;

case 'Denied':
$class = 'bg-red-500';
break;

case 'Pending':
$class = 'bg-blue-500';
break;

case 'Yes':
$class = 'bg-green-500';
break;

case 'No':
$class = 'bg-red-500';
break;

default:
$class = 'bg-blue-500';
break;

}
@endphp


<span class="rounded-full py-2 px-4 text-xs text-white whitespace-nowrap {{ $class }}">
    {{ $event }}
</span>