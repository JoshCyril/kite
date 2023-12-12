@props(['quote'])
<div class="">
    <a href="http://127.0.0.1:8000/blog/laravel-34">
        <div>
            <img class="w-full rounded-xl"
                src="{{ $quote->author }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2">
            <a href="#" class="px-3 py-1 mr-3 text-sm text-white bg-red-600 rounded-xl">
                Laravel
            </a>
            <p class="text-sm text-gray-500">{{ $quote->quoted_at }}</p>
        </div>
        <a class="text-xl font-bold text-gray-900">{{ $quote->content }}</a>
    </div>

</div>
