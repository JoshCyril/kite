<div class="z-50 px-3 py-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">

    <div class="relative grid items-center grid-cols-2 lg:grid-cols-3">
      <ul class="flex items-center space-x-8 lg:flex">
            <x-nav-link
                href="{{ route('home') }}" :active="request()->routeIs('home')"
                :index="0"
                class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-purple-400">
                {{ __('Home') }}
            </x-nav-link>
            <x-nav-link
                href="{{ route('quotes.index') }}" :active="request()->routeIs('quotes.index')"
                :index="0"
                class="font-medium tracking-wide text-gray-700 transition-colors duration-200 hover:text-purple-400">
                {{ __('Quote') }}
            </x-nav-link>
      </ul>

      <a href="{{ route('home') }}" aria-label="Company" title="Company" class="inline-flex items-center lg:mx-auto">
        <span class="ml-2 text-xl font-bold tracking-wide text-gray-800">
                <x-application-logo/>
        </span>
      </a>

        @auth
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth

    </div>
  </div>



{{--
<header class="flex items-center justify-between px-6 py-3 border-b border-gray-100">
    <div id="nav-left" class="flex items-center">
        <a href="{{ route('home') }}">
            <x-application-logo/>
        </a>
        <div class="ml-10 top-menu">
            <ul class="flex space-x-4">

                <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Home') }}
                </x-nav-link>

                <x-nav-link href="{{ route('quotes.index') }}" :active="request()->routeIs('quotes.index')">
                    {{ __('Quote') }}
                </x-nav-link>

            </ul>
        </div>
    </div>
    <div id="nav-right" class="flex items-center md:space-x-6">
        @auth
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth
    </div>
</header> --}}
