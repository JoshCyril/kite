<x-app-layout>
        <div class="grid w-full grid-cols-4 gap-10 ">
            <div class="col-span-4 md:col-span-3">
                @livewire('quote-list')
            </div>
            <div id="side-bar" class="col-span-4 px-3 py-6 pt-10 space-y-10 border-t border-gray-100 border-t-gray-100 md:border-t-none md:col-span-1 md:px-6 md:border-l">
               @include('quotes.partials.search-box')
               @include('quotes.partials.categories-box')

            </div>
        </div>
</x-app-layout>
