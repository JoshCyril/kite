@props(['active', 'index'])

@php

if($active){
    $classes = ($index == 0)
                    ? 'inline-flex
                        items-center justify-center h-8 px-4
                        font-medium tracking-wide text-purple transition
                        duration-200  rounded shadow-md
                        hover:text-black hover:bg-purple-100
                        focus:shadow-outline focus:outline-none
                        border-2 border-purple-500/75 shadow-none '
                    : 'inline-flex items-center
                        justify-center h-8 px-4 font-medium
                        tracking-wide text-white transition
                        duration-200 bg-purple-500 rounded
                        shadow-md hover:text-black hover:bg-purple-100
                        border-2 border-purple-500/75 shadow-none
                        focus:shadow-outline focus:outline-none';

}else{
    $classes = ($index == 0)
                    ? 'h-8 px-4 border-2 border-purple-500/0 font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-purple-800'
                    : 'h-8 px-4 border-2 underline decoration-2 underline-offset-8 border-purple-500/0 bg-white-100 font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-purple-800';
};

@endphp

<li >
    <a wire:navigate  {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
