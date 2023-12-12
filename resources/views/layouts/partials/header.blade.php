<header class="flex items-center justify-between px-6 py-3 border-b border-gray-100">
    <div id="header-left" class="flex items-center">
        <a href="{{ route('home') }}">
            <x-application-logo/>
        </a>
        <div class="ml-10 top-menu">
            <ul class="flex space-x-4">
                <li>
                    <a class="flex items-center space-x-2 text-sm text-purple-500 hover:text-purple-900"
                        href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li>
                    <a class="flex items-center space-x-2 text-sm text-gray-500 hover:text-purple-500"
                        href="http://127.0.0.1:8000/blog">
                        Blog
                    </a>
                </li>

                <li>
                    <a class="flex items-center space-x-2 text-sm text-gray-500 hover:text-purple-500"
                        href="http://127.0.0.1:8000/blog">
                        Terms
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div id="header-right" class="flex items-center md:space-x-6">
        @guest
            @include('layouts.partials.header-right-guest')
        @endguest

        @auth
            @include('layouts.partials.header-right-auth')
        @endauth
    </div>
</header>