<div class="px-3 py-6 lg:px-7">
    <div class="flex items-center justify-between border-b border-gray-100">
        <div class="text-gray-600">

            @if($this->activeCategory || $search)
                <button
                wire:click="clearFilters()"
                class="px-1 py-1 text-red-900 border-2 border-red-900 rounded-xl">
                    Clear
                </button>

            @endif

            @if($this->activeCategory)
                <x-badge
                    wire:navigate
                    href="{{ route('quotes.index',['category'=> $this->activeCategory->slug]) }}"
                    :bgColor="$this->activeCategory->bg_color">
                        {{ $this->activeCategory->name }}
                </x-badge>
            @endif

            @if($search)
            <div class="ml-2">
                Searching: <strong>{{ $search }}</strong>
            </div>
            @endif

        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button wire:click="setSort('desc')" class="py-4 {{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }}" >Latest</button>
            <button wire:click="setSort('asc')"  class="py-4 {{ $sort === 'asc'  ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }}" >Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->quotes as $quote )
        <x-quotes.quote-item :quote="$quote" />
        @endforeach

    </div>

    <div class="my-3">
        {{ $this->quotes->onEachSide(1)->links() }}
    </div>
</div>
