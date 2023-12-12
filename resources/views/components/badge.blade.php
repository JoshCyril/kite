@props(['bgColor'])

@php
    $bgClr = match($bgColor){
    'purple' => 'bg-purple-100',
    'blue' => 'bg-blue-100',
    'red' => 'bg-red-100',
    'green' => 'bg-green-100',
    default => 'bg-purple-100'};

    $txClr = match($bgColor){
    'purple' => 'text-purple-900',
    'blue' => 'text-blue-900',
    'red' => 'text-red-900',
    'green' => 'text-green-900',
    default => 'text-purple-900'};
@endphp

<button  {{ $attributes }} class="{{ $bgClr }} {{ $txClr }} px-3 py-1 text-base  rounded-2xl">
    {{ $slot }}
</button>
