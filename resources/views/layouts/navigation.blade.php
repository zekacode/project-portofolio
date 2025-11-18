{{-- File: resources/views/layouts/navigation.blade.php --}}
<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <span class="font-bold text-gray-800 dark:text-gray-200">Putrawin Adha Muzakki</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        Home
                    </x-nav-link>
                    <x-nav-link :href="route('showcase.index')" :active="request()->routeIs('showcase.*')">
                        Showcase
                    </x-nav-link>
                    <x-nav-link :href="route('resume.index')" :active="request()->routeIs('resume.index')">
                        Resume
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>