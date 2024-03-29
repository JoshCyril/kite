<x-app-layout>
    @section('hero')

    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="max-w-xl sm:mx-auto lg:max-w-2xl">
          <div class="flex flex-col mb-16 sm:text-center sm:mb-0">
            <a href="/" class="mb-6 sm:mx-auto">
              <div class="flex items-center justify-center w-12 h-12 rounded-full bg-indigo-50">
                <svg class="w-10 h-10 text-purple-400" stroke="currentColor" viewBox="0 0 52 52">
                  <polygon stroke-width="3" stroke-linecap="round" stroke-linejoin="round" fill="none" points="29 13 14 29 25 29 23 39 38 23 27 23"></polygon>
                </svg>
              </div>
            </a>
            <div class="max-w-xl mb-10 md:mx-auto sm:text-center lg:max-w-2xl md:mb-12">
              <h2 class="max-w-lg mb-6 font-sans text-3xl font-bold leading-none tracking-tight text-gray-900 sm:text-4xl md:mx-auto">
                <span class="relative inline-block">
                  <svg viewBox="0 0 52 24" fill="currentColor" class="absolute top-0 left-0 z-0 hidden w-32 -mt-8 -ml-20 text-purple-300 lg:w-32 lg:-ml-28 lg:-mt-10 sm:block">
                    <defs>
                      <pattern id="e77df901-b9d7-4b9b-822e-16b2d410795b" x="0" y="0" width=".135" height=".30">
                        <circle cx="1" cy="1" r=".7"></circle>
                      </pattern>
                    </defs>
                    <rect fill="url(#e77df901-b9d7-4b9b-822e-16b2d410795b)" width="52" height="24"></rect>
                  </svg>
                  <span class="relative">Welcome</span>
                </span>
                to Kite 🪁
              </h2>
              <p class="text-base text-gray-700 md:text-lg">
                Find your best quote & share it here.
              </p>
            </div>
            <div>
              <a wire:navigate href="{{ route('quotes.index') }}"
                class="inline-flex items-center justify-center h-12 px-6 font-medium tracking-wide text-white transition duration-200 bg-purple-500 rounded shadow-md hover:bg-purple-700 focus:shadow-outline focus:outline-none">
                Get started
              </a>
            </div>
          </div>
        </div>
      </div>
    @endsection

    <div class="mb-10">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-3xl font-bold text-yellow-600">✨ Featured:</h2>

                <div class="max-w-full p-0 ">
                    <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
                        @foreach ($featuredQuotes as $quote)
                            <x-quotes.quote-card :quote="$quote" class="col-span-3 md:col-span-1"/>
                        @endforeach
                    </div>
                </div>
            <a class="block mt-10 text-lg font-semibold text-center text-purple-400"
            wire:navigate href="{{ route('quotes.index') }}">
            More Quotes</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-3xl font-bold text-red-600">⭕ Feed:</h2>
            <div class="max-w-full p-0 ">
                <div class="grid gap-8 lg:grid-cols-3 sm:max-w-sm sm:mx-auto lg:max-w-full">
                @foreach ($latestQuotes as $quote)
                        <x-quotes.quote-card :quote="$quote" class="col-span-3 md:col-span-1"/>
                @endforeach
                </div>
            </div>
        <a class="block mt-10 text-lg font-semibold text-center text-purple-400"
        wire:navigate href="{{ route('quotes.index') }}">
        More Quotes</a>
    </div>
</x-app-layout>
