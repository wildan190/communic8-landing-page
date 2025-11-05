<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-100" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex sm:items-center space-x-8">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white">
                    {{ __('Dashboard') }}
                </x-nav-link>

                <!-- Content -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white focus:outline-none">
                        {{ __('Content') }}
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5">
                        <div class="py-1">
                            <x-dropdown-link :href="route('blogs.index')">{{ __('Blogs') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('categories.index')">{{ __('Categories') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('galleries.index')">{{ __('Galleries') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('branch-offices.index')">{{ __('Branch Offices') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('messages.index')">{{ __('Messages') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('testimonies.index')">{{ __('Testimonies') }}</x-dropdown-link>
                        </div>
                    </div>
                </div>

                <!-- Projects -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white focus:outline-none">
                        {{ __('Projects') }}
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5">
                        <div class="py-1">
                            <x-dropdown-link :href="route('projects.index')">{{ __('Projects') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('activities.index')">{{ __('Activities') }}</x-dropdown-link>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white focus:outline-none">
                        {{ __('Services') }}
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5">
                        <div class="py-1">
                            <x-dropdown-link :href="route('services.index')">{{ __('Services') }}</x-dropdown-link>
                            <div class="border-t my-2 border-gray-200 dark:border-gray-600"></div>
                            <h4 class="px-3 py-1 text-xs uppercase font-semibold text-gray-500 dark:text-gray-300">Subservices</h4>
                            <x-dropdown-link :href="route('subservices.index')">{{ __('All Subservices') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('subservices.create')">{{ __('Create Subservice') }}</x-dropdown-link>

                            <div class="border-t my-2 border-gray-200 dark:border-gray-600"></div>

                            <h4 class="px-3 py-1 text-xs uppercase font-semibold text-gray-500 dark:text-gray-300">Service Content</h4>
                            <x-dropdown-link :href="route('public-presence.index')">{{ __('Public Presence') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('digital.compass.index')">{{ __('Digital Stand') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('digital-architecture-content.index')">{{ __('Code Band') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('brandforge.form')" :active="request()->routeIs('brandforge.form')">
                                {{ __('Brand Land') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('landing.index')" :active="request()->routeIs('landing.index')">
                                {{ __('OTT Advertising') }}
                            </x-dropdown-link>

                            <div class="border-t my-2 border-gray-200 dark:border-gray-600"></div>
                            <x-dropdown-link :href="route('card-services.index')" :active="request()->routeIs('card-services.*')">
                                {{ __('Card Services') }}
                            </x-dropdown-link>
                        </div>
                    </div>
                </div>

                <!-- Clients -->
                <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')" class="text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white">
                    {{ __('Clients') }}
                </x-nav-link>

                <!-- Web Management -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 dark:text-gray-100 hover:text-gray-900 dark:hover:text-white focus:outline-none">
                        {{ __('Web Management') }}
                        <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5">
                        <div class="py-1">
                            <x-dropdown-link :href="route('web_information.index')">{{ __('Web Information') }}</x-dropdown-link>
                            <x-dropdown-link :href="route('seo.index')">{{ __('SEO Manager') }}</x-dropdown-link>

                            <div class="border-t my-2 border-gray-200 dark:border-gray-600"></div>

                            <x-dropdown-link :href="route('admin.about.index')" :active="request()->routeIs('about.*')">
                                {{ __('About Page') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('admin.heroes-about.edit')" :active="request()->routeIs('admin.heroes-about.edit')">
                                {{ __('Hero About') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('hero.index')" :active="request()->routeIs('hero.index')">
                                {{ __('Hero Home') }}
                            </x-dropdown-link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-800 dark:text-gray-100 bg-white dark:bg-gray-800 hover:text-gray-900 dark:hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 dark:text-gray-200 hover:text-gray-800 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>