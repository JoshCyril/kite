@props(['quote'])
<div {{ $attributes }} >
    <div class="flex flex-col h-full p-8 transition-colors duration-200 bg-white border rounded shadow-sm hover:bg-purple-50">
        <div class="">
            <p class="mb-4 text-xs font-semibold tracking-wide uppercase">
                <span class="transition-colors duration-200 text-deep-purple-accent-400 hover:text-deep-purple-800">
                    @if($category = $quote->categories()->first())
                        @foreach ($quote->categories as $category)
                            <x-quotes.category-badge :category="$category" />
                        @endforeach
                    @endif
                </span>
                <div class="mb-5 text-gray-600">— {{ $quote->quoted_at->diffForHumans() }}</div>
              </p>

              <a wire:navigate href="{{ route('quotes.show', $quote->slug)}}" aria-label="Article" title="Jingle Bells"
                class="inline-block mb-5 font-serif text-2xl font-black text-gray-400 transition-colors duration-200 hover:text-deep-purple-accent-400">
                <span class="text-3xl text-gray-200 font-">"</span> {{ $quote->content }}
              </a>
        </div>

        <div class="flex items-center pb-2 mt-5">

          <a href="" aria-label="Author" title="Author" class="mr-3">
            <img src="{{ $quote->user->profile_photo_url }}" alt="avatar" class="object-cover w-10 h-10 rounded-full shadow-sm" />
          </a>

          <div>
            <a href="/" aria-label="Author" title="Author" class="font-semibold text-gray-800 transition-colors duration-200 hover:text-deep-purple-accent-400">
              {{ $quote->user->name }}
            </a>
            <p class="text-sm font-medium leading-4 text-gray-600">{{ $quote->user->userDetail->user_name }}</p>
          </div>

        </div>

      </div>
</div>
