@props(['quote'])
<article class="[&:not(:last-child)]:border-b border-gray-100 pb-10">
    <div class="grid items-start grid-cols-12 gap-3 mt-5 article-body">
        <div class="flex items-center col-span-4 article-thumbnail">
            <a wire:navigate href="{{ route('quotes.show', $quote->slug) }}">
                <img class="mx-auto w-50 mw-100 rounded-xl" src="{{ $quote->getCoverImage() }}" alt="thumbnail">
            </a>
        </div>
        <div class="grid w-full grid-flow-row col-span-8 gap-4 grid-row-5 content-stretch">

            <div class="row-start-1 row-end-3">
                <h2 class="text-xl font-bold text-gray-900">
                    <a wire:navigate href="{{ route('quotes.show', $quote->slug) }}">
                        {{ $quote->content }}
                    </a>
                </h2>
            </div>


            <div class="row-span-1 mt-4">
                <div class="flex items-center justify-between flex-none article-actions-bar">
                    <div class="flex gap-x-2">
                        @foreach ($quote->categories as $category)
                            <x-quotes.category-badge :category="$category" />
                        @endforeach
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-500">{{ $quote->getReadingTime() }} min read</span>
                        </div>
                    </div>

                    <div>
                        <livewire:like-button
                            :key="$quote->id"
                            :$quote/>
                    </div>
                </div>
            </div>
{{--
            <p class="mt-2 text-base font-light text-gray-700">
                {{ $quote->getExcerpt()  }}
            </p> --}}
            <a wire:navigate href="{{ route('user.show', $quote->user->name)}}">
            <div class="row-span-1 mt-4">
                <div class="flex items-center flex-none py-1 text-sm article-meta">
                    <img class="mr-3 rounded-full w-7 h-7" src="{{ $quote->user->profile_photo_url }}" alt="$quote->userDetail->user->name">
                    <span class="mr-1 text-xs">{{ $quote->user->name }}</span>
                    <span class="text-xs text-gray-500">. {{ $quote->quoted_at->diffForHumans() }}</span>
                </div>
            </div>
            </a>


        </div>
    </div>
</article>
