<div class="px-3 py-6 lg:px-7">
    <div class="flex items-center justify-between border-b border-gray-100">
        <div class="flex items-center space-x-4 font-light ">
            <button class="py-4 {{ $sort === 'desc' ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }}" wire:click="setSort('desc')">Latest</button>
            <button class="py-4 {{ $sort === 'asc'  ? 'text-gray-900 border-b border-gray-700' : 'text-gray-500' }}" wire:click="setSort('asc')">Oldest</button>
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
