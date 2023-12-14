@props(['quote'])
<article class="[&:not(:last-child)]:border-b border-gray-100 pb-10">
    <div class="grid items-start grid-cols-12 gap-3 mt-5 article-body">
        <div class="flex items-center col-span-4 article-thumbnail">
            <a href="">
                <img class="mx-auto mw-100 rounded-xl" src="{{ $quote->getCoverImage() }}" alt="thumbnail">
            </a>
        </div>
        <div class="col-span-8">

            <h2 class="text-xl font-bold text-gray-900">
                <a href="http://127.0.0.1:8000/blog/first%20post">
                    {{ $quote->content }}
                </a>
            </h2>

            <div class="flex items-center justify-between mt-3 article-actions-bar">
                <div class="flex gap-x-2">
                    @foreach ($quote->categories as $category)
                        <x-badge
                            wire:navigate
                            href="{{ route('quotes.index',['category'=> $category->slug]) }}"
                            :bgColor="$category->bg_color">
                                {{ $category->name }}
                        </x-badge>
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

            <p class="mt-2 text-base font-light text-gray-700">
                {{ $quote->explanation  }}
            </p>

            <div class="flex items-center py-1 mt-4 text-sm article-meta">
                <img class="mr-3 rounded-full w-7 h-7" src="{{ $quote->user->profile_photo_url }}" alt="$quote->userDetail->user->name">
                <span class="mr-1 text-xs">{{ $quote->user->name }}</span>
                <span class="text-xs text-gray-500">. {{ $quote->quoted_at->diffForHumans() }}</span>
            </div>


        </div>
    </div>
</article>
