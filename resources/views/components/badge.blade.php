@props(['bgColor'])

@php
    $bgClr = match($bgColor){
    'purple' => 'bg-purple-100',
    'blue' => 'bg-blue-100',
    'red' => 'bg-red-100',
    'green' => 'bg-green-100',
    default => 'bg-purple-100'};

    $txClr = match($bgColor){
    'purple' => 'text-purple-800',
    'blue' => 'text-blue-800',
    'red' => 'text-red-800',
    'green' => 'text-green-800',
    default => 'text-purple-800'};
@endphp

<button  {{ $attributes }} class="px-3 py-1 text-base {{ $bgClr }} {{ $txClr }} rounded-2xl">
    {{ $slot }}
</button>
