<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('welcome') }}">
                        <svg width="41" height="40" viewBox="0 0 101 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.64373 0H90.6511C95.9772 0 100.295 4.31765 100.295 9.64373V89.6867C100.295 95.0128 95.9772 99.3305 90.6511 99.3305H9.64373C4.31765 99.3305 0 95.0128 0 89.6867V9.64373C0 4.31765 4.31765 0 9.64373 0ZM84.2593 50.372C84.2815 47.7741 84.0628 45.128 83.4428 42.506C82.8582 39.897 81.9384 37.2543 80.6732 34.845C79.4304 32.4257 77.9304 30.1585 76.1652 28.1413C74.4092 26.1162 72.4596 24.2532 70.266 22.6765C65.9264 19.4848 60.7241 17.1955 54.9508 16.3759C54.4517 16.2837 53.9357 16.2459 53.4195 16.2081C53.2018 16.1921 52.984 16.1761 52.7674 16.1561C52.0354 16.0935 51.3005 16.0563 50.5535 16.0804C50.3421 16.0858 50.1358 16.0881 49.9306 16.0905C49.3983 16.0966 48.8731 16.1026 48.2822 16.1601C47.4495 16.2508 46.6158 16.3596 45.7841 16.4856C42.6247 17.0904 39.7405 18.0653 37.2979 19.3053C36.3453 19.7302 35.5084 20.2226 34.6629 20.72C34.349 20.9048 34.0338 21.0902 33.7111 21.2731C33.5087 21.4083 33.3049 21.5431 33.1009 21.6781C32.2034 22.2718 31.2997 22.8697 30.471 23.5251C29.4437 24.3224 28.4215 25.1339 27.4829 26.0251C26.507 26.8791 25.6088 27.8246 24.7147 28.7783C23.9832 29.5475 23.3051 30.3935 22.6277 31.2385C22.4724 31.4322 22.3171 31.626 22.1612 31.8187L20.9808 33.4881L20.4001 34.3329L19.8558 35.2442L18.7911 37.0879L17.8315 39.11L17.3718 40.1373L16.9646 41.2593C16.9051 41.4334 16.845 41.6056 16.7851 41.7774C16.5831 42.3566 16.383 42.9303 16.2134 43.5507C15.914 44.6293 16.1045 45.6827 16.6711 46.5759C17.2456 47.4872 18.2638 48.3219 19.4826 48.8915C20.1359 49.2049 20.8597 49.4529 21.6278 49.6525C21.5837 50.0322 21.5466 50.4128 21.5095 50.7939C21.4874 51.0218 21.4651 51.25 21.4414 51.4783C21.4365 51.7066 21.43 51.9355 21.4236 52.1647C21.3968 53.1155 21.3698 54.0716 21.4535 55.0147C21.5684 57.3716 21.9949 59.6993 22.6683 61.9604C23.3135 64.2336 24.2742 66.4221 25.4578 68.5099C26.6201 70.6118 28.12 72.5604 29.8218 74.3538C33.2654 77.9708 37.7817 80.6008 42.4894 82.0122C44.8532 82.739 47.2847 83.1251 49.7324 83.3136C52.182 83.4708 54.6457 83.3296 57.0964 82.9688C59.542 82.5605 61.9633 81.8841 64.3233 80.9395C66.665 79.9406 68.9424 78.6894 71.0563 77.1168C73.13 75.522 75.0384 73.7135 76.6543 71.6983C78.2481 69.6762 79.6625 67.5137 80.7552 65.2113C82.9629 60.6176 84.1948 55.5798 84.2593 50.372ZM64.1699 50.8158C64.4159 53.0043 64.1264 55.3801 63.3754 57.5566C63.0124 58.6575 62.478 59.6635 61.9064 60.6312C61.3136 61.5867 60.5969 62.4114 59.8358 63.1866C59.0545 63.9216 58.1412 64.5718 57.1442 65.1605C56.1159 65.7009 55.006 66.1626 53.8286 66.5064C52.6431 66.8048 51.4123 67.0296 50.1623 67.0881C48.9202 67.1163 47.6581 67.078 46.4474 66.8411C44.011 66.3794 41.7962 65.4147 39.9363 63.8593C38.0522 62.3028 36.4432 60.1192 35.4281 57.6393C34.908 56.4055 34.5138 55.099 34.3142 53.7713C34.2176 53.3324 34.1822 52.8935 34.1466 52.4527C34.1283 52.2261 34.11 51.9991 34.0833 51.7712C34.089 51.5658 34.0897 51.3587 34.0905 51.1513C34.0917 50.8022 34.093 50.4519 34.1176 50.1059C35.5733 50.0294 36.9343 49.9588 38.0986 49.9497C39.0479 49.9287 39.8412 49.9641 40.4836 49.9927C40.7047 50.0025 40.908 50.0116 41.0936 50.0173C41.1798 50.0181 41.2612 50.0191 41.3377 50.02C41.9173 50.0269 42.2145 50.0305 42.1522 49.9397C42.1825 49.1171 42.875 47.1372 44.1865 45.4144C45.4487 43.6804 47.1695 41.9565 48.7199 40.9888C49.2796 40.5781 49.7736 40.3465 50.1667 40.1621C50.3245 40.0882 50.466 40.0218 50.589 39.9545C50.6707 39.9344 50.7493 39.8971 50.829 39.8407C50.8834 39.8123 50.9823 39.7999 51.087 39.7868C51.1684 39.7766 51.2534 39.7659 51.3239 39.747C51.5003 39.6956 51.6888 39.6845 51.8804 39.6805C51.9583 39.681 52.0356 39.6704 52.1135 39.6597C52.227 39.6441 52.3419 39.6283 52.462 39.6463C54.0448 39.6331 55.9391 40.1019 57.69 41.0918C59.445 42.0595 61.0459 43.5021 62.1346 45.1221C62.7122 45.9206 63.1184 46.7643 63.4692 47.727C63.8422 48.6695 64.0428 49.7271 64.1699 50.8158Z" fill="url(#paint0_linear_109_18525)"/>
                            <defs>
                            <linearGradient id="paint0_linear_109_18525" x1="6.5" y1="38" x2="96" y2="43" gradientUnits="userSpaceOnUse">
                            <stop stop-color="#2D388A"/>
                            <stop offset="1" stop-color="#00AEEF"/>
                            </linearGradient>
                            </defs>
                        </svg>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard.release')" :active="request()->routeIs('dashboard.release')">
                        {{ __('Release Notes') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div id="user" data-user="{{ json_encode(Auth::user()) }}">{{ Auth::user()->name }}</div>

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

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
