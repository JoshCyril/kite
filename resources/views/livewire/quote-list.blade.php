<div class="px-3 py-6 lg:px-7">
    <div class="flex items-center justify-between border-b border-gray-100">
        <div class="flex items-center space-x-4 font-light ">
            <button class="py-4 text-gray-500">Latest</button>
            <button class="py-4 text-gray-900 border-b border-gray-700">Oldest</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->quotes as $quote )
            <x-quotes.quote-item :quote="$quote"/>
        @endforeach

    </div>

    <div class="my-3">
        {{ $this->quotes->onEachSide(1)->links() }}
    </div>
</div>
