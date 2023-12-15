<x-app-layout>

    <div class="w-full px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="max-w-screen-sm sm:text-center sm:mx-auto">
          {{-- <a href="/" aria-label="View" class="inline-block mb-5 rounded-full sm:mx-auto">
            <div class="flex items-center justify-center w-16 h-16 mb-4 rounded-full bg-indigo-50">
              <svg class="w-12 h-12 text-deep-purple-accent-400" stroke="currentColor" viewBox="0 0 52 52">
                <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
              </svg>
            </div>
          </a> --}}

          <a href="" aria-label="Author" title="Author" class="inline-block mb-5 rounded-full sm:mx-auto">
            <img src="{{ $user->profile_photo_url }}" alt="avatar" class="object-cover w-20 h-20 rounded-full shadow-sm" />
          </a>

          <h2 class="mb-4 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
            {{ $user->name }}
          </h2>
          <p class="text-base text-gray-700 md:text-lg sm:px-4">
            {{ $user->userDetail->user_name }}
          </p>
          <hr class="w-full my-8 border-gray-300" />
        </div>
      </div>

    <div class="w-full bg-gray-800">
        <div class="relative px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="absolute inset-x-0 top-0 items-center justify-center hidden overflow-hidden md:flex md:inset-y-0">
            <svg viewBox="0 0 88 88" class="w-full max-w-screen-xl text-gray-800">
                <circle fill="currentColor" fill-opacity="0.4" cx="44" cy="44" r="15.5"></circle>
                <circle fill-opacity="0.1" fill="currentColor" cx="44" cy="44" r="44"></circle>
                <circle fill-opacity="0.1" fill="currentColor" cx="44" cy="44" r="37.5"></circle>
                <circle fill-opacity="0.1" fill="currentColor" cx="44" cy="44" r="29.5"></circle>
                <circle fill-opacity="0.1" fill="currentColor" cx="44" cy="44" r="22.5"></circle>
            </svg>
            </div>

            <div class="relative grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($user->quotes as $quote)
                    <a wire:navigate href="{{ route('quotes.show', $quote->slug)}}">
                        <div class="px-10 py-20 text-center transition duration-300 transform bg-gray-900 rounded shadow-2xl hover:scale-105 md:shadow-xl hover:shadow-2xl">
                            <p class="font-semibold text-gray-200">
                            {{ $quote->content }}

                            - created at {{ $quote->quoted_at->diffForHumans() }}
                            </p>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>

    </x-app-layout>
