@props(['category'])
<x-badge wire:navigate href="{{ route('quotes.index',['category'=> $category->slug]) }}" :bgColor="$category->bg_color">
    {{ $category->name }}
</x-badge>
