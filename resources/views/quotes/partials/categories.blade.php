<div >
    <h3 class="mb-3 text-lg font-semibold text-gray-900">Recommended Topics</h3>
    <div class="flex flex-wrap justify-start gap-2 topics">
        @foreach ($categories as $category)
            <x-badge wire:nativgate href="{{ route('quote.index',['category'=> $category->slug]) }}" :bgColor="$category->bg_color">{{ $category->name }}
            </x-badge>
        @endforeach

    </div>
</div>
