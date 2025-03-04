<nav class="h-full flex flex-col">
    <!-- Logo -->
    <div class="flex items-center justify-center h-20 shadow-md">
        <div class="h-12 w-12">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </div>
    </div>

    <!-- Navigation Links -->
    <div class="flex-grow">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" 
            class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100">
            <span class="mx-3">{{ __('Dashboard') }}</span>
        </x-nav-link>
        <!-- Agrega aquí más enlaces de navegación -->
    </div>

    <!-- User Menu -->
    <div class="p-4">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none transition duration-150 ease-in-out">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>