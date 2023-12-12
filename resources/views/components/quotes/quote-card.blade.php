@props(['quote'])
<div {{ $attributes }}>
    <a href="#">
        <div>
            <img class="w-full rounded-xl"
                src="{{ $quote->getCoverImage() }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-x-2">


                @if($category = $quote->categories()->first())
                    @foreach ($quote->categories as $category)
                            <x-badge
                                wire:navigate
                                href="{{ route('quotes.index',['category'=> $category->slug]) }}"
                                :bgColor="$category->bg_color">
                                    {{ $category->name }}
                            </x-badge>
                    @endforeach
                @endif
                <p class="text-sm text-gray-500">{{ $quote->quoted_at }}</p>


        </div>
        <a class="text-xl font-bold text-gray-900">{{ $quote->content }}</a>
    </div>

</div>
