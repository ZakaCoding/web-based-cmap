<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Release Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <section class="dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 z-10 relative">
                <a href="{{ url('/release-notes') }}" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
                    <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span class="text-sm font-medium">Reverse concept map was launched! See what's new</span>
                    <svg aria-hidden="true" class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                </a>
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white" style="font-family: 'Mona Sans'">Release Notes</h1>
                <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-200">Keep up with Open CMAP latest product news, or subscribe to RSS to be the first to know when new releases and updates go live.</p>
            </div>
        </section>

        <div class="max-w-7xl sm:mx-0 lg:mx-auto px-4">
            {{-- mixins with bootstrap --}}
            <div class="row">
                <div class="col-sm-12 col-lg-3 mb-4">
                    <div class="rounded-lg bg-white p-3 drop-shadow-lg border-0 block">
                        <div class="flex content-center">
                            <i class="bi bi-rocket-takeoff text-red-700 mr-2"></i>
                            <h2 class="font-bold">Keep an update</h2>
                        </div>
                        <p class="my-2 text-gray-600">
                            We will always release new feature on the next future.
                        </p>
                        <button class="w-full h-12 shadow-sm text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Subscribe</button>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-9 lg:px-5 sm:px-0">
                    {{-- Card --}}
                    <div class="rounded-lg bg-white drop-shadow-md p-4 block">
                        <div class="block">
                            <div class="flex content-center">
                                <a href="#" class="bg-green-100 text-green-800 text-xs mr-2 font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                                    <i class="bi bi-wrench mr-2"></i>
                                    MINOR v1.0.1
                                </a>
                                <p class="text-gray-400">May 12, 2023</p>
                            </div>
                            <h2 class="font-bold text-4xl mb-4">Responsive and Email Integration</h2>
                        </div>
                        <article class="text-xl font-normal text-gray-500">
                            <p class="mb-2">
                                We make some improment on UI, Now on when you access from Smartphone or tablet the UI will following your screen size. <br> Now you can use forgot password feature. System will sent you an email, if you didn't receive the email please check on Spam Folder.
                            </p>
                            <p class="mb-2">
                                We also fix some minor Bug:
                            </p>
                            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Bugfixes</h2>
                            <ul class="w-full space-y-1 text-gray-500 list-inside dark:text-gray-400">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    Table responsive on mobile screen
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    Welcome page can use dark mode
                                </li>
                                {{-- <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                    At least one special character, e.g., ! @ # ?
                                </li> --}}
                            </ul>
                        </article>
                    </div>

                    <hr class="w-48 h-1 mx-auto my-4 bg-gray-200 border-0 rounded md:my-10 dark:bg-gray-700">

                    <div class="rounded-lg bg-white drop-shadow-md p-4 block">
                        <div class="block">
                            <div class="flex content-center">
                                <a href="#" class="bg-blue-100 text-blue-800 text-xs mr-2 font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                                    </svg>
                                    FEATURE
                                </a>
                                <p class="text-gray-400">May 12, 2023</p>
                            </div>
                            <h2 class="font-bold text-4xl mb-4">Reverse Concept Map</h2>
                        </div>
                        <article class="text-xl font-normal text-gray-500">
                            <p class="mb-2">
                                Now you can map out more detailed processes without sacrificing polish with our latest diagramming improvements
                            </p>
                            <p class="mb-2">
                                We also fix some minor Bug:
                            </p>
                            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Bugfixes</h2>
                            <ul class="w-full space-y-1 text-gray-500 list-inside dark:text-gray-400">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    Fix error when access concept map without user behavior data
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-green-500 dark:text-green-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    Fix bug on welcome page on Map Example
                                </li>
                                {{-- <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-1.5 text-gray-400 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                                    At least one special character, e.g., ! @ # ?
                                </li> --}}
                            </ul>
                        </article>
                    </div>

                    <hr class="w-48 h-1 mx-auto my-4 bg-gray-200 border-0 rounded md:my-10 dark:bg-gray-700">

                    <div class="rounded-lg bg-white drop-shadow-md p-4 block">
                        <div class="block">
                            <div class="flex content-center">
                                <a href="#" class="bg-red-100 text-red-800 text-xs mr-2 font-medium inline-flex items-center px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-blue-400 mb-2">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path>
                                    </svg>
                                    PENDING
                                </a>
                                <p class="text-gray-400">April 27, 2023</p>
                            </div>
                            <h2 class="font-bold text-4xl mb-4">Assasment Feature</h2>
                        </div>
                        <article class="text-xl font-normal text-gray-500">
                            <p class="mb-2 leading-tight">
                                For now we stop develop Assasment feature because our focus is how to make reverse map on concept data, and user or teacher can tracking concept map.
                            </p>
                            <p class="mb-2 leading-tight">
                                You still can access or make assasment. But, that feature still not working well. You can't take scorring for now. we still research algorithm for that feature. if you have any suggestions please let me now or you can assign that feature, check our github and make new issues with detailed.
                            </p>
                            <a href="https://github.com/ZakaCoding/web-based-cmap/issues" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 mr-2 mb-2">
                                <svg class="w-4 h-4 mr-2 -ml-1" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="github" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path></svg>
                                New Issues
                            </a>
                        </article>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
