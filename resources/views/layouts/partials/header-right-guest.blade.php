<ul class="flex items-center ml-auto space-x-8 lg:flex">
    <x-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')" :index="1">
        {{ __('Login') }}
    </x-nav-link>
    <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')" :index="1">
        {{ __('Register') }}
    </x-nav-link>

</ul>
